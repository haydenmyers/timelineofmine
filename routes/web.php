<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function() {
    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Account
    Route::get('/account/{user}', [AccountController::class, 'show'])->name('account')->middleware('can:view-page,user');

    // Events
    Route::get('/events/create', [EventController::class, 'create'])->name('createEvent');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('event');
    Route::post('/events/store', [EventController::class, 'store'])->name('storeEvent');

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('createCategory');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category'); // TODO: Potentially remove this and use query parameters to display events under a certain category
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('storeCategory');

    // Viewing media
    // TODO: Need to add authorisation for viewing media that only the logged in user has uploaded
});