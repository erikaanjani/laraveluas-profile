@extends('layouts.app')

@section('title', 'Pendidikans')
@section('content')

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nama Sekolah / Universitas</th>
      <th scope="col">Tahun</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($pendidikans as $p)
    <tr>
    <td><a href="/pendidikans/{{$p->id}}" >{{$p->nama}}</td>
    <td>{!!$p->tahun !!}</td>
    <td><a href="/pendidikans/{{$p->id}}/edit"><button type="button" class="btn btn-outline-secondary">Edit</a></button></td>
    <form action="/pendidikans/{{ $p->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-outline-secondary">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
    {{ $pendidikans -> links() }}
    </div>
@endsection