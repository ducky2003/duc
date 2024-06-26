@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <a href="{{route('pack.create')}}" class = "btn btn-primary">Add new</a>
        </div>
        <div>
            
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pack Title</th>
                    <th scope="col">Pack Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
         <tbody>
                @foreach($pack as $key => $p)
                <tr>
                 <th scope="row">{{$key + 1}}</th>
                <td>{{$p->pack_title}}</td>
                <td>
                    <textarea style="width: 600px;height: 100px;" name="" id="" readonly>{!! $p->pack_desc !!}</textarea>
                </td>
                <td>
                    <img src="{{asset($p->pack_img)}}" width="100" height="100" alt="Img">
                </td>
                <td>{{$p->pack_price}} VND</td>
                <td>
                    @if($p->isActive == 1)
                        <span class="text-success">Hoạt động</span>
                    @elseif($p->isActive == 0)
                        <span class="text-danger">Tạm khóa</span>
                    @endif
                </td>
                
                <td>
                    <a href="{{route('pack.edit', $p->id_pack)}}" class = "btn btn-primary btn-sm">Edit</a>
                    
                    <a href="{{url('admin/pack/'.$p->id_pack.'/delete')}}" 
                    class = "btn btn-danger btn-sm"
                    onclick="return confirm('You sure?')">Delete</a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$pack->links('pagination::bootstrap-5')}}
    </div>
    </div>
    
@endsection