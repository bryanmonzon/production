<?php

namespace App\Http\Controllers\Tasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function store()
    {
        request()->validate([
            'body' => 'required'
        ]);

        $task = auth()->user()->tasks()->create([
            'body' => request('body'),
            'due_date' => request('due_date'),
            'priority' => 4,
        ]);

        return response()->json($task->load('user'), 201);
    }
}
