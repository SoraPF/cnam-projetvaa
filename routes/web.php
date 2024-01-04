<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CoursController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('dashboard')->group(function (){
    Route::get('cours', [DashboardController::class, 'inscriptionCours'])->name('inscriptionCours');
    Route::post('cours/m', [CoursController::class, 'inscritMardi'])->name('inscritMardi');
    Route::post('cours/v', [CoursController::class, 'inscritvendredi'])->name('inscritvendredi');
    Route::get('cours/create', [CoursController::class, 'pageCreateCours'])->name('pageCreateCours');
    Route::post('cours/create',[CoursController::class, 'createCours'])->name('createCours');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
