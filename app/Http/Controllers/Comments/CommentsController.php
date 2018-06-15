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
}
