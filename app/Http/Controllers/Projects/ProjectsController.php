<?php

namespace App\Http\Controllers\Projects;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{

    public function store()
    {
        request()->validate([
            'name' => 'required'
        ]);

        Project::create(request()->all());
        
        return redirect()->route('projects.index');
    }

    public function update(Project $project)
    {
        $project->update(request()->validate([
            'name' => 'required'
        ]));

        return $project;
    }

    public function index()
    {   
        return view('projects.index', ['projects' => Project::all() ]);
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
