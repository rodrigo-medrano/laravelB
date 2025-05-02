@extends('layouts.app')
@section('title', 'Mostrar Producto')
@section('content')
<div class="container">
    <h1>Detalles del Producto</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">Descripción: {{ $product->description }}</p>
            <p class="card-text">Cantidad: {{ $product->stock }}</p>
            <p class="card-text">Precio: {{ $product->price }}</p>
            <p class="card-text">Categoría: {{ $product->category->name }}</p>
            <p class="card-text">Imagen: @if($product->image)<img src="/storage/{{$product->image}}"
                    alt="{{$product->name}}">
                @else
                No existe imagen
                @endif</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
</div>
@endsection
