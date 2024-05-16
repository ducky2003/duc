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
<form class="row g-3 needs-validation" action="{{route('region.store')}}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="col-md-6">
        <label for="place_name" class="form-label">Region Name</label>
        <input type="text" class="form-control" id="place_name" name="region_name" value="" required>
    </div>
    <div class="col-md-6">
        <label for="isActive" class="form-label">Status</label>
        <select class="form-select" id="isActive" name="isActive" required>
        <option selected disabled value="">Choose...</option>
        <option value="1">1</option>
        <option value="2">0</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Upload file</label>
        <input type="file" class="form-control" id="file" name="region_image" required>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Create</button>
    </div>
</form>

</div>
@endsection
