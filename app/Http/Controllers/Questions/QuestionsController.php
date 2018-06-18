<?php
namespace App\Http\Controllers\Questions;

use App\Question;
use Illuminate\Http\Request;
use App\Events\QuestionWasResolved;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function update(Question $question)
    {
        $question->update(request()->all());

        broadcast(new QuestionWasResolved($question->load('user')))->toOthers();

        return response()->json($question->load('user'), 202);
    }

    public function delete(Question $question)
    {
        $question->comments()->delete();
        $question->delete();

        return response()->json(204);
    }
}
