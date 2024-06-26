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
<form class="row g-3 needs-validation" action="{{route('supplier.store')}}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="col-md-6 mb-3">
        <label for="supp_name" class="form-label">Supplier Name</label>
        <input type="text" class="form-control" id="supp_name" name="supp_name" value="" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="supp_desc" class="form-label">supp_desc</label>
        <input type="text" class="form-control" id="supp_desc" name="supp_desc" value="">
    </div>
    <div class="col-md-6 mb-3">
        <label for="supp_location" class="form-label">supp_location</label>
        <input type="text" class="form-control" id="supp_location" name="supp_location" value="" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="hotline" class="form-label">hotline</label>
        <input type="text" class="form-control" id="hotline" name="hotline" value="" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="email" class="form-label">email</label>
        <input type="text" class="form-control" id="email" name="email" value="" required>
    </div>
    <div class="col-md mb-3">
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
 