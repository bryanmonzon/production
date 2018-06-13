<?php

namespace App\Http\Controllers\UsersProjects;

use App\Plan;
use App\User;
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
        foreach( request('users') as $userId ) {
           
            if( !$project->users->contains( $userId ) ) {
                $project->users()->attach($userId);
            }
        }

        return response()->json($project->users()->get(), 201);
    }

    public function delete(Project $project, User $user)
    {
        $project->users()->detach($user->id);

        return response(204);
    }
}
