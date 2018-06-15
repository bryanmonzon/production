<?php

namespace App\Http\Controllers\Comments;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function delete(Comment $comment)
    {
        $comment->delete();

        return response()->json(204);
    }

    public function update(Comment $comment)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $comment->update(request()->all());

        return response()->json($comment->load('user'), 202);
    }
}