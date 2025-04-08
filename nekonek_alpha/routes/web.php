<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContenidoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});



Route::get("/",[contenidocontroller::class, 'grupos'] );


Route::get('/neko/crear', [ContenidoController::class, 'crear'])->name('neko.crear'); 

Route::post('/neko/store', [ContenidoController::class, 'store'])->name('neko.store'); 

Route::get('/neko/grupos', [ContenidoController::class, 'leer'])->name('neko.leer'); 


Route::resource ('neko', ContenidoController::class);

/*

Route::get('/neko/grupos', [ContenidoController::class, 'edit'])->name('neko.edit');

Route::patch('/neko/editar', [ContenidoController::class, 'update'])->name('neko.update');


/*
Route::get('/', function () {
    return redirect('neko/grupos');
});


/*
Route::get("/",[contenidocontroller::class, 'grupos'] );


Route::get('/neko/crear', [ContenidoController::class, 'crear'])->name('neko.crear'); 

Route::post('/neko/store', [ContenidoController::class, 'store'])->name('neko.store'); 

Route::get('/neko/grupos', [ContenidoController::class, 'leer'])->name('neko.leer'); 


Route::resource ('neko', ContenidoController::class);
*/
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
