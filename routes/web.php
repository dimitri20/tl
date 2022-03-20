<?php

use App\Http\Middleware\OnDatabaseErrors;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\Localization;
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



Route::group(['prefix' => 'admin'], function(){


    Route::get("/", function(){
        return view('admin.index');
    });

});



Route::group(['prefix' => 'admin/crud'], function(){

    Route::name("admin.")->group(function () {
        Route::resource('about', \App\Http\Controllers\Admin\AboutController::class);
        Route::resource('backgroundImages', \App\Http\Controllers\Admin\BackgroundImagesController::class);
        Route::resource('contacts', \App\Http\Controllers\Admin\ContactsController::class);
        Route::resource('posts', \App\Http\Controllers\Admin\PostsController::class);
        Route::resource('services', \App\Http\Controllers\Admin\ServicesController::class);
        Route::resource('servicesContent', \App\Http\Controllers\Admin\ServicesContentController::class);
        Route::resource('team', \App\Http\Controllers\Admin\TeamController::class);
    });

});


Route::get('/test', function(){
    return view('test');
});

Route::redirect("http://tl.com.ge/ka", "https://tl.com.ge/ka");

Route::redirect('/', '/ka');




// Route::group(['prefix' => '{language}'], function(){
//     Route::get('/', [HomeController::class, 'index'])->name('/')->middleware([Localization::class]);

//     Route::get('/about', [AboutUsController::class, 'index'])->name('about');

//     Route::get('/team', [TeamController::class, 'index'])->name('team');
//     Route::get('/team/{id}', [TeamController::class, 'show'])->name('teammate')->where('id', '[0-9]+');

//     Route::get('/blog', [BlogController::class, 'index'])->name('blog');
//     Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.id')->where('id', '[0-9]+');

//     Route::get('/contact', [ContactController::class, 'index'])->name('contact');
//     Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

//     Route::get('/services', [ServicesController::class, 'index'])->name('services');
//     Route::get('/services/{id}', [ServicesController::class, 'show'])->name('services.id')->where('id', '[0-9]+');


// });

