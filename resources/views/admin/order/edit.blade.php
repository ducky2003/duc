
@extends('layouts.app')
@section('content')
<div class="container">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
               @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach 
            </ul>
        </div>
    @endif
<form class="row g-3 needs-validation" action="{{route('order.update', $order->id_order)}}" method="POST" enctype="multipart/form-data" novalidate>
@method('PUT')    
@csrf
    <div class="col-md-6">
        <label for="state" class="form-label">State</label>

        <select class="form-select" id="state" name="state" required>
        <option selected disabled value="">Choose...</option>
        @if($order->state === 0)
            <option value="0"selected >Đang chờ</option>
            <option value="1">Đã xử lý</option>
        @else
            <option value="0" >Đang chờ</option>
            <option value="1"selected>Đã xử lý</option>
        @endif
        </select>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
</div>
@endsection