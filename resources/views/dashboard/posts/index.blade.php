@extends('dashboard.layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Posts</h1>
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
  <a href="/dashboard/posts/create" class="btn btn-primary mb-3"><span data-feather="plus" class="align-text-bottom"></span> Tambah Post</a>
  <table class="table table-striped table-s border border-2">
    <thead>
      <tr class="text-center">
        <th scope="col">No</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td class="text-center">{{ $loop->iteration }}</td>
        <td>{{ $post->title }}</td>
        <td class="text-center">{{ $post->Category->name }}</td>
        <td class="text-center">
          <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a> 
          <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
          <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
          @method("DELETE")
          <button type="submit" class="badge bg-danger border-0" onclick="return confirm('are you sure delete {{ $post->title }}???')"><span data-feather="trash-2" class="align-text-bottom"></span></button>
          @csrf
          </form>
          </td>
      </tr>   
      @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center mt-4">
    {{-- //untuk menampilkan page 1,2,dst... --}}
    {{ $posts->links() }}
  </div>

</div>
@endsection