@extends('layouts.app')

@section('title', 'Kontaks')
@section('content')

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col">No. Telepone</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($kontaks as $kontak)
    <tr>
    <td><a href="/kontaks/{{$kontak->id}}" >{{$kontak->email}}</td>
    <td>{!!$kontak->no_tlp !!}</td>
    <td><a href="/kontaks/{{$kontak->id}}/edit"><button type="button" class="btn btn-outline-secondary">Edit</a></button></td>
    <form action="/kontaks/{{ $kontak->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-outline-secondary">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
    {{ $kontaks -> links() }}
    </div>
@endsection