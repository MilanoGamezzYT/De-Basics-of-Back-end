<?php
use App\Http\Controllers\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/hello", [Welcome::class, "hello"]);