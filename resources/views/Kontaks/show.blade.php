@extends('layouts.app')

@section('title','Kontaks')

@section('content')
<div class="card">
<div class="cardbody">
<h3>Email :{{ $kontak['email'] }} </h3>
<h3>No Telepone :{{ $kontak['no_tlp'] }} </h3>
 </div>
</div>
@endsection