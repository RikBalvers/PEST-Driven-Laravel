<?php

use App\Http\Controllers\PageCourseDetailsController;
use App\Http\Controllers\PageDashboardController;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PageVideosController;
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

Route::get('/', PageHomeController::class)->name('page.home');

Route::get('courses/{course:slug}', PageCourseDetailsController::class)->name('page.course-details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', PageDashboardController::class)->name('page.dashboard');
    Route::get('videos/{course:slug}/{video:slug?}', PageVideosController::class)->name('page.course-videos');
});

Route::webhooks('webhooks');
