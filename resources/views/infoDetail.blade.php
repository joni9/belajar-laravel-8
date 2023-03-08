@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
                <div class="col">
                        <h2 class="title mb-3 mt-3 text-center">{{ $info->title}}</h2>
                        <img src="{{ asset('storage/'.$info->image_info) }}" class="img-fluid mb-3 mt-3 rounded" alt="...">
                        <span>{!! $info->description !!}</span>
                </div>
        </div>
</div>   
@endsection
