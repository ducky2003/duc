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
<form class="row g-3 needs-validation" action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="col-md-6">
        <label for="route" class="form-label">menu Name</label>
        <input type="text" class="form-control" id="menu_name" name="menu_name" value="" required>
    </div>
    <div class="col-md-6">
        <label for="route" class="form-label">Route</label>
        <input type="text" class="form-control" id="route" name="route" value="" required>
    </div>
    <div class="col-md-6">
        <label for="isActive" class="form-label">Status</label>
        <select class="form-select" id="isActive" name="isActive" required>
        <option selected disabled value="">Choose...</option>
        <option value="1">1</option>
        <option value="0">0</option>
        </select>
    </div>
    
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Create</button>
    </div>
</form>

</div>
@endsection
