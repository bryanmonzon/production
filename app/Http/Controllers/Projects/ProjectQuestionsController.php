<?php

namespace App\Http\Controllers\Projects;

use App\Project;
use App\Question;
use Illuminate\Http\Request;
use App\Events\QuestionWasCreated;
use App\Events\QuestionWasDeleted;
use App\Http\Controllers\Controller;

class ProjectQuestionsController extends Controller
{
    public function index(Project $project)
    {
        return response()->json($project->questions()->with(['user', 'comments.user'])->orderBy('created_at', 'desc')->get());    
    }

    public function store(Project $project)
    {
        request()->validate([
            'question' => 'required'
        ]);
        
        $question = auth()->user()->questions()->create([
            'project_id' => $project->id,
            'question' => request('question')
        ]);

        broadcast(new QuestionWasCreated($question->load('user')))->toOthers();

        return response()->json($question, 201);
    }

    public function delete(Project $project, Question $question)
    {
        $question->comments()->delete();
        $question->delete();

        broadcast(new QuestionWasDeleted($question->id, $project->id))->toOthers();

        return response()->json(204);
    }
}
