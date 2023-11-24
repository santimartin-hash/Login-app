<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkinController;
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

Route::get('/skins', [SkinController::class, 'index']) ->name('skins');

Route::post('/Insertarskins', [SkinController::class, 'store']) ->name('Insertarskins');

Route::put('/ModificarSkin', [SkinController::class, 'update'])->name('ModificarSkin');

Route::delete('/EliminarSkin/{skin}', [SkinController::class, 'destroy'])->name('EliminarSkin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
