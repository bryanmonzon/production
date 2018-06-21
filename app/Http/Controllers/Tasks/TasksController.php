<?php

namespace App\Http\Controllers\Tasks;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function update(Task $task)
    {
        $task->update(request()->all());

        return response()->json($task, 202);
    }

    public function store()
    {
        request()->validate([
            'body' => 'required'
        ]);

        $task = auth()->user()->tasks()->create([
            'body' => request('body'),
            'due_date' => request('due_date'),
            'priority' => request('priority'),
        ]);

        return response()->json($task->load('user'), 201);
    }

    public function delete(Task $task)
    {
        $task->delete();

        return response()->json(204);
    }
}
