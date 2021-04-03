<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApi\todoController;

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

Route::get('/todolist', [todoController::class, 'index']);

Route::prefix('/todolist')->group(function () {
    Route::post('/add', [todoController::class, 'store']);
    Route::get('/{id}', [todoController::class, 'edit']);
    Route::put('/update/{id}', [todoController::class, 'update']);
    Route::put('/updateList/{id}', [todoController::class, 'updateList']);
    Route::delete('/delete/{id}', [todoController::class, 'destroy']);
});