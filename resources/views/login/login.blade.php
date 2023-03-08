@extends('layouts.app')
@section('content')
<div class="container mt-5">
        <div class="row justify-content-center">
                <div class="col-md-4 r text-center">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    @endif
                    @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                    @endif
                    <form action="/login" method="post">
                        @csrf
                        <img class="mb-4 rounded-4" src="{{ url('images/co.jpg') }}" alt="" width="120" height="80">
                        <h1 class="h3 mb-3 fw-normal">Please sign in Master</h1>
            
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
                            <label for="floatingInput">Email address</label>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-success" type="submit">Sign in</button>
                </div>
        </div>
</div>   
@endsection
