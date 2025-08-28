<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;





// Route::get("/", ProduitController::class, "index");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource("produits", ProduitController::class);
    Route::get("/", [ProduitController::class, 'index']);
});
