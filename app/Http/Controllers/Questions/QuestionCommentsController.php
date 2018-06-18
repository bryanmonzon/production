<?php

namespace App\Http\Controllers\Questions;

use App\Comment;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\QuestionCommentWasCreated;
use App\Events\QuestionCommentWasDeleted;

class QuestionCommentsController extends Controller
{
    public function index(Question $question)
    {
        return response()->json($question->comments()->with('user')->get(), 200);
    }

    public function store(Question $question)
    {
        request()->validate([
            'body' => 'required|max:5000'
        ]);

        $comment = $question->comments()->make([
            'body' => request('body')
        ]);

        $comment = request()->user()->comments()->save($comment);
        
        broadcast(new QuestionCommentWasCreated($question, $comment->load('user')))->toOthers();
        
        return response()->json($comment->load('user'), 201);
    }

    public function delete(Question $question, Comment $comment)
    {
        $comment->delete();
        
        broadcast(new QuestionCommentWasDeleted($question, $comment->id))->toOthers();

        return response()->json(204);
    }
}