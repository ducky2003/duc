@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th cope="col">Created date</th>
                </tr>
            </thead>
         <tbody>
                @foreach($users as $key => $user)
                <tr>
                 <th scope="row">{{$key + 1}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    
@endsection