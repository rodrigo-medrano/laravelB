@extends('layouts.app')
@section('title', 'Crear Producto')
@section('content')
<div class="container">
    <h2>Crear Producto</h2>
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-2"><label for="name">Nombre</label></div>
            <div class="col-10">
                <input type="text" name="name" id="name" class="form-control @error('name')is-invalid @enderror" value="{{old('name')}}"/>
            </div>
                @error('name')
                    <div class="text-danger">{{ $message }}
                @enderror
        </div>
        <div class="row">
            <div class="col-2"><label for="description">Descripción</label></div>
            <div class="col-10">
                <textarea name="description" class="form-control @error('description')is-invalid @enderror" id="description" cols="30" rows="5">{{old('description')}}</textarea>
            </div>
                @error('description')
                <div class="text-danger">{{ $message }}
                @enderror
        </div>
        <div class="row">
            <div class="col-2"><label for="stock">Cantidad</label></div>
            <div class="col-10">
                <input type="number" name="stock" class="form-control @error('stock')is-invalid @enderror" id="stock" value="{{old('stock')}}"/>
            </div>
                @error('stock')
                <div class="text-danger">{{ $message }}
                @enderror
        </div>
        <div class="row">
            <div class="col-2"><label for="price">Precio</label></div>
            <div class="col-10">
                <input type="number" name="price" class="form-control @error('price')is-invalid @enderror" id="price" value="{{old('price')}}"/>
            </div>
                @error('price')
                <div class="text-danger">{{ $message }}
                @enderror
        </div>

        <div class="row">
            <div class="col-2"><label for="image">Imagen</label></div>
            <div class="col-10">
                <input type="file" name="image" class="form-control @error('image')is-invalid @enderror" id="image" value="{{old('image')}}"/>
            </div>
                @error('image')
                <div class="text-danger">{{ $message }}
                @enderror
        </div>
        <div class="row">
            <div class="col-2"><label for="category_id">Categorias</label></div>
            <div class="col-10">
                <select name="category_id" id="category_id" class="form-control @error('category_id')is-invalid @enderror">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if(old('category_id')==$category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
                @error('category_id')
                <div class="text-danger">{{ $message }}
                @enderror
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-10">
                <button type="submit" class="btn btn-primary">Crear</button>
                <a href="{{route('products.index')}}" class="btn btn-secondary">Cancelar</a>
            </div>
    </form>
</div>
@endsection
