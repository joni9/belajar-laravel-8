@extends('dashboard.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col mt-3">
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left" class="align-text-bottom"></span> Back to MyPost</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit" class="align-text-bottom"></span> Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method("DELETE")
                <button type="submit" class="btn btn-danger border-0" onclick="return confirm('are you sure delete {{ $post->title }}???')"><span data-feather="trash-2" class="align-text-bottom"></span> Hapus</button>
                @csrf
                </form>
        </div>
    </div>
    <div class="row">
            <div class="col">
                <h2 class="title mb-3 mt-3 text-center">{{ $post->title}}</h2>
                <img src="{{ asset('storage/'.$post->image_post) }}" class="img-fluid mb-3 mt-3 rounded" alt="...">
                <p><small class="text-muted"><a href="/posts?User={{$post->User->name}}" class="text-decoration-none text-dark font-weight-bold">By. {{ $post->User->name }}</a> on {{ $post->published_at}} in <a href="/posts?category={{$post->category->slug}}" class="text-decoration-none text-dark font-weight-bold">{{ $post->category->name}}</a></small>
                <span>{!! $post->description !!}<span>
            </div>
    </div>
</div>
@endsection