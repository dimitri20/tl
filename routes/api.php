<?php

use App\Http\Middleware\AuthKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





// Route::get('test', [\App\Http\Controllers\Admin\PostsController::class, 'test']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('test', function () {
        return response()->json("test");
    });

    Route::post('deleteFile', [\App\Http\Controllers\ApiController::class, 'deleteFile'])->name("deleteFile");
    Route::post('updatePostFileIds', [\App\Http\Controllers\ApiController::class, 'updatePostFileIds'])->name("updatePostFileIds");


});

