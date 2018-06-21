<?php

namespace App\Http\Controllers\My;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyTasksController extends Controller
{
    public function all()
    {
        return response()->json(auth()->user()->tasks()->with('projects')->get(), 200);
    }

    public function index()
    {
        return view('my.tasks.index');
    }
}
