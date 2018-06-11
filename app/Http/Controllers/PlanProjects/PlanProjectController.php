<?php

namespace App\Http\Controllers\PlanProjects;

use App\Plan;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanProjectController extends Controller
{
    public function show(Plan $plan, Project $project)
    {
        return view('plans.projects.edit', [
            'plan' => $plan,
            'project' => $project,
        ]);
    }
}