<?php

namespace App\Http\Controllers\Projects;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectQuestionsController extends Controller
{
    public function index(Project $project)
    {
        //TODO: include users in this query
        return response()->json($project->questions()->orderBy('created_at', 'desc')->get());    
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

        return response()->json($question, 201);
    }
}
