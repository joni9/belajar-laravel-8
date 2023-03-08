@extends('dashboard.layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create dosen</h1>
</div>
<div class="row">
    <div class="col-lg-8">
        <form action="/dashboard/dosen" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name dosen</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" value="{{ old('name') }}">
                @error('name')
                <div class="text-danger">Harus diisi gaes! Min 5 huruf</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">NPM</label>
                <input type="number" name="npm" class="form-control @error('npm') is-invalid @enderror" id="inputnpm" value="{{ old('npm') }}">
                @error('npm')
                <div class="text-danger">Harus diisi gaes!</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="image_dosen" class="form-label">Image dosen</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">{{-- penampil gambar --}}
                <input name="image_dosen" class="form-control  @error('image_dosen') is-invalid @enderror" type="file" id="image_dosen" onchange="previewImage()">
              </div>
              @error('image_dosen')
              <div class="text-danger">File harus gambar  dan max 1MB!</div>
              @enderror
            <button type="submit" class="btn btn-primary">Create dosen</button>
          </form>
    </div>
</div>
<script>
  //fungsi penampil gambar
  function previewImage(){
    const image = document.querySelector('#image_dosen');//mengambil selector id
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