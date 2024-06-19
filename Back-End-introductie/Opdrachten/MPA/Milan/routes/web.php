<?php

use App\Http\Controllers\SongController;
use App\Http\Controllers\Welcome;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hello", [Welcome::class, "hello"]);

Route::get("/genre/create", [GenreController::class, "create"]);
Route::post("/genre/store", [GenreController::class, "store"]);

Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
