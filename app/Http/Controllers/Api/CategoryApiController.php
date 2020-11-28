<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function posts($id){
        $posts = Post::where('category_id', $id)->orderBy('id', 'desc')->paginate();
        return PostResource::collection($posts);
    }
}
