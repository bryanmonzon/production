<?php

namespace App\Http\Controllers\PlanProjects;

use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddProjectsPlanController extends Controller
{
    public function sync(Plan $plan)
    {
        $plan->projects()->sync(request('projects'));
        return response()->json('success');
    }
}
