<?php

namespace App\Http\Controllers\Plans;

use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    public function store()
    {
        request()->validate([
            'name' => 'required'
        ]);

        Plan::create(request()->all());
        
        return back();
    }

    public function create()
    {
        return view('plans.create');
    }
}
