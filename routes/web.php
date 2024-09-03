<?php

use App\Http\Controllers\Admin\PageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\IndexController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\ActivityController;

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

Route::name('client.')->group( function () {

    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('home', [IndexController::class, 'index'])->name('home');
    Route::get('about', [AboutController::class, 'index'])->name('about');
    Route::get('contact', [ContactController::class, 'index'])->name('contact');
    Route::get('activity', [ActivityController::class, 'index'])->name('activity');

});

Route::prefix('system')->name('admin.')->middleware(['auth'])->group(function () {

    // First
    Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    // NEWS
    Route::get('news', [PageController::class, 'news'])->name('news');

    // Staff
    Route::get('about', [PageController::class, 'about'])->name('about');

    // USERS
    Route::get('users', [PageController::class, 'users'])->middleware('role:admin')->name('users');

});
