@extends('dashboard.layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Post</h1>
</div>
<div class="row">
    <div class="col-lg-8">
        <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title Post</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputTitle" value="{{ old('title') }}">
                @error('title')
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
                <label class="form-label">Category</label>
                <select class="form-select" name="id_category">
                  @foreach ($categories as $category)
                  @if (old('id_category')==$category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->name }}</option>   
                  @else
                  <option value="{{ $category->id }}">{{ $category->name }}</option> 
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="image_post" class="form-label">Image post</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">{{-- penampil gambar --}}
                <input name="image_post" class="form-control  @error('image_post') is-invalid @enderror" type="file" id="image_post" onchange="previewImage()">
              </div>
              @error('image_post')
              <div class="text-danger">File harus gambar  dan max 1MB!</div>
              @enderror
            <div class="mb-3 mt-3">
              <label class="form-label">Descripsi</label>
              <input id="description" type="hidden" name="description" class="@error('description') is-invalid @enderror" value="{{ old('description') }}">  
              <trix-editor input="description"></trix-editor>
              @error('description')
              <div class="text-danger">Harus diisi gaes!</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
          </form>
    </div>
</div>
{{-- untuk mengambil slug berdasarkan title --}}
<script>
  const title = document.querySelector('#inputTitle')//mengambil selector inputan id
  const slug = document.querySelector('#inputSlug')//mengambil selector inputan id
  title.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?title='+title.value)
    .then(response=>response.json())
    .then(data=>slug.value=data.slug)
  });

  //code keamanan agar tidak bisa upload file di descripsi
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })
  //fungsi penampil gambar
  function previewImage(){
    const image = document.querySelector('#image_post');//mengambil selector id
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