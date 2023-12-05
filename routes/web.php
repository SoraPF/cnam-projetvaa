<?php

use App\Http\Controllers\NewParticipant;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/newparticipant', [DashboardController::class, 'create'])->name('newparticipant');

Route::post('/newparticipant', [NewParticipant::class, 'register']);

Route::delete('/user/{user}', [NewParticipant::class, 'suppression'])->name("user.delete");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Models\User;

Route::get('/users', function () {
    $participant = User::all();
    return view('liste', ['participant' => $participant]);
});



require __DIR__.'/auth.php';
