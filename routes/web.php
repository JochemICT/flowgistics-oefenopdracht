<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\PicklistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get("/dashboard", [PicklistController::class, 'index'])->name("dashboard");
    Route::resource("articles", ArticleController::class);
    Route::resource("batches", BatchController::class);
    Route::resource("picklist", PicklistController::class);
});


require __DIR__.'/auth.php';
