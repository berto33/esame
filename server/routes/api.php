<?php

use App\Http\Controllers\TerrainController;
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

Route::get('/terrains', [TerrainController::class, 'list']);
Route::get('/terrains/{id}', [TerrainController::class, 'view']);
Route::post('/terrains', [TerrainController::class, 'create']);
Route::put('/terrains/{id}', [TerrainController::class, 'modify']);
Route::delete('/terrains/{id}', [TerrainController::class, 'delete']);
