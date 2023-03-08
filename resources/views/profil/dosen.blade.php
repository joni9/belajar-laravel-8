@extends('layouts.app')
@section('content')
<div class="container bg-white mt-10 pt-5 pb-5 ">
    <h1 class="mb-5 mt-3 text-center" style="color: #15b915">Profil Dosen Teknik Informatika UBY</h1>
    <table class="table table-striped table-s">
        <thead>
          <tr>
            <th scope="col" class="col-sm-1">No</th>
            <th scope="col" class="col-sm-4">Nama</th>
            <th scope="col" class="col-sm-4">Gambar</th>
            <th scope="col" class="col-sm-3">NPM</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dosens as $dosen)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $dosen->name }}</td>
            <td><img src="{{ asset('storage/'.$dosen->image_dosen) }}" class="img-fluid mb-3 col-sm-5"></td>
            <td>{{ $dosen->npm }}</td>
          </tr>   
          @endforeach
            
        </tbody>
      </table>
</div>   
@endsection