<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profiles.create');

Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');

// Add this line for profile CRUD routes
Route::resource('profiles', ProfileController::class);

// Optional: Shortcut to view a single profile like your CV/resume
Route::get('/resume', [ProfileController::class, 'show'])->name('resume');