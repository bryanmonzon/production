<?php

namespace App\Http\Controllers\Questions;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return response()->json($comment, 201);
    }
}
