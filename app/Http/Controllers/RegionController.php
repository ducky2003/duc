<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Region;
use App\Models\Place;
use App\Models\Packet;
use App\Models\PackCategory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Export\RegionExport;
class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $region = Region::paginate(8);
        return view('admin.region.index', ['region'=>$region]);
    }

    public function getData(){
        $region = Region::paginate(5);
        return view('users.home', ['region'=>$region]);
    }

    public function showAll(){
        $region = Region::all();
        return view('region', ['region'=>$region]);
    }
    public function getCount(){
        $region = DB::table('region')
            ->select('region.id_region', 'region.region_name' ,'region.region_image', DB::raw('COUNT(place.id_place) AS place_count'))
            ->leftJoin('place', 'place.id_region', '=', 'region.id_region')
            ->groupBy('region.id_region', 'region.region_name','region.region_image')
            ->paginate(4);
        
        $packet = DB::table('tour_packet')
            ->select('tour_packet.*', 'place.place_name')
            ->join('place', 'tour_packet.id_place', '=', 'place.id_place')
            ->get();
        $category = DB::table('tour_category')
            ->select('tour_category.id_category',
            'tour_category.category_name',
            'tour_category.category_desc',
            'tour_category.category_image', DB::raw('COUNT(tour_packet.id_pack) as tour_count'))
            ->leftJoin('tour_packet', 'tour_category.id_category', '=', 'tour_packet.id_category')
            ->groupBy('tour_category.id_category',
            'tour_category.category_name',
            'tour_category.category_desc',
            'tour_category.category_image')
            ->get();
        return view('users.home', compact('region', 'packet','category'));
    }
    public function regionDet(){
        $region = DB::table('region')
        ->select('region.id_region', 'region.region_name' ,'region.region_image', DB::raw('COUNT(place.id_place) AS place_count'))
        ->leftJoin('place', 'place.id_region', '=', 'region.id_region')
        ->groupBy('region.id_region', 'region.region_name','region.region_image')
        ->get();
        return view('region', compact('region'));
    }
    public function showPlace($id){
        $region = Region::findOrFail($id);
        $place = Place::where('id_region', $id)->get();
        return view('place', compact('region', 'place'));
    }
    public function showdetail($id_category){
        $tourPackets = Packet::where('id_category', $id_category)->get();
        $category = PackCategory::find($id_category);
        return view('detail', compact('tourPackets', 'category'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.region.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rule = [
            'region_name' => 'required|max:50',
            'isActive' => 'required',
            'region_image' => 'nullable|mimes:png,jpg,jpeg,webp'
        ];
        $message = [
            'region_name.required' => 'Tối đa 50 ký tự',
            'isActive.required' => 'Vui lòng chọn trạng thái',
            'region_image.required' => 'Vui lòng chọn ảnh'
        ];
        $request->validate($rule, $message);
        if($request->has('region_image')){
            $file = $request->file('region_image');
            $extension = $file->getClientOriginalExtension();
            $path ='upload/region/';
            $filename = time(). '.'. $extension;
            $file->move($path, $filename);
        }
        Region::create([
            'region_name' => $request->region_name,
            'isActive' => $request->isActive,
            'region_image' => $path.$filename
        ]);
        
        return redirect('admin/region');
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_region)
    {
        $region = Region::findOrFail($id_region);
        return view('admin.region.edit', compact(['region']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_region)
    {
        $rule = [
            'region_name' => 'required|max:50',
            'isActive' => 'required',
            'region_image' => 'nullable|mimes:png,jpg,jpeg,webp'
        ];
        $message = [
            'region_name.required' => 'Tối đa 50 ký tự',
            'isActive.required' => 'Vui lòng chọn trạng thái',
            'region_image.required' => 'Vui lòng chọn ảnh'
        ];
        $request->validate($rule, $message);
        $region = Region::findOrFail($id_region);
        if($request->has('region_image')){
            $file = $request->file('region_image');
            $extension = $file->getClientOriginalExtension();
            $path ='upload/region/';
            $filename = time(). '.'. $extension;
            $file->move($path, $filename);

            if(File::exists($region->region_image)){
                File::delete($region->region_image);
            }
        }
        $region->update([
            'region_name' => $request->region_name,
            'isActive' => $request->isActive,
            'region_image' => $path.$filename
        ]);
        return redirect('admin/region');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id_region)
    {
        $region = Region::findOrFail($id_region);
        if(File::exists($region->region_image)){
            File::delete($region->region_image);
        }
        $region->delete();
        return redirect('admin/region');
    }

    public function export() 
    {
        // $filename = "region.xlsx";
        // return Excel::download(new RegionExport, $filename);
        return Excel::download(new RegionExport, 'users.xlsx');
    }
}
