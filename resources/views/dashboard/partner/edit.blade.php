@extends('dashboard.layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit partner</h1>
</div>
<div class="row">
    <div class="col-lg-8">
        <form action="/dashboard/partner/{{ $partner->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label class="form-label">Name Partner</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" value="{{ old('name', $partner->name) }}">
                @error('name')
                <div class="text-danger">Harus diisi gaes! Min 5 huruf</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="image_partner" class="form-label">Image partner</label>
                <input type="hidden" name="oldImage" value="{{ $partner->image_partner }}">
                @if($partner->image_partner)
                <img src="{{ asset('storage/'.$partner->image_partner) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                <img class="img-preview img-fluid mb-3 col-sm-5">{{-- penampil gambar --}}
                @endif
                <img class="img-preview img-fluid mb-3 col-sm-5">{{-- penampil gambar --}}
                <input name="image_partner" class="form-control  @error('image_partner') is-invalid @enderror" type="file" id="image_partner" onchange="previewImage()">
              </div>
              @error('image_partner')
              <div class="text-danger">File harus gambar  dan max 1MB!</div>
              @enderror
            <button type="submit" class="btn btn-primary">Update partner</button>
          </form>
    </div>
</div>
<script>
    //fungsi penampil gambar
    function previewImage(){
    const image = document.querySelector('#image_partner');//mengambil selector id
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