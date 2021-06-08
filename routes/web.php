<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TodoController::class, 'index']);

    Route::get('/dashboard/create', [TodoController::class, 'create']);
    Route::post('/dashboard', [TodoController::class, 'store']);

    Route::get('/dashboard/{todo}/edit', [TodoController::class, 'edit']);
    Route::patch('/dashboard/{todo}', [TodoController::class, 'update']);

    Route::patch("/dashboard/{todo}/todo", [TodoController::class, 'changeToDo']);
    Route::patch("/dashboard/{todo}/onprog", [TodoController::class, 'changeToOnprog']);
    Route::patch("/dashboard/{todo}/comp", [TodoController::class, 'changeToComp']);

    Route::delete('/dashboard/{todo}', [TodoController::class, 'destroy']);
});