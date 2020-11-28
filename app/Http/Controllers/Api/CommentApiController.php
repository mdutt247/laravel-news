<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use App\Http\Resources\CommentResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'comment'   => 'required',
            'post_id'   => 'required'
        ]);
        $comment = new Comment();
        $comment->content = $request->get('comment');
        $comment->post_id = $id;
        $comment->author_id = $request->user()->id;
        $comment->save();
        return new CommentResource($comment);
    }
}
