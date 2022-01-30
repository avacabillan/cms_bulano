<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClientController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('client', ClientController::class);
// Route::get('/clients', [ClientController::class, 'index']);
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
// Route::get('clients', [ClientController::class, 'index']);
// Route::get('clients/{id}', [ClientController::class, 'show']);
// Route::post('clients',[ClientController::class, 'edit']);
// Route::put('clients/{id}', [ClientController::class, 'update']);
// Route::delete('clients/{id}', [ClientController::class, 'delete']);
   