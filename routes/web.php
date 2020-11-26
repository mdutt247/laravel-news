<?php

use Illuminate\Support\Facades\Route;

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

Route::get('test', function () {
    $category = App\Models\Category::find(3);
    // return $category->posts;

    $comment = App\Models\Comment::find(152);
    // return $comment->author;
    // return $comment->post;

    $post = App\Models\Post::find(152);
    // return $post->category;
    // return $post->author;
    // return $post->images;
    // return $post->comments;
    // return $post->tags;

    $tag = App\Models\Tag::find(5);
    // return $tag->posts;

    $author = App\Models\User::find(88);
    // return $author->posts;
    return $author->comments;
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
