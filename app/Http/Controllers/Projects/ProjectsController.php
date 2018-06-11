<?php

namespace App\Http\Controllers\Projects;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{  

    public function index()
    {   
        $projects = Project::all();

        // TODO: Maybe use a Responsable interface?
        if( request()->ajax() ) {
            return response()->json($projects);
        }else {
            return view('projects.index', ['projects' => $projects]);
        }
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
