@extends('dashboard.layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Slidder</h1>
</div>
<div class="row">
    <div class="col-lg-8">
        <form action="/dashboard/slidder/{{ $slidder->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
              <div class="mb-3">
                <label for="image_slidder" class="form-label">Image Slidder</label>
                <input type="hidden" name="oldImage" value="{{ $slidder->image_slidder }}">
                @if($slidder->image_slidder)
                <img src="{{ asset('storage/'.$slidder->image_slidder) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                <img class="img-preview img-fluid mb-3 col-sm-5">{{-- penampil gambar --}}
                @endif
                <img class="img-preview img-fluid mb-3 col-sm-5">{{-- penampil gambar --}}
                <input name="image_slidder" class="form-control  @error('image_slidder') is-invalid @enderror" type="file" id="image_slidder" onchange="previewImage()">
              </div>
              @error('image_slidder')
              <div class="text-danger">File harus gambar  dan max 1MB!</div>
              @enderror
            <button type="submit" class="btn btn-primary">Update Slidder</button>
          </form>
    </div>
</div>
<script>
    //fungsi penampil gambar
    function previewImage(){
    const image = document.querySelector('#image_slidder');//mengambil selector id
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display='block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection