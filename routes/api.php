<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\TagApiController;
use App\Http\Controllers\Api\UserApiController;
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

// https://documenter.getpostman.com/view/8942795/TVmJhJv2

Route::post('registration', [UserApiController::class, 'store']);
Route::post('login', [UserApiController::class, 'login']);
Route::post('forgot-password', [UserApiController::class, 'forgotPassword']);
// Route::get('show/{id}', [UserApiController::class, 'show']);

Route::get('authors/{id}', [UserApiController::class, 'show']);
Route::get('authors/{id}/posts', [UserApiController::class, 'posts']);
Route::get('authors/{id}/comments', [UserApiController::class, 'comments']);

Route::get('categories', [CategoryApiController::class, 'index']);
Route::get('categories/{id}/posts', [CategoryApiController::class, 'posts']);

Route::get('posts', [PostApiController::class, 'index']);
Route::get('posts/{id}', [PostApiController::class, 'show']);
Route::get('posts/{id}/comments', [PostApiController::class, 'comments']);

Route::get('tags/{id}/posts', [TagApiController::class, 'posts']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('comments/posts', [CommentApiController::class, 'store']);
    Route::post('logout', [UserApiController::class, 'logout']);
    Route::post('update-password',[UserApiController::class, 'updatePassword']);
});
