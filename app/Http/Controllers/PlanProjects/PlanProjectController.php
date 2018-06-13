<?php

namespace App\Http\Controllers\PlanProjects;

use App\Plan;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanProjectController extends Controller
{
    public function index(Plan $plan)
    {

        return response()->json($plan->projects()->get());
    }

    public function show(Plan $plan, Project $project)
    {
        return view('plans.projects.edit', [
            'plan' => $plan,
            'project' => $project,
        ]);
    }

    public function store(Plan $plan)
    {
        
        foreach( request('projects') as $projectId ) {
           
            if( !$plan->projects->contains( $projectId ) ) {
                $plan->projects()->attach($projectId);
            }
        }

        return response()->json($plan->projects()->get(), 201);        
    }

    public function delete(Plan $plan, Project $project)
    {
        $plan->projects()->detach($project->id);

        return response(204);
    }
}
