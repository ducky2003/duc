<?php

namespace App\Http\Controllers;
use App\Models\PackCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PackCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = PackCategory::paginate(8);
        return view('admin.category.index', ['category'=>$category]);
    }
    public function getData(){

        // Truyền dữ liệu đến view
       
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->has('category_image')){
            $file = $request->file('category_image');
            $extension = $file->getClientOriginalExtension();
            $path ='upload/category/';
            $filename = time(). '.'. $extension;
            $file->move($path, $filename);
        }
        PackCategory::create([
            'category_name' => $request->category_name,
            'category_desc' => $request->category_desc,
            'isActive' => $request->isActive,
            'category_image' => $path.$filename
        ]);
        
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     */
    public function show(PackCategory $packCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_category)
    {
        $category = PackCategory::findOrFail($id_category);
        return view('admin.category.edit', compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_category)
    {
        $category = PackCategory::findOrFail($id_category);
        $filename = $category->category_image;
        if($request->hasFile('category_image')){
            $file = $request->file('category_image');
            $extension = $file->getClientOriginalExtension();
            $path ='upload/category/';
            $filename =$path. time(). '.'. $extension;
            $file->move(public_path($path), $filename);

            if(File::exists($category->category_image)){
                File::delete($category->category_image);
            }
        }
        $category->update([
            'category_name' => $request->category_name,
            'isActive' => $request->isActive,
            'category_image' => $filename
        ]);
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id_category)
    {
        $category= PackCategory::findOrFail($id_category);
        if(File::exists($category->category_image)){
            File::delete($category->category_image);
        }
        $category->delete();
        return redirect('admin/category');
    }
}
