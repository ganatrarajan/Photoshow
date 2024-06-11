<?php

use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AlbumsController::class,'index'])->name('home');
Route::get('/albums', [AlbumsController::class,'index']);
Route::get('/albums/create', [AlbumsController::class,'create'])->name('album-create');
Route::post('/albums/store', [AlbumsController::class,'store'])->name('album-store');
Route::get('/albums/{id}', [AlbumsController::class,'show'])->name('album-show');

Route::get('/photos/create/{album_id}', [PhotosController::class,'create'])->name('photo-create');
Route::post('/photos/store', [PhotosController::class,'store'])->name('photo-store');
Route::get('/photos/{id}', [PhotosController::class,'show'])->name('photo-show');
Route::delete('/photos/{id}', [PhotosController::class,'delete'])->name('photo-delete');
