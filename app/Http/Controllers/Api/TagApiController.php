<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\TagResource;
use App\Models\Tag;

class TagApiController extends Controller
{

    public function posts($id)
    {
        $tag = Tag::find($id);
        $posts = $tag->posts()->with('author', 'category', 'images', 'videos', 'comments')->orderBy('id', 'desc')->paginate();
        return PostResource::collection($posts);
    }
}
