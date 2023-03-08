@extends('dashboard.layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Category</h1>
</div>
<div class="row">
    <div class="col-lg-8">
        <form action="/dashboard/categories" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name Category</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" value="{{ old('name') }}">
                @error('name')
                <div class="text-danger">Harus diisi gaes! Min 5 huruf</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="inputSlug" readonly  value="{{ old('slug')}}">
                @error('slug')
                <div class="text-danger">Tidak boleh kosong!</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="image_category" class="form-label">Image Category</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">{{-- penampil gambar --}}
                <input name="image_category" class="form-control  @error('image_category') is-invalid @enderror" type="file" id="image_category" onchange="previewImage()">
              </div>
              @error('image_category')
              <div class="text-danger">File harus gambar  dan max 1MB!</div>
              @enderror
            <button type="submit" class="btn btn-primary mt-3">Create Category</button>
          </form>
    </div>
</div>
{{-- untuk mengambil slug berdasarkan title --}}
<script>
  const name = document.querySelector('#inputName')//mengambil selector inputan id
  const slug = document.querySelector('#inputSlug')//mengambil selector inputan id
  name.addEventListener('change', function(){
    fetch('/dashboard/categories/checkSlug?name='+name.value)
    .then(response=>response.json())
    .then(data=>slug.value=data.slug)
  });
  //fungsi penampil gambar
  function previewImage(){
    const image = document.querySelector('#image_category');//mengambil selector id
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