<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ServiceController;
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


Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('/about', [AboutUsController::class, 'index'])->name('about');

Route::get('/team', [TeamController::class, 'index'])->name('team');
Route::get('/team/{id}', [TeamController::class, 'show']);

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{id}', [BlogController::class, 'show'])->where('id', '[0-9]+');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/services/{id}', [ServicesController::class, 'show'])->where('id', '[0-9]+');
