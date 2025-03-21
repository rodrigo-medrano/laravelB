<?php

use App\Http\Controllers\ProductController;
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

Route::prefix('admin')->group(function(){
    Route::get('/',function(){
        return 'Ingresando al panel de administrador';
    });
    Route::get('uno',function(){
        return 'Opción 1';
    });
    Route::get('/dos',function(){
        return 'Opción 2';
    });
});

Route::prefix('products')->group(function(){
    Route::get('/',function(){
        $products=Product::all();
        return $products;
    });
    Route::get('create',function(){
        return 'Formulario Crear producto';
    });
    Route::post('/',function(){
        return 'Almacenar producto';
    });
    Route::get('/{id}',[ProductController::class,'show']);
    Route::get('{id}/edit',function(){
        return 'Formulario Editar producto';
    });
    Route::put('{id}',function(){
        return 'Actualizar producto';
    });
    Route::delete('{id}',[ProductController::class,'destroy']);
});


