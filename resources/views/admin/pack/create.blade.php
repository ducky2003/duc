@extends('layouts.app')
@section('content')
<div class="container py-5">
@if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
               @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach 
            </ul>
        </div>
    @endif
    <h1>Create New Tour Packet</h1>
    <form class="row g-3 needs-validation" action="{{ route('pack.store') }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="mb-3">
            <label for="pack_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="pack_title" name="pack_title" required>
        </div>
        <div class="mb-3">
            <label for="pack_desc" class="form-label">Description</label>
            <textarea class="form-control" id="pack_desc" name="pack_desc" required></textarea>
        </div>
        <div class="mb-3">
            <label>Upload image</label>
            <input type="file" class="form-control" id="file" name="pack_img" required>
        </div>
        <div class="mb-3">
            <label for="pack_price" class="form-label">Price</label>
            <textarea class="form-control" id="pack_price" name="pack_price"></textarea>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start date</label>
            <input type="date" name="start_date" style="width: 100%; height: 4rem;border-radius: 5px;font-size: 20px;">
        </div>
        <div class="mb-3">
            <label for="pack_duration" class="form-label">Pack Duration</label>
            <textarea class="form-control" id="pack_duration" name="pack_duration"></textarea>
        </div>
        
        <div class="mb-3">
            <label for="pack_number" class="form-label">Pack Number</label>
            <textarea class="form-control" id="pack_number" name="pack_number"></textarea>
        </div>
        <div class="col-md mb-3 mt-3">
            <label for="id_supp" class="form-label">Supplier</label>
            <select class="form-select" id="id_supp" name="id_supp" required>
            <option selected disabled value="">Choose supplier</option>
            @foreach($supp as $key => $re)
                <option value="{{$re -> id_supp}}">{{$re->supp_name}}</option>
        
            @endforeach
            </select>
        </div>
        <div class="col-md mb-3 mt-3">
            <label for="id_place" class="form-label">Place</label>
            <select class="form-select" id="id_place" name="id_place" required>
            <option selected disabled value="">Choose place</option>
            @foreach($place as $key => $re)
                <option value="{{$re -> id_place}}">{{$re->place_name}}</option>
            @endforeach
            </select>
        </div>
        <div class="col-md mb-3 mt-3">
            <label for="id_category" class="form-label">category</label>
            <select class="form-select" id="id_category" name="id_category" required>
            <option selected disabled value="">Choose category</option>
            @foreach($category as $key => $re)
                <option value="{{$re -> id_category}}">{{$re->category_name}}</option>
            @endforeach
            </select>
        </div>
        <div class="col-md mb-3">
            <label for="isActive" class="form-label">Status</label>
            <select class="form-select" id="isActive" name="isActive" required>
            <option selected disabled value="">Choose...</option>
            <option value="1">1. Hoạt động</option>
            <option value="0">0. Tạm tắt</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<script>
    CKEDITOR.replace('pack_desc',{
        filebrowserUploadUrl: "{{ route('pack.upload', ['_token' => csrf_token() ]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection