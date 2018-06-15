<?php
namespace App\Http\Controllers\Questions;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function update(Question $question)
    {
        $question->update(request()->all());

        return response()->json($question, 202);
    }

    public function delete(Question $question)
    {
        $question->comments()->delete();
        $question->delete();

        return response()->json(204);
    }
}
