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
        
        return back();
    }
}
