<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**Controllers */

use App\Http\Controllers\CuentaController;
use App\Http\Controllers\TransaccionController;


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


/*Rutas de cuentas*/
Route::get('cuentas',[CuentaController::class,'index']);
Route::post('cuentas',[CuentaController::class,'store']);
Route::put('cuentas/{id}',[CuentaController::class,'update']);
Route::get('cuentas/libroMayor',[CuentaController::class,'libroMayor']);
Route::get('cuentas/balanceComprobacion',[CuentaController::class,'balanceComprobacion']);
Route::get('cuentas/estadoCapital',[CuentaController::class,'estadoCapital']);
Route::get('cuentas/estadoResultados',[CuentaController::class,'estadoResultados']);

/*Rutas de transacciones*/
Route::get('transacciones',[TransaccionController::class,'index']);
Route::post('transacciones',[TransaccionController::class,'store']);
Route::put('transacciones/{id}',[TransaccionController::class,'update']);
