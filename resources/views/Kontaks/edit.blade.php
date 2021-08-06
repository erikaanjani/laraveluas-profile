@extends('layouts.app')

@section('title','Kontaks')

@section('content')

<form action="/kontaks/{{ $kontak['id'] }}" method="POST">
@csrf
@method('PUT')

  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="{{old('email') ? old('email') : $kontak['email'] }}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">No. Telepone</label>
    <input type="text" class="form-control" name="no_tlp" id="exampleInputPassword1" value="{{old('no_tlp') ? old('no_tlp') : $kontak['no_tlp'] }}">
    @error('no_tlp')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection