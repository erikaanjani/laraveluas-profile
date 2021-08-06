@extends('layouts.app')

@section('title','Pendidikans')

@section('content')
<div class="card">
<div class="cardbody">
<h3>nama :{{ $p['nama'] }} </h3>
<h3>tahun :{{ $p['tahun'] }} </h3>
 </div>
</div>
@endsection