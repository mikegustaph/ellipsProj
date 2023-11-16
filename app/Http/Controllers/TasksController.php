<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientsService;
use App\Models\Tasks;
use App\Models\Employee;
use App\Models\Postcheck_Attachment;
use App\Models\Postchecks;
use App\Models\Precheck_Attachment;
use App\Models\Prechecks;
use App\Models\RecieveDoc;
use App\Models\Service;
use App\Models\Task_Comments;
use App\Models\Task_Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Empty_;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Role;

class TasksController extends Controller
{
    public function taskjob(Request $request)
    {
        $role  = Role::find(Auth::user()->role_id);
        $user = Auth::user()->id;
        if (Auth::user()->role_id < 2) {
            $tasks = Tasks::with('userAssign', 'juniorAssign')->get();
            return view('task.tasks', compact('tasks'));
        } else {
            $tasks = Tasks::with('userAssign', 'juniorAssign')
                ->where('user_id', '=', $user)
                ->get();
            return view('task.tasks', compact('tasks'));
        }
    }
    public function notaskjob()
    {
        return view('task.notasks');
    }
    public function addemployee()
    {
    }

    public function create()
    {
        $users = User::with('roleuser')->get();

        $role = Role::find(Auth::user()->role_id);
        if ($role->hasPermissionTo('task-add')) {
            return view('task.createTask', compact('users'));
        } else {
            return redirect()->route('error.403');
        }
    }

    public function store(Request $request)
    {
        $task = new Tasks();
        $task->name        =    $request->name;
        $task->user_id     =    $request->user;
        $task->date_start  =    $request->date_start;
        $task->date_end    =    $request->date_end;

        $task->save();
        return redirect()->route('task.createTask')->with('message', 'Task was created successfully');
    }


    public function updateview($id)
    {
        $tasks = Tasks::with('client.clientserv.serv', 'employee')->get();
        foreach ($tasks as $row) {
            return view('task.update', compact('row'));
        }
    }

    public function activate(Request $request)
    {
    }

    public function taskuser()
    {
        return view('task.tasksUser');
    }

    public function taskProg($id)
    {

        $taskpost = DB::table('task_post')->where('task_id', $id)->get();
        $comment  = DB::table('task_comments')->where('task_id', $id)->get();
        $approver = User::all();
        $mainPost = Task_Post::all();

        $mainTask = Tasks::with('userAssign', 'juniorAssign')->find($id);

        return view('task.taskprogress', compact('mainTask'));
    }
    public function approveTask(Request $request, $id)
    {
        $approveTask = Tasks::find($id);
        $approveTask->approve_status  =  $request->approve;
        $approveTask->update();
        return redirect()->back();
    }
    public function completeTask(Request $request)
    {
    }
    public function PostProcess(Request $request)
    {
        $data = new Task_Post();
        $data->user_id      =  $request->user_id;
        $data->post         =  $request->taskPost;
        $data->task_id      =  $request->task_id;
        //$data->save();
        return response()->json($data);
    }

    public function TaskPost(Request $request)
    {
        $taskpost = Task_Post::create([
            'user_id'     =>  Auth::User()->id,
            'post'        =>  $request->taskPost,
            'task_id'     =>  $request->task_id,
        ]);

        return redirect()->back()->with('taskpost', $taskpost);
        // return view('task.taskprogress', compact('taskpost'));
    }
    public function taskpostview()
    {
    }
    public function commentsview()
    {
        return response(['success' => 'comment index!']);
    }
    public function comments(Request $request)
    {
        $comment = $request->validate([
            'user_id' => 'required',
            'comments' => 'required',
            'taskpost_id' => 'required',
            'task_id'  => 'required'
        ]);
        Task_Comments::create($comment);
        return back()->with(['message' => 'Comment successfully']);
    }


    public function AssignJunior($id)
    {
        $junior = User::with('roleuser')->get();

        $task = Tasks::with('userAssign')
            ->where('id', '=', $id)
            ->first();
        return view('task.assignjunior', compact('task', 'junior'));
    }
    public function AssignJuniorStoreData(Request $request, $id)
    {
        $task = Tasks::find($id);
        if ($task) {
            $task->user_id   = $request->junior;
            $task->update();
        }
        return redirect()->back()->with('message', 'You assign task successfuly!');
    }
}
