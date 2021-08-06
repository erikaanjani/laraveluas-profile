@extends('layouts.app')

@section('title','Profiles')

@section('content')

<form action="/profiles/{{$profile->id}}/edit" method="POST">
@csrf
@method('PUT')

  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{old('nama') ? old('nama') : $profile['nama'] }}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">TTL</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="ttl" aria-describedby="ttl" value="{{old('tgl') ? old('ttl') : $profile['ttl'] }}">
    @error('ttl')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">alamat</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="alamat" aria-describedby="emailHelp" value="{{old('alamat') ? old('alamat') : $profile['alamat'] }}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Jenis</label>
    <input type="text" class="form-control" name="jenis" id="exampleInputPassword1" value="{{old('jenis') ? old('jenis') : $profiles['jenis'] }}">
    @error('jenis')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
  <div class="form-group">
    <label for="exampleInputEmail1">No. Telepon</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="no_tlp" aria-describedby="emailHelp" value="{{old('no_tlp') ? old('no_tlp') : $profiles['no_tlp'] }}">
    @error('no_tlp')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="{{old('email') ? old('email') : $profiles['email'] }}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
    
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

    
