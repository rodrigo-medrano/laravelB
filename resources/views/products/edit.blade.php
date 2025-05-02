@extends('layouts.app')
@section('title', 'Editar Producto')
@section('content')
<div class="container">
    <h1>Editar Producto</h1>
    <form action="{{route('products.update',$product)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-2"><label for="name">Nombre</label></div>
            <div class="col-10">
                <input type="text" name="name" id="name" class="form-control @error('name')is-invalid @enderror" value="{{old('name',$product->name)}}"/>
            </div>
                @error('name')
                    <div class="text-danger">{{ $message }}
                @enderror
        </div>
        <div class="row">
            <div class="col-2"><label for="description">Descripción</label></div>
            <div class="col-10">
                <textarea name="description" class="form-control @error('description')is-invalid @enderror" id="description" cols="30" rows="5">{{old('description',$product->description)}}</textarea>
            </div>
                @error('description')
                <div class="text-danger">{{ $message }}
                @enderror
        </div>
        <div class="row">
            <div class="col-2"><label for="stock">Cantidad</label></div>
            <div class="col-10">
                <input type="number" name="stock" class="form-control @error('stock')is-invalid @enderror" id="stock" value="{{old('stock',$product->stock)}}"/>
            </div>
                @error('stock')
                <div class="text-danger">{{ $message }}
                @enderror
        </div>
        <div class="row">
            <div class="col-2"><label for="price">Precio</label></div>
            <div class="col-10">
                <input type="number" name="price" class="form-control @error('price')is-invalid @enderror" id="price" value="{{old('price',$product->price)}}"/>
            </div>
                @error('price')
                <div class="text-danger">{{ $message }}
                @enderror
        </div>

        <div class="row">
            <div class="col-2"><label for="image">Imagen</label></div>
            <div class="col-10">
                @if($product->image)
                    <img src="/storage/{{$product->image}}" alt="{{$product->name}}" style="max-height: 100px;">
                @else
                    <p class="text-danger">No existe imagen</p>
                @endif
                <input type="file" name="image" class="form-control @error('image')is-invalid @enderror" id="image" value="{{old('image',$product->image)}}"/>
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
                        <option value="{{$category->id}}" @if(old('category_id',$product->category->id)==$category->id) selected @endif>{{$category->name}}</option>
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
                <button type="submit" class="btn btn-primary">Editar</button>
                <a href="{{route('products.index')}}" class="btn btn-secondary">Cancelar</a>
            </div>

    </form>
</div>
@endsection
