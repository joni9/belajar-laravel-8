@extends('layouts.app')
@section('content')
<div class="container rounded mt-3 shadow" style="background:#ffffff;">
    <div class="row mt-3 mb-3" >
      <div class="col-md-8">
        <h1 class="mb-3 mt-3" style="color: #3ee728;">{{ $title }}</h1>
      </div>
      <div class="col-md-4 ">
        <form action="/posts">
          @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">  
          @endif
          @if (request('User'))
            <input type="hidden" name="User" value="{{ request('User') }}">  
          @endif
        <div class="input-group mb-3 mt-4">
          <input type="text" class="form-control" placeholder="Search....." name="search" value="{{ request('search') }}">
          <button class="btn btn-outline-success" style="background:#3ee728;" type="submit">Search</button>
        </div>
      </form>
      </div>
    </div>
    
    @if($posts->count())
    <div class="row">
      <div class="d-flex justify-content-center">
        <div class="card mb-3 card rounded shadow" style=" border:solid 4px #3ee728;">
            <img src="{{ asset('storage/'.$posts[0]->image_post) }}" class="card-img-top p-2" style="border-radius: 15px" >
            <div class="card-body">
              <h5 class="card-title text-center"  style="color: #3ee728;">{{ $posts[0]->title }}</h5>
              <p class="card-text"><small class="text-muted">
               <a href="/posts?User={{$posts[0]->User->name}}" class="text-decoration-none text-dark font-weight-bold"> By. {{ $posts[0]->User->name }}</a> in <a href="/posts?category={{$posts[0]->category->slug}}" class="text-decoration-none text-dark font-weight-bold"> {{ $posts[0]->category->name }} </a> on  {{ $posts[0]->published_at}}</small></p>
              <p class="card-text">{{ $posts[0]->short}}</p>
              <a href="/posts/{{ $posts[0]->slug}}" class="btn" style="background: #3ee728;; color:white; 
                border-bottom:solid 4px #15b915;
                border-right:solid 4px #15b915;" onMouseOver="this.style.color='green'"
                  onMouseOut="this.style.color='white'">Read More</a>
            </div>
        </div>
      </div>
    </div>
 
    @endif

        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card rounded card rounded  shadow" style=" border:solid 4px #3ee728;">
                    <div class="position-absolute px-3 py-2 text-white rounded m-2" style="background-color: rgb(56, 241, 96)"><a href="/posts?category={{$post->category->slug}}" class="text-decoration-none text-light font-weight-bold"> {{ $post->category->name }} </a></div>
                    <img src="{{ asset('storage/'.$post->image_post) }}" class="card-img-top p-2" style="border-radius: 15px">
                    <div class="card-body">
                      <h5 class="card-title text-center" style="color: #3ee728;">{{  $post->title  }}</h5>
                      <p class=" text-center"><small class="text-muted"> <a href="/posts?User={{$post->User->name}}" class="text-decoration-none text-dark font-weight-bold"> By. {{ $post->User->name }} </a> on 
                        {{ $post->published_at}}</small></p>
                      <p class="card-text">{{ $post->short}}</p>
                      <a href="/posts/{{ $post->slug}}" class="btn" style="background: #3ee728;; color:white; 
                        border-bottom:solid 4px #15b915;
                        border-right:solid 4px #15b915;" onMouseOver="this.style.color='green'"
                          onMouseOut="this.style.color='white'">Read More</a>
                    </div>
                  </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center mt-4">
              {{-- //untuk menampilkan page 1,2,dst... --}}
              {{ $posts->links() }}
            </div>
        </div>


</div>   
@endsection
