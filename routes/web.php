<?php

use App\Http\Controllers\Frontend\AgentListingController;
use App\Http\Controllers\Frontend\AgentListingScheduleController;
use App\Http\Controllers\Frontend\AgentListingsImageGalleryController;
use App\Http\Controllers\Frontend\AgentListingVideoGalleryController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProfileController;
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

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/listing',[FrontendController::class, 'listings'])->name('listings');
Route::get('/listing-modal/{id}',[FrontendController::class, 'listingModal'])->name('listing-modal');
Route::get('/listing/{slug}',[FrontendController::class, 'showListing'])->name('listing.show');
Route::get('/packages',[FrontendController::class, 'showPackages'])->name('packages');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile-password', [ProfileController::class, 'passwordUpdate'])->name('profile-password.update');

    /*  Agent Listing Routes */
    Route::resource('/listing', AgentListingController::class);

    /* Agent Listing Image Gallery Routes */

    Route::resource('/listing-image-gallery', AgentListingsImageGalleryController::class);

    /* Listing Video Gallery Routes */

    Route::resource('/listing-video-gallery', AgentListingVideoGalleryController::class);

     /* Listing Schedule Routes */

     Route::get('/listing-schedule/{listing_id}', [AgentListingScheduleController::class, 'index'])->name('listing-schedule.index');

     Route::get('/listing-schedule/{listing_id}/create', [AgentListingScheduleController::class, 'create'])->name('listing-schedule.create');

     Route::post('/listing-schedule/create/{listing_id}', [AgentListingScheduleController::class, 'store'])->name('listing-schedule.store');

     Route::get('/listing-schedule/create/{id}/edit', [AgentListingScheduleController::class, 'edit'])->name('listing-schedule.edit');

     Route::put('/listing-schedule/create/{id}/', [AgentListingScheduleController::class, 'update'])->name('listing-schedule.update');

     Route::delete('/listing-schedule/delete/{id}/', [AgentListingScheduleController::class, 'destroy'])->name('listing-schedule.destroy');
});

require __DIR__ . '/auth.php';
