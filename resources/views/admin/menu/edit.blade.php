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
<form class="row g-3 needs-validation" action="{{route('region.update', $region->id_region)}}" method="POST" enctype="multipart/form-data" novalidate>
@method('PUT')    
@csrf
    <div class="col-md-6">
        <label for="region_name" class="form-label">Region Name</label>
        <input type="text" class="form-control" id="region_name" name="region_name" value="{{"$region->region_name"}}" required>
    </div>
    <div class="col-md-6">
        <label for="isActive" class="form-label">Status</label>

        <select class="form-select" id="isActive" name="isActive" required>
        <option selected disabled value="">Choose...</option>
        @if($region->isActive === 1)
            <option value="1"selected >Hoạt dộng</option>
            <option value="0">Tạm khóa</option>
        @else
            <option value="1" >Hoạt động</option>
            <option value="0"selected>Tạm khóa</option>
        @endif
        </select>
    </div>
    <div class="mb-3">
        <label for="region_img" class="form-label">Upload file</label>
        <input type="file" class="form-control" id="file" name="region_image"value="{{"$region->region_name"}}" required>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
</div>
@endsection