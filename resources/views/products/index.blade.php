@extends('layouts.app')
@section('title', 'Productos')
@section('content')
    <div class="container">
        <h1>Lista de Productos</h1>
        <div class="row">
            <div class="col-8">
                <form action="{{ route('products.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Buscar producto">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>@if($product->image)<img src="{{$product->image}}" alt="{{$product->name}}">
                           @else
                            No existe imagen
                           @endif</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    @endsection
