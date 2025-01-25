<?php

use App\Http\Controllers\ArchivesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('login');
});

Route::middleware('auth.user')->group(function () {
    Route::get('/account', [DashboardController::class, 'index'])->name('account');
    Route::get('/account/edit', [DashboardController::class, 'editAccount'])->name('account.edit');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/account/update/foto', [AuthController::class, 'updateFoto'])->name('update.foto');
    Route::post('/account/update', [AuthController::class, 'update'])->name('update');
    Route::get('/account/post', [DashboardController::class, 'post'])->name('post');
    Route::post('/account/post/process', [DashboardController::class, 'postProcess'])->name('post.process');
    Route::get('/account/post/delete/{id}', [DashboardController::class, 'delete']);
    Route::get('/archives', [ArchivesController::class, 'index'])->name('archives');
    Route::get('/archives/restore/{id}', [ArchivesController::class, 'restore'])->name('archives.restore');
    Route::get('/archives/delete/{id}', [ArchivesController::class, 'delete'])->name('archives.delete');
    Route::get('/archives/export/excel/{date}', [ArchivesController::class, 'exportExcel'])->name('archives.export.excel');
    Route::get('/archives/export/pdf/{date}', [ArchivesController::class, 'exportPdf'])->name('archives.export.pdf');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/proses', [AuthController::class, 'registerProses'])->name('register.proses');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login/proses', [AuthController::class, 'loginProses'])->name('login.proses');
