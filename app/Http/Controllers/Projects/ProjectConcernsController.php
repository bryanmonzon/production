<?php

namespace App\Http\Controllers\Projects;

use App\Concern;
use App\Project;
use Illuminate\Http\Request;
use App\Events\ConcernWasCreated;
use App\Events\ConcernWasDeleted;
use App\Http\Controllers\Controller;

class ProjectConcernsController extends Controller
{
    public function index(Project $project)
    {
        return response()->json($project->concerns()->with('user')->get(), 200);
    }

    public function store(Project $project)
    {
        request()->validate([
            'body' => 'required',
            'priority' => 'required'
        ]);
        
        $concern = $project->concerns()->make([
            'body' => request('body'),
            'priority' => request('priority')
        ]);

        $concern = request()->user()->concerns()->save($concern);

        $concern = $concern->load('user');

        broadcast(new ConcernWasCreated($concern))->toOthers();
        
        return response()->json($concern, 201);
    }

    public function delete(Project $project, Concern $concern)
    {
        $concern->delete();

        broadcast(new ConcernWasDeleted($concern->id, $project->id))->toOthers();

        return response()->json(204);
    }
}
