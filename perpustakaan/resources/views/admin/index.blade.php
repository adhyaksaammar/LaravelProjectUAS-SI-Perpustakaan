@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    <p><h3><b>You are logged in!</b></h3></p>
    <div class="title m-b-md">
    	<h1>SISTEM INFORMASI PERPUSTAKAAN</h1>
    	@component('cekLogin')
    	@endcomponent
    </div>
@stop