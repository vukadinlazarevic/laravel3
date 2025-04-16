<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\KomentarController;
use Illuminate\Support\Facades\Route;

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