<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user/{id}', function (string $id) {
        return new UserResource(User::findOrFail($id));
    });
    Route::get('/users', function () {
        return UserResource::collection(User::all());
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('posts', PostController::class);

});

Route::post('/register', [AuthController::class, 'store']);

Route::post('/login', [AuthController::class, 'login']);


