<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

// Přesměrování domovské routy na /photos
Route::get('/', function () {
    return redirect()->route('photos.index');
});

// Všechny routy pro photos
Route::middleware(['auth'])->group(function () {
    Route::resource('photos', PhotoController::class);
});

// Route pro vytvoření fotky
Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');

// Dashboard route (možná už nebude třeba zobrazení)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routy pro profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autentizační routy
require __DIR__.'/auth.php';
