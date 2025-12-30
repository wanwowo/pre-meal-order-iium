<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CafeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/cafes');
});

Route::get('/cafes', [CafeController::class, 'index'])->name('cafes.index');
Route::get('/cafes/{cafe}', [CafeController::class, 'show'])->name('cafes.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
