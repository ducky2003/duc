@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <a href="{{route('post.create')}}" class = "btn btn-primary">Add new</a>
        </div>
        <div>
            
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
         <tbody>
                @foreach($post as $key => $p)
                <tr>
                 <th scope="row">{{$key + 1}}</th>
                <td>{{$p->post_title}}</td>
                <td>
                    <img src="{{asset($p->post_img)}}" width="100" height="100" alt="Img">
                </td>
                <td>{!! $p->post_desc !!}</td>
                <td>{{$p->post_date}}</td>
                <td>
                    @if($p->isActive == 1)
                        <span class="text-success">Hoạt động</span>
                    @elseif($p->isActive == 0)
                        <span class="text-danger">Tạm khóa</span>
                    @endif
                </td>
                
                <td>
                    <a href="{{route('post.edit', $p->id_post)}}" class = "btn btn-primary btn-sm mb-2"
                    style = "width: 60px; height:30px">Edit</a>
                    
                    <a href="{{url('admin/post/'.$p->id_post.'/delete')}}" 
                    class = "btn btn-danger btn-sm"
                    onclick="return confirm('You sure?')"style = "width: 60px; height:30px">Delete</a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$post->links('pagination::bootstrap-5')}}
    </div>
    </div>
    
@endsection