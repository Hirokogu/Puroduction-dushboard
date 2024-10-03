<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\BreakdownController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ResultController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('result', ResultController::class);
Route::resource('equipment', EquipmentController::class);
Route::resource('breakdown', BreakdownController::class);

if (config('app.env') === 'production' or config('app.env') === 'staging') {
    URL::forceScheme('https');
}


require __DIR__.'/auth.php';
