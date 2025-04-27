<?php

use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profiles', [profileController::class, 'index'])->name('profiles.index');
Route::get('/profiles/create', [profileController::class, 'create'])->name('profiles.create');
Route::get('/profiles/{profile}', [profileController::class, 'show'])->name('profiles.show');
Route::post('/profiles', [profileController::class, 'store'])->name('profiles.store');
Route::delete('/profiles/{profile}', [profileController::class, 'destroy'])->name('profiles.destroy');
Route::get('/profiles/edit/{profile}', [profileController::class, 'edit'])->name('profiles.edit');
Route::put('/profiles/{profile}', [profileController::class, 'update'])->name('profiles.update');
