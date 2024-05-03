<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TourismController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\TransactionController;

Route::get('/', [HomePageController::class, 'index']);
Route::get('/about', [HomePageController::class, 'about']);
Route::get('/services', [HomePageController::class, 'services']);
Route::get('/contact', [HomePageController::class, 'contact']);

Route::get('/tourism/{id}', [TourismController::class, 'show']);
Route::get('/transaction-create/{id}', [TransactionController::class, 'create']);
Route::get('/transaction-history', [TransactionController::class, 'index']);
Route::get('/transaction-edit/{id}', [TransactionController::class, 'edit']);
Route::get('/transaction-update/{id}', [TransactionController::class, 'update']);
Route::get('/transaction-detail/{id}', [TransactionController::class, 'show']);
Route::post('/transaction-store', [TransactionController::class, 'store']);
Route::get('/struk/{id}', [TransactionController::class, 'struk']);

Route::get('/list-tourism', [AdminController::class, 'listTourism']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/buku-tamu', [AdminController::class, 'bkt']);
Route::get('/admin/tourism', [AdminController::class, 'listTourismAdmin']);
Route::get('/create-tourism', [AdminController::class, 'createTourism']);
Route::post('/store-tourism', [TourismController::class, 'create']);
Route::get('/edit-tourism/{id}', [AdminController::class, 'editTourism']);
Route::put('/update-tourism/{id}', [TourismController::class, 'update']);
Route::delete('/delete-tourism/{id}', [TourismController::class, 'delete']);

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Dashboard Route (protected route, example)
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
