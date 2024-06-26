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
    <h1>Edit Tour Packet</h1>
    <form action="{{ route('pack.update', $tour_packet->id_pack) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="pack_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="pack_title" name="pack_title" value="{{ $tour_packet->pack_title }}">
        </div>
        <div class="mb-3">
            <label for="pack_img" class="form-label">Image</label>
            <input type="file" class="form-control" id="pack_img" name="pack_img">
            @if ($tour_packet->pack_img)
                <img src="{{ asset($tour_packet->pack_img) }}" alt="{{ $tour_packet->pack_title }}" class="img-fluid mt-2" style="max-width: 150px;">
            @endif
        </div>
        <div class="mb-3">
            <label for="pack_desc" class="form-label">Description</label>
            <textarea class="form-control" id="pack_desc" name="pack_desc" >{{ $tour_packet->pack_desc }}</textarea>
        </div>
        <div class="mb-3">
            <label for="pack_number" class="form-label">Pack number</label>
            <input type="text" class="form-control" id="pack_number" name="pack_number" value="{{ $tour_packet->pack_number }}" >
        </div>
        <div class="mb-3">
            <label for="pack_price" class="form-label">Price</label>
            <input type="text" class="form-control" id="pack_price" name="pack_price" value="{{ $tour_packet->pack_price }}" >
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start date</label>
            <input type="text" class="form-control" id="start_date" name="start_date" value="{{ $tour_packet->start_date }}" >
        </div>
        <div class="col-md mb-3 mt-3">
            <label for="id_supp" class="form-label">Supplier</label>
            <select class="form-select" id="id_supp" name="id_supp" >
            <option selected disabled value="">{{$tour_packet->id_supp}}</option>
            @foreach($supp as $key => $re)
                <option value="{{$re -> id_supp}}"><p>ID - </p>{{$re->id_supp}}<p> - </p>{{$re->supp_name}}</option>
            @endforeach
            </select>
        </div>
        <div class="col-md mb-3 mt-3">
            <label for="id_place" class="form-label">Place</label>
            <select class="form-select" id="id_place" name="id_place" >
            <option selected disabled value="">{{$tour_packet->id_place}}</option>
            @foreach($place as $key => $re)
                <option value="{{$re -> id_place}}"><p>ID - </p>{{$re->id_place}}<p> - </p>{{$re->place_name}}</option>
            @endforeach
            </select>
        </div>
        <div class="col-md mb-3 mt-3">
            <label for="id_category" class="form-label">category</label>
            <select class="form-select" id="id_category" name="id_category">
            <option selected disabled value="">{{$tour_packet->id_category}}</option>
            @foreach($category as $key => $re)
                <option value="{{$re -> id_category}}"><p>ID - </p>{{$re->id_category}}<p> - </p>{{$re->category_name}}</option>
            @endforeach
            </select>
        </div>
        <div class="col-md mb-3">
            <label for="isActive" class="form-label">Status</label>
            <select class="form-select" id="isActive" name="isActive">
            <option selected disabled value="">Choose...</option>
            @if($tour_packet->isActive === 1)
                <option value="1"selected >Hoạt dộng</option>
                <option value="0">Tạm khóa</option>
            @else
                <option value="1" >Hoạt động</option>
                <option value="0"selected>Tạm khóa</option>
            @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    CKEDITOR.replace('pack_desc', {
        filebrowserUploadUrl: "{{ route('pack.upload', ['_token' => csrf_token() ]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection