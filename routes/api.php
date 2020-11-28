<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\UserApiController;
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

// https://documenter.getpostman.com/view/8942795/TVmJhJv2

Route::get('authors/{id}', [UserApiController::class, 'show']);
Route::get('authors/{id}/posts', [UserApiController::class, 'posts']);
Route::get('authors/{id}/comments', [UserApiController::class, 'comments']);

Route::get('categories', [CategoryApiController::class, 'index']);
Route::get('categories/{id}/posts', [CategoryApiController::class, 'posts']);

Route::get('posts', [PostApiController::class, 'index']);
Route::get('posts/{id}', [PostApiController::class, 'show']);
Route::get('posts/{id}/comments', [PostApiController::class, 'comments']);

Route::post('comments/posts/{id}', [CommentApiController::class, 'store'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
