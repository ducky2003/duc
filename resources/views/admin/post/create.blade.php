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
<form class="row g-3 needs-validation" action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="col-md-6 mb-3">
        <label for="post_desc" class="form-label">Post Description</label>
        <textarea class="form-control" id="post_desc" name="post_desc" required></textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label for="post_title" class="form-label">Post Title</label>
        <input type="text" class="form-control" id="post_title" name="post_title" value="" required>
    </div>
    
    <div class="col-md-6 mt-3">
        <label for="post_date" class="form-label">post_date</label>
        <div class="input-group">
        <input type="date" class="form-control" id="post_date" name="post_date"  aria-describedby="inputGroupPrepend2" required>
    </div>
    <div class="col-md mb-3 mt-3">
        <label for="id_place" class="form-label">Place</label>
        <select class="form-select" id="id_place" name="id_place" required>
        <option selected disabled value="">Choose Place</option>
        @foreach($place as $key => $re)
            <option value="{{$re -> id_place}}">{{$re -> id_place}}--{{$re->place_name}}</option>
       
        @endforeach
       

        </select>
    </div>
    <div class="col-md mb-3 mt-3">
        <label for="id_supp" class="form-label">Supplier</label>
        <select class="form-select" id="id_supp" name="id_supp" required>
        <option selected disabled value="">Choose supplier</option>
        @foreach($supp as $key => $re)
            <option value="{{$re -> id_supp}}">{{$re -> id_supp}}--{{$re->supp_name}}</option>
       
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
        <input type="file" class="form-control" id="file" name="post_img" required>
    </div>
    <div class="mb-3">
    <label for="post_content" class="form-label">content</label>
    <textarea class="form-control" id="post_content" name="post_content" rows="3" required></textarea>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Create</button>
    </div>
</form>
</div>
<script>
    CKEDITOR.replace('post_content',{
        filebrowserUploadUrl: "{{ route('post.upload', ['_token' => csrf_token() ]) }}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('post_desc',{
        filebrowserUploadUrl: "{{ route('post.upload', ['_token' => csrf_token() ]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
 