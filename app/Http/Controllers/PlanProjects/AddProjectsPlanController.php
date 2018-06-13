<?php

namespace App\Http\Controllers\PlanProjects;

use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddProjectsPlanController extends Controller
{
    public function sync(Plan $plan)
    {
        
        foreach( request('projects') as $projectId ) {
           
            if( !$plan->projects->contains( $projectId ) ) {
                $plan->projects()->attach($projectId);
            }
        }

        return response()->json($plan->projects()->get(), 201);        
    }
}
