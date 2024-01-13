<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeadRoleController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/auth/tg/redirect', [AuthController::class, "redirectTG"]);
Route::get('/auth/tg/callback', [AuthController::class, "callbackTG"]);
Route::get('/auth/vk/redirect', [AuthController::class, "redirectVK"]);
Route::get('/auth/vk/callback', [AuthController::class, "callbackVK"]);
Route::get('/auth/check', [AuthController::class, "checkAuth"]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/auth/logout', [AuthController::class, "logout"]);
    Route::get('/headroles', [HeadRoleController::class, "getAll"]);
    Route::post('/headrole', [HeadRoleController::class, "create"]);
    Route::delete('/headrole/{hr}', [HeadRoleController::class, "delete"]);
    Route::get('/headrole/{hr}', [HeadRoleController::class, "get"]);
    Route::patch('/headrole/{hr}', [HeadRoleController::class, "update"]);
});
