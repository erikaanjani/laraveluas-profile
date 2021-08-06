@extends('layouts.app')

@section('title', 'profiles')
@section('content')

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">TTL</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">No. Telepon</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($profiles as $profile)
    <tr>
    <td><a href="/profiles/{{$profile->id}}" >{{$profile->nama}}</td>
    <td>{!!$profile->tgl !!}</td>
    <td>{!!$profile->alamat !!}</td>
    <td>{!!$profile->jenis!!}</td>
    <td>{!!$profile->no_tlp !!}</td>
    <td>{!!$profile->email !!}</td>
    <td><a href="/profiles/{{$profile->id}}/edit"><button type="button" class="btn btn-outline-secondary">Edit</a></button></td>
    <form action="/profiles/{{ $profile->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-outline-secondary">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
    {{ $profiles -> links() }}
    </div>
@endsection