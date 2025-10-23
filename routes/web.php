<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
