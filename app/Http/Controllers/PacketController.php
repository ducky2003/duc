<?php

namespace App\Http\Controllers;
use App\Models\Place;
use App\Models\rates;
use Illuminate\Support\Facades\DB;
use App\Models\Packet;
use Illuminate\Support\Facades\File;
use App\Models\PackCategory;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PacketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pack = Packet::paginate(8);
        return view('admin.pack.index', ['pack'=>$pack]);
    }
    
    public function getplacename(){
        $packet = DB::select("
            SELECT 
                tour_packet.*,
                place.place_name
            FROM 
                tour_packet
            JOIN 
                place ON tour_packet.id_place = place.id_place
            
           
        ");
       
        return view('users.home', compact('packet'));

    }
    public function preOrder($id_pack){
        $packet = Packet::findOrFail($id_pack);
        $user = auth()->user();
        return view('order', compact('packet', 'user'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = PackCategory::where('isActive', 1)->get();
        $supp = Supplier::where('isActive', 1)->get();
        $place = Place::where('isActive', 1)->get();
        return view('admin.pack.create', compact('supp', 'place'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pack_title' => 'required|string|max:1000',
            'pack_desc' => 'required|string|max:5000',
            'pack_price' => 'required',
            'start_date' => 'required',
            'pack_duration' => 'required',
            'pack_number' => 'required',
            'pack_img' => 'required|mimes:png,jpg,jpeg,webp',
            'id_supp' => 'required',
            'isActive' => 'required',
            'id_place' => 'required',
            'id_category' => 'required'
        ]);
        if($request->has('pack_img')){
            $file = $request->file('pack_img');
            $extension = $file->getClientOriginalExtension();
            $path ='upload/packet/';
            $filename = time(). '.'. $extension;
            $file->move($path, $filename);
        }
        Packet::create([
            'pack_title' => $request-> pack_title,
            'pack_desc' =>$request-> pack_desc,
            'pack_price' =>$request-> pack_price,
            'start_date' =>$request->   start_date,
            'pack_duration' =>$request-> pack_duration,
            'pack_number' =>$request-> pack_number,
            'pack_img' => $path.$filename,  
            'id_supp' =>$request-> id_supp,
            'isActive' =>$request-> isActive,
            'id_place' =>$request-> id_place,
            'id_category' =>$request-> id_category
        ]);
        return redirect('admin/pack');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_pack)
    {
        $packet = Packet::with('place', 'rate')->findOrFail($id_pack);
        
        $avgrate = $packet->avgrating();
        return view('detail_booking', compact('packet', 'avgrate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = PackCategory::where('isActive', 1)->get();
        $supp = Supplier::where('isActive', 1)->get();
        $place = Place::where('isActive', 1)->get();
        $tour_packet = Packet::findOrFail($id);
        return view('admin.pack.edit', compact('tour_packet', 'supp', 'place', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pack_title' => 'nullable|string|max:1000',
            'pack_desc' => 'nullable|string|max:5000',
            'pack_price' => 'nullable',
            'start_date' => 'nullable',
            'pack_duration' => 'nullable',
            'pack_number' => 'nullable',
            'pack_img' => 'nullable|mimes:png,jpg,jpeg,webp',
            'id_supp' => 'nullable',
            'isActive' => 'nullable',
            'id_place' => 'nullable',
            'id_category' => 'nullable'
        ]);
        $packet = Packet::findOrFail($id);
        $filename = $packet->pack_img;
        if($request->hasFile('pack_img')){
            $file = $request->file('pack_img');
            $extension = $file->getClientOriginalExtension();
            $path ='upload/packet/';
            $filename =$path. time(). '.'. $extension;
            $file->move(public_path($path), $filename);

            if(File::exists($packet->pack_img)){
                File::delete($packet->pack_img);
            }
        }
        
        $packet->update([
            'pack_title' => $request-> pack_title,
            'pack_desc' =>$request-> pack_desc,
            'pack_price' =>$request-> pack_price,
            'start_date' =>$request->   start_date,
            'pack_duration' =>$request-> pack_duration,
            'pack_number' =>$request-> pack_number,
            'pack_img' => $filename,  
            'id_supp' =>$request->input('id_supp', $packet->id_supp),
            'isActive' =>$request-> isActive,
            'id_place' =>$request->input('id_place', $packet->id_place),
            'id_category' =>$request->input('id_category', $packet->id_category),
        ]);
        return redirect('admin/pack');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $packet = Packet::findOrFail($id);
        
        if(File::exists($packet->pack_img)){
            File::delete($packet->pack_img);
        }
        $packet->delete();
        return redirect('admin/pack');
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $url = asset('images/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
