<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\MarcaController;

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

Route::get('/', [ProdutoController::class, 'index'])->name('inicio');
Route::get('/produtos/remover/{id}', [ProdutoController::class, 'remover'])->name('produtos.remover');
Route::resource('produtos', 'ProdutoController');

Route::get('/marcas/remover/{id}', [MarcaController::class, 'remover'])->name('marcas.remover');
Route::resource('marcas', 'MarcaController');
