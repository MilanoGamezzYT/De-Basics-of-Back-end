<?php

use App\Http\Controllers\SongController;
use App\Http\Controllers\Welcome;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hello", [Welcome::class, "hello"]);

// Genre routes
Route::get('/genres', [GenresController::class, 'index'])->name('genres.index');
Route::post("/genre/store", [GenresController::class, "store"])->name('genres.store');
Route::get('/genres/{id}', [GenresController::class, 'show'])->name('genre.show');

// Song routes
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
Route::get('/songs/{id}', [SongController::class, 'show'])->name('songs.show');

// Playlist routes
Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
Route::post('/playlists/store', [PlaylistController::class, 'store'])->name('playlists.store');
Route::get('/playlists/{playlist}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
Route::put('/playlists/{playlist}', [PlaylistController::class, 'update'])->name('playlists.update');
Route::get('/playlists/{id}', [PlaylistController::class, 'show'])->name('playlists.show');
Route::post('/playlists/{playlist}/add-song', [PlaylistController::class, 'addSong'])->name('playlists.addSong');
Route::delete('/playlists/{playlist}/songs/{song}', [PlaylistController::class, 'removeSong'])->name('playlists.songs.destroy');

// Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login']);

// Register routes
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Temporary Playlist Routes
Route::get('/temporary-playlist', [SessionController::class, 'create'])->name('temporary-playlist.create');
Route::post('/temporary-playlist', [SessionController::class, 'store'])->name('temporary-playlist.store');
Route::get('/temporary-playlist/show', [SessionController::class, 'show'])->name('temporary-playlist.show');
Route::delete('/temporary-playlist', [SessionController::class, 'clear'])->name('temporary-playlist.clear');
Route::post('/temporary-playlist/add-song', [SessionController::class, 'addSong'])->name('temporary-playlist.add-song');
Route::delete('/temporary-playlist/remove-song/{songId}', [SessionController::class, 'removeSong'])->name('temporary-playlist.remove-song');
Route::post('/temporary-playlist/save', [SessionController::class, 'save'])->name('temporary-playlist.save');