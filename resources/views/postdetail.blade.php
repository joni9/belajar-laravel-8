@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
                <div class="col">
                        <h2 class="title mb-3 mt-3 text-center">{{ $post->title}}</h2>
                        <img src="{{ asset('storage/'.$post->image_post) }}" class="img-fluid mb-3 mt-3 rounded" alt="...">
                        <p><small class="text-muted"><a href="/posts?User={{$post->User->name}}" class="text-decoration-none text-dark font-weight-bold">By. {{ $post->User->name }}</a> on {{ $post->published_at}} in <a href="/posts?category={{$post->category->slug}}" class="text-decoration-none text-dark font-weight-bold">{{ $post->category->name}}</a></small>
                        <span>{!! $post->description !!}</span>
                </div>
        </div>
</div>   
@endsection
