<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use GuzzleHttp\Psr7\Response;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Contracts\Role;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$role  = Role::find(Auth::user()->role_id);
        $user = Auth::user()->id;
        if (Auth::user()->role_id < 2) {
            $tasks = Tasks::with('client.clientserv.serv', 'userAssign', 'juniorAssign')->get();
            return view('task.tasks', compact('tasks'));
        } else {
            $tasks = Tasks::with('client.clientserv.serv', 'userAssign', 'juniorAssign')
                ->where('user_id', '=', $user)
                ->get();
            return view('task.tasks', compact('tasks'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createindex()
    {
    }
    public function create(Request $request)
    {
        $newtask = Tasks::create([
            'name'         => $request->input('name'),
            'description'  => $request->input('description'),
            'user_id'      => $request->input('user_id'),
            'start_date'   => $request->input('start_date'),
            'end_date'     => $request->input('end_date'),
            'completed'    => $request->input('completed'),
            'status'       => $request->input('status')
        ]);
        return redirect()->back()->with('message', 'Task created successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks)
    {
        //
    }
}
