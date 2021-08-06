@extends('layouts.app')

@section('title','works')

@section('content')
<div class="card">
<div class="cardbody">
<h3>Nama :{{ $work['nama'] }} </h3>
<h3>Tahun :{{ $work['tahun'] }} </h3>
 </div>
</div>
@endsection

    
