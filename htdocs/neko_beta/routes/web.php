<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\crearcontroler;

Route::get('/', function () {
    return view('neko.create');
});

Route::get('/neko/index',[crearcontroler::class,'index'])->name('crear.index');
Route::get('/neko/create',[crearcontroler::class,'create'])->name('crear.create');









Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
