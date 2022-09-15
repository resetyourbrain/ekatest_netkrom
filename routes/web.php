<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;
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
    return view('index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/ticket/add', [TicketController::class, 'store'])->middleware('guest');
Route::get('/ticket{id}', [TicketController::class, 'print'])->middleware('guest');

Route::get('/home', [AdminController::class, 'index'])->middleware('auth');
Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->middleware('auth');
Route::get('/admin-edit{id}', [AdminController::class, 'edit'])->middleware('auth');
Route::put('/admin/update/{id}', [AdminController::class, 'update'])->middleware('auth');
Route::get('/laporan', [AdminController::class, 'report'])->middleware('auth');

Route::get('/checkin', [CheckinController::class, 'index'])->middleware('auth');
Route::put('/checkin/{id}', [CheckinController::class, 'checkin'])->middleware('auth');