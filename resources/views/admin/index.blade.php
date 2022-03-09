@extends('adminlte::page')

@section('title', 'Menu')

@section('content_header')
    <h1>Menu</h1>
@stop

@section('content')
    <p>Bienvenido {{ Auth::user()->name }}</p>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
