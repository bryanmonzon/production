<?php

namespace App\Http\Controllers\Projects;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectConcernsController extends Controller
{
    public function index(Project $project)
    {
        return response()->json($project->concerns()->with('user')->get(), 200);
    }

    public function store(Project $project)
    {
        request()->validate([
            'body' => 'required',
            'priority' => 'required'
        ]);
        
        $concern = $project->concerns()->make([
            'body' => request('body'),
            'priority' => request('priority')
        ]);

        $concern = request()->user()->concerns()->save($concern);

        return response()->json($concern->load('user'), 201);
    }
}
