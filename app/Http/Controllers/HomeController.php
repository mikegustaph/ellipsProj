<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Tasks;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalEmployees = User::count();
        $compTask      = Tasks::count();
        $pendingTask  = Tasks::count();
        return view('home.dashboard', compact(['compTask', 'totalEmployees', 'pendingTask']));
    }

    public function services()
    {
        return view('service.services');
    }

    public function servicesCreate()
    {
        return view('service.servicesCreate');
    }

    public function reports()
    {
        return view('month');
    }

    public function settings()
    {
        return view('general');
    }
}
