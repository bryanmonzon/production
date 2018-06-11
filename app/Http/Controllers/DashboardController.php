<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $plans = Plan::orderBy('created_at', 'DESC')->get();
        return view('dashboard', ['plans' => $plans]);
    }
}
