<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PessoaController::class, 'index']);
Route::get('/create', [PessoaController::class, 'create']);
Route::post('/', [PessoaController::class, 'store']);
Route::get('/{id}/edit', [PessoaController::class, 'edit']);
Route::put('/{id}', [PessoaController::class, 'update']);
Route::delete('/{id}', [PessoaController::class, 'destroy']);
