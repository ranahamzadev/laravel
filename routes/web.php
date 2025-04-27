<?php

use App\Http\Controllers\profileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [RegistrationController::class, 'showLogin'])->name('show.login');
Route::get('/register', [RegistrationController::class, 'showRegister'])->name('show.register');
Route::post('/login', [RegistrationController::class, 'login'])->name('login');
Route::post('/register', [RegistrationController::class, 'register'])->name('register');
Route::post('/logout', [RegistrationController::class, 'logout'])->name('logout');


Route::get('/profiles', [profileController::class, 'index'])->name('profiles.index');
Route::get('/profiles/create', [profileController::class, 'create'])->name('profiles.create');
Route::get('/profiles/{profile}', [profileController::class, 'show'])->name('profiles.show');
Route::post('/profiles', [profileController::class, 'store'])->name('profiles.store');
Route::delete('/profiles/{profile}', [profileController::class, 'destroy'])->name('profiles.destroy');
Route::get('/profiles/edit/{profile}', [profileController::class, 'edit'])->name('profiles.edit');
Route::put('/profiles/{profile}', [profileController::class, 'update'])->name('profiles.update');
