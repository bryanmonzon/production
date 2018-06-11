<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('dashboard', ['plans' => $plans]);
    }
}
