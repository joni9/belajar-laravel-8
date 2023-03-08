@extends('dashboard.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col mt-3">
            <a href="/dashboard/info" class="btn btn-success"><span data-feather="arrow-left" class="align-text-bottom"></span> Back to MyPost</a>
            <a href="/dashboard/info/{{ $info->slug }}/edit" class="btn btn-warning"><span data-feather="edit" class="align-text-bottom"></span> Edit</a>
            <form action="/dashboard/info/{{ $info->slug }}" method="post" class="d-inline">
                @method("DELETE")
                <button type="submit" class="btn btn-danger border-0" onclick="return confirm('are you sure delete {{ $info->title }}???')"><span data-feather="trash-2" class="align-text-bottom"></span> Hapus</button>
                @csrf
                </form>
        </div>
    </div>
    <div class="row">
            <div class="col">
                <h2 class="title mb-3 mt-3 text-center">{{ $info->title}}</h2>
                <img src="{{ asset('storage/'.$info->image_info) }}" class="img-fluid mb-3 mt-3 rounded" alt="...">
                <span>{!! $info->description !!}<span>
            </div>
    </div>
</div>
@endsection