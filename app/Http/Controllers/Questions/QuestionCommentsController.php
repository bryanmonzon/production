<?php

namespace App\Http\Controllers\Questions;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionCommentsController extends Controller
{
    public function index(Question $question)
    {
        return response()->json($question->comments()->get(), 200);
    }

}
