<?php

namespace App\Http\Controllers\Questions;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function update(Question $question)
    {
        $question = $question->update(request()->all());

        return response()->json($question, 202);
    }
}
