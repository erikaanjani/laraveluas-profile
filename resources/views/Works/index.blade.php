@extends('layouts.app')

@section('title', 'Works')
@section('content')

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nama Perusahaan</th>
      <th scope="col">Tahun</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($works as $work)
    <tr>
    <td><a href="/works/{{$work->id}}" >{{$work->nama}}</td>
    <td>{!!$work->tahun !!}</td>
    <td><a href="/works/{{$work->id}}/edit"><button type="button" class="btn btn-outline-secondary">Edit</a></button></td>
    <form action="/works/{{ $work->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-outline-secondary">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
    {{ $works -> links() }}
    </div>
@endsection