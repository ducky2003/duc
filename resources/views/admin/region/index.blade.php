
@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <a href="{{route('region.create')}}" class = "btn btn-primary">Add new</a>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Status</th>
                <th>Created date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($region as $key => $re)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$re->region_name}}</td>
                <td>
                    <img src="{{asset($re->region_image)}}" width="100" height="100" alt="Img">
                </td>
                <td>
                    @if($re->isActive == 1)
                        <span class="text-success">Hoạt động</span>
                    @else
                        <span class="text-danger">Tạm khóa </span>
                    @endif
                </td>
                <td>
                    <a href="{{route('region.edit', $re->id_region)}}" class = "btn btn-primary btn-sm">Edit</a>
                    <!-- <a data-id="{{$re->id_region}}" class = "btn btn-danger btn-sm"data-bs-toggle="modal" 
                    data-bs-target="#DelModal" type="button">Delete</a> -->
                    <a href="{{url('admin/region/'.$re->id_region.'/delete')}}" 
                    class = "btn btn-danger btn-sm"
                    onclick="return confirm('You sure?')">Delete</a>
                    
                </td>
                <td></td>
                <td>{{$re->created_at}}</td>
            </tr>
            @endforeach
            
        </tbody>
        </table>
        <div>
            {{$region->links('pagination::bootstrap-5')}}
        </div>
    </div>
@endsection

