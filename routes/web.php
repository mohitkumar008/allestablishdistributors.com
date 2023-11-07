<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LeadController;
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

Route::get('/top-categories', [FrontendController::class, 'topCategories'])->name('topCategories');

Route::get('/list-by-category/{slug}', [FrontendController::class, 'listByCategory'])->name('listByCategory');

Route::get('/list-by-top-brands', [FrontendController::class, 'listByTopBrands'])->name('listByTopBrands');
Route::get('/list-by-top-dealership', [FrontendController::class, 'listByTopDealership'])->name('listByTopDealership');
Route::get('/list-by-featured-brand', [FrontendController::class, 'listByFeaturedBrand'])->name('listByFeaturedBrand');

Route::get('/provider-details/{slug}', [FrontendController::class, 'manufacturerDetails'])->name('manufacturerDetails');

Route::post('/send-requirement', [FrontendController::class, 'sendRequirement'])->name('sendRequirement');

Route::get('/list-by-investment/{investment}', [FrontendController::class, 'listByInvestment'])->name('listByInvestment');
Route::get('/list-by-state/{state}', [FrontendController::class, 'listByState'])->name('listByState');
Route::post('/search', [FrontendController::class, 'search'])->name('search');

Route::middleware('auth')->prefix('v2')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.manufacturers.index');
    })->name('dashboard');
    Route::resource('manufacturers', ManufacturerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('leads', LeadController::class);
    Route::get('/product/{product}/delete', [ManufacturerController::class, 'productDelete'])->name('productDelete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
