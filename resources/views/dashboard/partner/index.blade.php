@extends('dashboard.layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">The Partner</h1>
</div>
<div class="table-responsive">
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @elseif (session()->has('successdelete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('successdelete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
   @endif
  <a href="/dashboard/partner/create" class="btn btn-primary mb-3"><span data-feather="plus" class="align-text-bottom"></span> Tambah Partner</a>
  <table class="table table-striped table-s border border-2">
    <thead>
      <tr class="text-center">
        <th scope="col" class="col-sm-1">No</th>
        <th scope="col" class="col-sm-4">Nama</th>
        <th scope="col" class="col-sm-4">Gambar Partner</th>
        <th scope="col" class="col-sm-3">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($partners as $partner)
      <tr class="text-center">
        <td class="col-sm-1">{{ $loop->iteration }}</td>
        <td class="col-sm-4">{{ $partner->name }}</td>
        <td class="col-sm-4"><img src="{{ asset('storage/'.$partner->image_partner) }}" class="img-fluid mb-3 col-sm-5"></td>
        <td class="col-sm-3">
          <a href="/dashboard/partner/{{ $partner->id}}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
          <form action="/dashboard/partner/{{ $partner->id}}" method="post" class="d-inline">
          @method("DELETE")
          <button type="submit" class="badge bg-danger border-0" onclick="return confirm('are you sure delete???')"><span data-feather="trash-2" class="align-text-bottom"></span></button>
          @csrf
          </form>
          </td>
      </tr>
      @endforeach   
    </tbody>
  </table>

</div>
@endsection