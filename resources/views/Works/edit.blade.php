@extends('layouts.app')

@section('title','Works')

@section('content')

<form action="/works/{{ $work['id'] }}" method="POST">
@csrf
@method('PUT')

  <div class="form-group">
    <label for="exampleInputEmail1">Nama Perusahaan</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{old('nama') ? old('nama') : $work['nama'] }}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tahun</label>
    <input type="text" class="form-control" name="tahun" id="exampleInputPassword1" value="{{old('tahun') ? old('tahun') : $work['tahun'] }}">
    @error('tahun')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection