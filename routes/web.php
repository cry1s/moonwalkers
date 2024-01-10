<?php

use App\Http\Controllers\HeadRoleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/headroles', [HeadRoleController::class, "getAll"]);
Route::post('/headrole', [HeadRoleController::class, "create"]);
Route::delete('/headrole/{hr}', [HeadRoleController::class, "delete"]);
Route::get('/headrole/{hr}', [HeadRoleController::class, "get"]);
Route::patch('/headrole/{hr}', [HeadRoleController::class, "update"]);