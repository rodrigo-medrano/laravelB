<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uno',function(){
    return 'Hola Mundo';
});

Route::get('/dos/{nombre?}',function($nombre='Invitado'){
    return 'Hola '.$nombre;
});
Route::get('/prueba',function(){
    return view('prueba.index');
});
Route::prefix('admin')->group(function(){
    Route::get('/',function(){
        return 'Ingresando al panel de admin';
    });
    Route::get('uno',function(){
        return 'Opción 1';
    });
    Route::get('/dos',function(){
        return 'Opción 2';
    });
});



Route::prefix('ejercicios')->group(function(){
    Route::get('1',function(){
        $productos=Product::all();
        return $productos;
    });
    Route::get('2',function(){
        $categoria=Category::find(2);
        $productos=$categoria->products;
        return $productos;
    });
    Route::get('3',function(){
        $producto=Product::find(2);
        $categoria=$producto->category;
        return $categoria;
    });
    Route::get('4',function(){
        $productos=Product::with('category')->get();
        return $productos;
    });
    Route::get('5',function(){
        $productos=Product::orderBy('price','desc')->get();
        return $productos;
    });
    Route::get('6',function(){
        $categorias=Category::withCount('products')->get();
        return $categorias;
    });
    Route::get('7',function(){
        $productos=Product::where('price','>',50)->get();
        return $productos;
    });
    Route::get('8',function(){
        $productos=Product::where('name','like','%a%')->get();
        return $productos;
    });
    Route::get('9',function(){
        $producto=Product::orderBy('price','desc')->first();
        return $producto;
    });
    Route::get('10',function(){
        $categorias=Category::orderBy('name','asc')->get();
        return $categorias;
    });
    Route::get('11/{id?}',function($id=1){
        $categoria=Category::find($id);
        return $categoria;
    });
    Route::get('12',function($id=1){
        $categorias=Category::where('name','like', 'e%')->get();
        return $categorias;
    });
    Route::get('13/{id?}',function($id=1){
        $categoria=Category::find($id);
        $productos=$categoria->products;
        return $productos;
    });
    Route::get('14',function(){
        $categorias=Category::has('products')->get();
        return $categorias;
    });
    Route::get('15',function(){
        $categorias=Category::withCount('products')->orderBy('products_count','desc')->get();
        return $categorias;
    });
    Route::get('/nombre/{id}/{nombre?}',function($id,$nombre='Invitado'){
        return 'Hola '.$nombre.' tu id es '.$id;
    });
});

Route::resource('categories',CategoryController::class);

