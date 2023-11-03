<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [FrontendController::class, 'index'])->name('homepage');

Route::get('/category/{slug}', [FrontendController::class, 'listByCategory'])->name('listByCategory');


Route::middleware('auth')->prefix('v2')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.manufacturers.index');
    })->name('dashboard');
    Route::resource('manufacturers', ManufacturerController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
