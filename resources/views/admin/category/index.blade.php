
@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <a href="{{route('category.create')}}" class = "btn btn-primary">Add new</a>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th> Name</th>
                <th>Image</th>
                <th>Desc</th>
                <th>Status</th>
                <th style="width:115px">Func</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $key => $cate)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$cate->category_name}}</td>
                <td>
                    <img src="{{asset($cate->category_image)}}" width="100" height="100" alt="Img">
                </td>
                <td>
                    {{$cate->category_desc}}
                </td>
                <td>
                    @if($cate->isActive == 1)
                        <span class="text-success">Hoạt động</span>
                    @else
                        <span class="text-danger">Tạm khóa </span>
                    @endif
                </td>
                <td>
                    <a href="{{route('category.edit', $cate->id_category)}}" class = "btn btn-primary btn-sm">Edit</a>
                    
                    <a href="{{url('admin/category/'.$cate->id_category.'/delete')}}" 
                    class = "btn btn-danger btn-sm"
                    onclick="return confirm('You sure?')">Delete</a>
                    
                </td>
                <td></td>
                <td>{{$cate->created_at}}</td>
            </tr>
            @endforeach
            
        </tbody>
        </table>
        <div>
            {{$category->links('pagination::bootstrap-5')}}
        </div>
    </div>
@endsection

