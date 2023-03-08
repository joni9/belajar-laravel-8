@extends('layouts.app')
@section('content')
<div class="container rounded mt-3 shadow" style="background:#ffffff;">
    <h1 class="mb-5 mt-3 text-center kategori1" style="color: #ebdd1e;"></h1>
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-3 mb-3 kotak1">
            <div class="card" style="background:#ffffff;
            border:solid 4px #ebdd1e;
            border-radius:5px; ">
                <a href="/posts?category={{$category->slug}}" class="text-decoration-none text-dark font-weight-bold"><img src="{{ url('images/co.jpg') }}" class="card-img-top" alt="..."></a>
                <div class="card-body">
                  <h5 class="card-title text-center"><a href="/posts?category={{$category->slug}}" class="text-decoration-none font-weight-bold" style="color: #ebdd1e;">{{ $category->name }}</a></h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>  
  
@endsection