@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1 class="mb-3 mt-3">Halaman Category {{ $category->name }}</h1>
      </div>
      <div class="col-md-4 ">
        <div class="input-group mb-3 mt-4">
          <input type="text" class="form-control" placeholder="Search....." name="search">
          <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
      </div>
    </div>
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div  class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.7)">{{ $post->category->name }}</div>
                    <img src="{{ url('images/co.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{  $post->title  }}</h5>
                      <p><small class="text-muted">By. {{ $post->User->name }} on {{ $post->published_at}}</small></p>
                      <p class="card-text">{{ $post->short}}</p>
                      <a href="/posts/{{ $post->slug}}" class="btn btn-primary">Read More</a>
                    </div>
                  </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center mt-4">
              {{-- //untuk menampilkan page 1,2,dst... --}}
              {{-- {{ $posts->links() }} --}}
            </div>
        </div>
    {{-- </div> --}}

</div>
  
@endsection
