@extends('layouts.app')
@section('title', 'Productos')
@section('content')
    <div class="container">
        @livewireScripts
        @livewireStyles
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Lista de Productos</h1>
        <a href="{{route('products.create')}}" class="btn btn-primary">Crear Producto</a>
        <a href="{{route('products.pdf')}}" class="btn btn-primary">Descargar PDF</a>
        <a href="{{route('products.excel')}}" class="btn btn-primary">Descargar Excel</a>
        @livewire('table-products-component')

    </div>
    @endsection
