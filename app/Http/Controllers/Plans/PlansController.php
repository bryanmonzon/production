<?php

namespace App\Http\Controllers\Plans;

use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plan::with('projects')->orderBy('created_at', 'DESC')->get();

        return response()->json( $plans );
    }

    public function store()
    {
        request()->validate([
            'name' => 'required'
        ]);

        $plan = Plan::create(request()->all());
        
        return response()->json($plan, 201);
    }

    public function delete(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('dashboard');
    }

    public function create()
    {
        return view('plans.create');
    }

    public function edit(Plan $plan)
    {
        return view('plans.edit', ['plan' => $plan]);
    }
}
