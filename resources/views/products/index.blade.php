@extends('layouts.app')
@section('title', 'Productos')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Lista de Productos</h1>
        <a href="{{route('products.create')}}" class="btn btn-primary">Crear Producto</a>
        <a href="{{route('products.pdf')}}" class="btn btn-primary">Descargar PDF</a>
        <a href="{{route('products.excel')}}" class="btn btn-primary">Descargar Excel</a>
        <div class="row">
            <div class="col-8">
                <form action="{{ route('products.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Buscar producto">
                        <input type="number" class="form-control" name="paginas" placeholder="10">
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
                        <td>@if($product->image)<img src="/storage/{{$product->image}}" alt="{{$product->name}}">
                           @else
                            No existe imagen
                           @endif</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <a href="{{route('products.show',$product)}}" class="btn btn-success">Mostrar</a>
                            <a href="{{route('products.edit',$product)}}" class="btn btn-warning">Editar</a>
                            <form action="{{route('products.destroy',$product)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    @endsection
