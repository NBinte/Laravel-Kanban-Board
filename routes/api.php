<?php

use App\Http\Controllers\TaskController;
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

Route::get("/getTasks", [TaskController::class, "getTasks"]);
Route::post("/saveTask/{taskName}/{category}/", [TaskController::class, "saveTask"]);
Route::post("/updateCategory/{taskId}/{category}/", [TaskController::class, "updateCategory"]);
