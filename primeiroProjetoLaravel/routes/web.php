<?php

use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index']);
// adicionando esse pequeno middleware para auth o usuário só pode entrar nesta página se estiver logado
Route::get('/events/create', [EventController::class, 'create'])->middleware("auth");
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware("auth");
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware("auth");
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware("auth");
Route::get("/dashboard", [EventController::class, 'dashboard'])->middleware("auth");
Route::post("/events/join/{id}", [EventController::class, 'joinEvent'])->middleware("auth");
Route::delete("/events/leave/{id}", [EventController::class, 'leaveEvent'])->middleware("auth");
// retirando a rota e configuração do jetstream
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
