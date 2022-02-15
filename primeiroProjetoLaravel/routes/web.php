<?php

use Illuminate\Support\Facades\Route;

// pegar o nosso controller criado.
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, "index"]);
Route::get('/products',  [EventController::class, "products"]);
Route::get('/user/{id?}', [EventController::class, "user"]);

?>


