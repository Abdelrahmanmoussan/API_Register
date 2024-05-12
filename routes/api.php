<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/auth/register', [AuthController::class, 'createUser'])->name('api.register');
Route::post('/user/login', [AuthController::class, 'loginUser'])->name('api.login');

// Route::post('/auth/logout',[AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::get('/user/list', [UserController::class, 'listUsers'])->name('api.listUserId');
    Route::get('/user/{user}', [UserController::class, 'listUsers'])->name('api.listUser');
});

