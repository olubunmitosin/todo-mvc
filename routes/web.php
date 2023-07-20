<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/todo/create', [App\Http\Controllers\HomeController::class, 'createTodo'])->name('todo.create.view');
Route::get('/todo/edit/{id}', [App\Http\Controllers\HomeController::class, 'editTodo'])->name('todo.edit.view');
