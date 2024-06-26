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
<form class="row g-3 needs-validation" action="{{route('place.store')}}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="col-md-6 mb-3">
        <label for="place_name" class="form-label">Place Name</label>
        <input type="text" class="form-control" id="place_name" name="place_name" value="" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="hotline" class="form-label">Hotline</label>
        <input type="text" class="form-control" id="hotline" name="hotline" value="" required>
    </div>
    <div class="col-md-6 mt-3">
        <label for="location" class="form-label">Location</label>
        <div class="input-group">
        <input type="text" class="form-control" id="location" name="location"  aria-describedby="inputGroupPrepend2" required>
    </div>
    <div class="col-md mb-3 mt-3">
        <label for="id_region" class="form-label">Region</label>
        <select class="form-select" id="id_region" name="id_region" required>
        <option selected disabled value="">Choose region</option>
        @foreach($region as $key => $re)
            <option value="{{$re -> id_region}}">{{$re->region_name}}</option>
       
        @endforeach
       

        </select>
    </div>
    <div class="col-md mb-3">
        <label for="isActive" class="form-label">Status</label>
        <select class="form-select" id="isActive" name="isActive" required>
        <option selected disabled value="">Choose...</option>
        <option value="1">1</option>
        <option value="0">0</option>

        </select>
    </div>
    <div class="mb-3">
        <label>Upload image</label>
        <input type="file" class="form-control" id="file" name="place_img" required>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Desc</label>
    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Create</button>
    </div>
</form>
</div>

@endsection
 