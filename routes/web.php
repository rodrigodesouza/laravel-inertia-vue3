<?php

use App\Http\Controllers\Site\LoginController;
use App\Http\Controllers\Site\UserController as SiteUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('welcome', function() {
    return view('welcome');
});

Route::get('/', function () {
    return Inertia::render('HomeView', [
        'message' => 'Hello World'
    ]);
})->name('home');

Route::get('/register', [SiteUserController::class, 'create'])->name('register');
Route::post('register', [SiteUserController::class, 'store'])->name('register.store');
Route::inertia('/login', 'User/LoginView')->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::inertia('/', 'DashboardView')->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
});

