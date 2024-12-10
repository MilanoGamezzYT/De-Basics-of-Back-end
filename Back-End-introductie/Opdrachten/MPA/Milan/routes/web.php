<?php

use App\Http\Controllers\SongController;
use App\Http\Controllers\Welcome;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hello", [Welcome::class, "hello"]);

// Genre routes
Route::get('/genres', [GenresController::class, 'index'])->name('genres.index');
Route::post("/genre/store", [GenreController::class, "store"])->name('genres.store');

// Song routes
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
Route::get('/songs/{id}', [SongController::class, 'show'])->name('songs.show');

// Playlist routes
Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
Route::get('/playlists/{id}', [PlaylistController::class, 'show'])->name('playlists.show');
Route::post('/playlists/{playlist}/add-song', [PlaylistController::class, 'addSong'])->name('playlists.addSong');

// Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');