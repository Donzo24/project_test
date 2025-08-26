<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

Route::resource("produits", ProduitController::class);

// Route::get("/", ProduitController::class, "index");
