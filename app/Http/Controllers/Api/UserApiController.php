<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\PostResource;
use App\Http\Resources\CommentResource;

class UserApiController extends Controller
{
    public function show($id)
    {
        return new UserResource(User::find($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'  => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password'  => 'required|min:6|confirmed'
        ]);
        $user = new User();
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return new UserResource($user);
    }

    public function posts($id)
    {
        $author = User::find($id);
        $posts = $author->posts()->with('category', 'author', 'tags', 'images', 'videos', 'comments')->paginate();
        return PostResource::collection($posts);
    }

    public function comments($id)
    {
        $user = User::find($id);
        $comments = $user->comments()->with('post')->paginate();
        return CommentResource::collection($comments);
    }
}
