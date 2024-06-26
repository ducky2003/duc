@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <a href="{{route('supplier.create')}}" class = "btn btn-primary">Add new</a>
        </div>
        <div>
            
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Hotline</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
         <tbody>
                @foreach($supplier as $key => $s)
                <tr>
                 <th scope="row">{{$key + 1}}</th>
                <td>{{$s->supp_name}}</td>
                <td>
                    {{$s->supp_location}}
                </td>
                <td>{{$s->hotline}}</td>
                <td>{{$s->email}}</td>
                <td>
                    @if($s->isActive == 1)
                        <span class="text-success">Hoạt động</span>
                    @elseif($s->isActive == 0)
                        <span class="text-danger">Tạm khóa</span>
                    @endif
                </td>
                
                <td>
                    <a href="{{route('supplier.edit', $s->id_supp)}}" class = "btn btn-primary btn-sm"
                    style = "width: 60px; height:30px">Edit</a>
                    
                    <a href="{{url('admin/supplier/'.$s->id_supp.'/delete')}}" 
                    class = "btn btn-danger btn-sm"
                    onclick="return confirm('You sure?')"style = "width: 60px; height:30px">Delete</a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$supplier->links('pagination::bootstrap-5')}}
    </div>
    </div>
    
@endsection