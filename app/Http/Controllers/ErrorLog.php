<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorLog extends Controller
{
    public function error404()
    {
        return view('error.404');
    }
    public function error409()
    {
        return view('error.409');
    }
    public function error403()
    {
        return view('error.403');
    }
}
