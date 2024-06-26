
@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <a href="{{route('menu.create')}}" class = "btn btn-primary">Add new</a>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Route</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menu as $key => $re)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                
                <td>{{$re->menu_name}}</td>
                <td>{{$re->route}}</td>
                <td>
                    @if($re->isActive == 1)
                        <span class="text-success">Hoạt động</span>
                    @else
                        <span class="text-danger">Tạm khóa </span>
                    @endif
                </td>
                <td>
                    <a href="{{route('menu.edit', $re->id_menu)}}" class = "btn btn-primary btn-sm">Edit</a>
                    <!-- <a data-id="{{$re->id_menu}}" class = "btn btn-danger btn-sm"data-bs-toggle="modal" 
                    data-bs-target="#DelModal" type="button">Delete</a> -->
                    <a href="{{url('admin/menu/'.$re->id_menu.'/delete')}}" 
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
            {{$menu->links('pagination::bootstrap-5')}}
        </div>
    </div>
@endsection

