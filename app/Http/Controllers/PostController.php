<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Place;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function detail($id_post){
        $post = Post::with('supplier', 'place')->findOrFail($id_post);
        
        $relatedPosts = DB::table('post')
            ->select('post.*', 'place.place_name')
            ->join('place', 'post.id_place', '=', 'place.id_place')
            ->where('post.isActive', 1)
            ->limit(15)
            ->get();
        $comments = Comment::where('id_post', $id_post)->with('user')->get();
        return view('detail_post', compact('post', 'relatedPosts', 'comments'));
    }
    public function storeComment(Request $request)
    {
        $request->validate([
            
            'comment' => 'required|string'
        ]);

        Comment::create([
            
            'id_post' => $request->input('id_post'),
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
    public function getData(){
        $post = DB::select("
            select post.*, place.place_name, supplier.supp_name
            from post
            join place on post.id_place = place.id_place
            join supplier on post.id_supp = supplier.id_supp
        ");
        return view('post', compact('post'));
    }
    public function showPost($id){
        $post = Post::findOrFail($id);
        return view('detail_post', compact('post'));
    }

    public function index(){
        $post = Post::paginate(5);
        return view('admin.post.index', compact('post'));
    }
    public function create(){
        $place = Place::where('isActive', 1)->get();
        $supp = Supplier::where('isActive', 1)->get();
        return view('admin.post.create', compact('place','supp'));
    }
    public function store(Request $request){
        $rule = [
            'post_title' => 'required|max:100',
            'isActive' => 'required',
            'post_img' => 'nullable|mimes:png,jpg,jpeg,webp',
            'post_desc' => 'required|max:20000',
            'post_content' => 'required|max:200000',
            'post_date' => 'required',
            'id_supp' => 'required',
            'id_place' => 'required'
        ];
        $message = [
            'post_title.required' => 'Tối đa 100 ký tự',
            'isActive.required' => 'Vui lòng chọn trạng thái',
            'post_img.required' => 'Vui lòng chọn ảnh',
            'post_desc' => 'Vui lòng nhập mô tả',
            'post_content' => 'Vui lòng nhập nội dung',
            'post_date' => 'Vui lòng chọn ngày',
            'id_supp' => 'Vui lòng chọn nhà cung cấp',
            'id_place' => 'Vui lòng chọn địa điểm'
        ];
        $request->validate($rule, $message);
        if($request->has('post_img')){
            $file = $request->file('post_img');
            $extension = $file->getClientOriginalExtension();
            $path ='upload/post/';
            $filename = time(). '.'. $extension;
            $file->move($path, $filename);
        }
        Post::create([
            'post_title' => $request->post_title,
            'isActive' => $request->isActive,
            'post_img' => $path.$filename,
            'post_desc' => $request->post_desc,
            'post_content' => $request->post_content,
            'post_date' => $request->post_date,
            'id_supp' => $request->id_supp,
            'id_place' => $request->id_place
        ]);
        
        return redirect('admin/post');
    }
    public function edit($id){
        $post = Post::find($id);
        $place = Place::where('isActive', 1)->get();
        $supp = Supplier::where('isActive', 1)->get();
        return view('admin.post.edit', compact('post', 'place', 'supp'));
    }public function update(Request $request, $id){
        $request->validate([
            'post_title' => 'nullable|max:100',
            'isActive' => 'nullable',
            'post_img' => 'nullable|mimes:png,jpg,jpeg,webp',
            'post_desc' => 'nullable',
            'post_content' => 'nullable|max:200000',
            'post_date' => 'nullable',
            'id_supp' => 'nullable',
            'id_place' => 'nullable'
        ]);
        $post = Post::findOrFail($id);
        $filename = $post->post_img;
        if($request->hasFile('post_img')){
            $file = $request->file('post_img');
            $extension = $file->getClientOriginalExtension();
            $path ='upload/post/';
            $filename =$path. time(). '.'. $extension;
            $file->move(public_path($path), $filename);

            if(File::exists($post->post_img)){
                File::delete($post->post_img);
            }
        }
        $post->update([
            'post_title' => $request->post_title,
            'isActive' => $request->isActive,
            'post_img' => $filename,
            'post_desc' => $request->post_desc,
            'post_content' => $request->post_content,
            'post_date' => $request->post_date,
            'id_supp' =>$request->input('id_supp', $post->id_supp),
            'id_place' =>$request->input('id_place', $post->id_place),
        ]);
        
        return redirect('admin/post');
    }
    public function destroy($id){
        $post = Post::findOrFail($id);
        if(File::exists($post->post_img)){
            File::delete($post->post_img);
        }
        $post->delete();
        return redirect('admin/post');
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
