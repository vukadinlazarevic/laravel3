<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\KomentarController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CheckUserLoggedIn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(CheckUserLoggedIn::class)->group(function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('storeLogin');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('storeRegister');
});

Route::get('/logout', [AuthController::class, "logout"])->name('logout');

Route::get("/not-auth", [AuthController::class, "notAuth"])->name('not-auth');

Route::middleware(AuthMiddleware::class)->group(function() {
    Route::get("/",  [BlogController::class, "index"])->name("blog.list");

    Route::get("/add-blog", [BlogController::class, "create"])->name("blog.create");
    Route::post("/add-blog", [BlogController::class, "store"])->name("blog.store");
    
    // /edit-blog/1
    // /edit-blog/5
    // /edit-blog/12
    // /edit-blog/32
    Route::get("/edit-blog/{id}", [BlogController::class, "edit"])->name("blog.edit");
    Route::post("/edit-blog/{id}", [BlogController::class, "update"])->name("blog.update");
    
    Route::get("/delete-blog/{id}", [BlogController::class, 'delete'])->name("blog.delete");
    Route::post("/delete-blog/{id}", [BlogController::class, 'destroy'])->name("blog.destroy");

    Route::get("/komentari-list", [KomentarController::class, "list"])->name("komentari.list");

    Route::get("/dodaj-komentar", [KomentarController::class, 'create'])->name("komentari.create");
    Route::post("/dodaj-komentar", [KomentarController::class, 'store'])->name("komentari.store");
});