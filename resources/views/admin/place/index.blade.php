@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <a href="{{route('place.create')}}" class = "btn btn-primary">Add new</a>
        </div>
        <div>
            
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Hotline</th>
                    <th scope="col">Location</th>
                    
                    <th scope="col">Status</th>
                </tr>
            </thead>
         <tbody>
                @foreach($place as $key => $p)
                <tr>
                 <th scope="row">{{$key + 1}}</th>
                <td>{{$p->place_name}}</td>
                <td>{{$p->hotline}}</td>
                <td>{{$p->location}}</td>
                <td>
                    @if($p->isActive == 1)
                        <span class="text-success">Hoạt động</span>
                    @elseif($p->isActive == 0)
                        <span class="text-danger">Tạm khóa</span>
                    @endif
                </td>
                
                <td>
                    <a href="{{route('place.edit', $p->id_place)}}" class = "btn btn-primary btn-sm">Edit</a>
                    
                    <a href="{{url('admin/place/'.$p->id_place.'/delete')}}" 
                    class = "btn btn-danger btn-sm"
                    onclick="return confirm('You sure?')">Delete</a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$place->links('pagination::bootstrap-5')}}
    </div>
    </div>
    
@endsection