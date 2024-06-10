<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/home', [NotesController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/note', [NotesController::class, 'index'])->name('home');
    Route::get('/create', [NotesController::class, 'create'])->name('create');
    Route::post('/create', [NotesController::class, 'save']);
    Route::get('/delete/{id}', [NotesController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [NotesController::class, 'edit'])->name('edit');
    Route::get('/show/{id}', [NotesController::class, 'show'])->name('show');
    Route::post('/edit/{id}', [NotesController::class, 'update']);
});

require __DIR__.'/auth.php';
