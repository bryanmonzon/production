<?php

namespace App\Http\Controllers\UsersProjects;

use App\Plan;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersProjectController extends Controller
{
    public function index(Plan $plan, Project $project)
    {
        return response()->json($project->users()->get());
    }

    public function store(Plan $plan, Project $project)
    {

        $users = $project->users()->sync(request('users'));

        return response()->json('success');
    }
}
