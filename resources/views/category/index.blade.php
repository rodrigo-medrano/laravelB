@extends('layouts.app')
@section('title', 'Categorias')
@section('content')
    <div class="container">
        <h1>Categorias</h1>
        <a href="{{route('categories.create')}}" class="btn btn-primary">Crear Categoria</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td><a href="">Editar</a><a href="">Eliminar</a><a href="">Mostrar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!--<h1>Categorias</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="" class="btn btn-primary">Crear Categoria</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>-->
@endsection
