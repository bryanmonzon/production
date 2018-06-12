<?php

namespace App\Http\Controllers\Projects;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{  

    public function all()
    {
        $projects = Project::all();

        // TODO: Maybe use a Responsable interface?
        return response()->json($projects);
    }
    public function index()
    {   

        return view('projects.index');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required'
        ]);

        $project = Project::create(request()->all());
        
        return response()->json($project, 201);
    }

    public function update(Project $project)
    {
        $project->update(request()->validate([
            'name' => 'required'
        ]));

        return $project;
    }

    public function create()
    {
        return view('projects.create');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }
}
