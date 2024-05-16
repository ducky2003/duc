<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Region;
class PlaceController extends Controller
{
    public function index(){
        $place = Place::paginate(8);
        return view('admin.place.index', ['place'=>$place]);
    }
    public function create(){
        $region = Region::where('isActive', 1)->get();
        return view('admin.place.create', compact('region'));
    }
    public function showAll(){
        $place = Place::all();
        return view('place', ['place'=>$place]);
    }

    
    
    public function store(Request $request){
        $rule = [
            'place_name' => 'required|max:50',
            'isActive' => 'required',
            'place_img' => 'nullable|mimes:png,jpg,jpeg,webp',
            'hotline' => 'nullable',
            'location' => 'required|max:200',
            'description' => 'required',
            'id_region' => 'required'
        ];
        $message = [
            'place_name.required' => 'Tối đa 50 ký tự',
            'isActive.required' => 'Vui lòng chọn trạng thái',
            'place_img.required' => 'Vui lòng chọn ảnh',
            'location' => 'Vui lòng nhập địa chỉ',
            'description' => 'Vui lòng nhập mô tả',
            'id_region' => 'Vui lòng chọn vùng'
        ];
        $request->validate($rule, $message);
        if($request->has('place_img')){
            $file = $request->file('place_img');
            $extension = $file->getClientOriginalExtension();
            $path ='upload/place/';
            $filename = time(). '.'. $extension;
            $file->move($path, $filename);
        }
        Place::create([
            'place_name' => $request->place_name,
            'isActive' => $request->isActive,
            'place_img' => $path.$filename,
            'hotline' => $request->hotline,
            'location' => $request->location,
            'description' => $request->description,
            'id_region' => $request->id_region
        ]);
        
        return redirect('admin/place');
    }
    public function edit($id){
        $place = Place::find($id);
       
        return view('admin.place.edit', compact('place'));
    }
    public function update(Request $request, $id){
        $rule = [
            'place_name' => 'required|max:50',
            'isActive' => 'required',
            'place_img' => 'nullable|mimes:png,jpg,jpeg,webp',
            'hotline' => 'nullable',
            'location' => 'required|max:200',
            'description' => 'required',
            'id_region' => 'required'
        ];
        $message = [
            'place_name.required' => 'Tối đa 50 ký tự',
            'isActive.required' => 'Vui lòng chọn trạng thái',
            'place_img.required' => 'Vui lòng chọn ảnh',
            'location' => 'Vui lòng nhập địa chỉ',
            'description' => 'Vui lòng nhập mô tả',
            'id_region' => 'Vui lòng chọn vùng'
        ];
        $request->validate($rule, $message);
        $place = Place::findOrFail($id);
        if($request->has('place_img')){
            $file = $request->file('place_img');
            $extension = $file->getClientOriginalExtension();
            $path ='upload/place/';
            $filename = time(). '.'. $extension;
            $file->move($path, $filename);
            if(File::exists($place->place_img)){
                File::delete($place->place_img);
            }
        }
        $place->update([
            'place_name' => $request->place_name,
            'isActive' => $request->isActive,
            'place_img' => $path.$filename,
            'hotline' => $request->hotline,
            'location' => $request->location,
            'description' => $request->description,
            'id_region' => $request->id_region
        ]);
        
        return redirect('admin/place');
    }
    public function destroy($id){
        $place = Place::findOrFail($id);
        if(File::exists($place->place_img)){
            File::delete($place->place_img);
        }
        $place->delete();
        return redirect('admin/place');
    }
}
