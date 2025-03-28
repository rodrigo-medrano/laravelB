@extends('layouts.app')
@section('title', 'Crear Categoria')
@section('content')
<h1>Crear Categoria</h1>
<form action="{{route('categories.store')}}" method="POST">
    @csrf
    <label for="name">Nombre Categoria:</label>
    <input type="text" name="name" id="name"><br>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="{{route('categories.index')}}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
