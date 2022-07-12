<?php

use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Rutas del componente de marca
 */
Route::group([
    'prefix' => 'marca',
], function ($router) {
    Route::post('/save-marca', [MarcaController::class, 'crearMarca']);
    Route::post('/update-marca', [MarcaController::class, 'editarMarca']);
    Route::get('/traer-marca/{id}', [MarcaController::class, 'traerMarca']);
    Route::get('/traer-marcas', [MarcaController::class, 'traerMarcas']);
    Route::put('/editar-marca/{id}', [MarcaController::class, 'editarMarca']);
    Route::delete('/delete-marca/{id}', [MarcaController::class, 'eliminarMarca']);
});

/**
 * Rutas del componente de producto
 */
Route::group([
    'prefix' => 'producto',
], function ($router) {
    Route::post('/save-producto', [ProductoController::class, 'crearProducto']);
    Route::post('/update-producto', [ProductoController::class, 'editarProducto']);
    Route::get('/traer-producto/{id}', [ProductoController::class, 'traerProducto']);
    Route::get('/traer-productos', [ProductoController::class, 'traerProductos']);
    Route::put('/editar-producto/{id}', [ProductoController::class, 'editarProducto']);
    Route::delete('/delete-producto/{id}', [ProductoController::class, 'eliminarProducto']);
});