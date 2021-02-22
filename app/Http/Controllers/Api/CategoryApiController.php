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
        //See if user has certain abilities
        // if (!auth()->user()->tokenCan('categories-list')) {
        //     abort(403, 'Unauthorized');
        // }

        $categories = Category::all();
        // if ($categories == null) {
        //     return response()->json(['message' => 'Not Found!'], 404);
        // }
        return CategoryResource::collection($categories);
    }

    public function posts($id)
    {
        $posts = Post::where('category_id', $id)->orderBy('id', 'desc')->paginate();
        return PostResource::collection($posts);
    }
}
