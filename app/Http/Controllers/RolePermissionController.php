<?php

namespace App\Http\Controllers;

use App\Models\Role_has_Permission;
//use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers\Auth;

class RolePermissionController extends Controller
{
    /*public $guard_name = 'web';
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }*/
    public function index()
    {
        $roleResult = Role::all();
        return view('role.role', compact('roleResult'));
    }
    public function createview()
    {
        return view('role.permission');
    }
    public function store(Request $request)
    {
        $role = $request->validate([
            'rolename'    => 'required',
            'description' => 'required'
        ]);
        $roleCreate = new Role();
        $roleCreate->name         =   $request['rolename'];
        $roleCreate->description  =   $request['description'];
        $roleCreate->guard_name   =   $request['guard_name'];
        $roleCreate->save();
        return redirect()->back()->with('message', 'Your add new role successfuly');
    }
    public function edit(Request $request, $id)
    {
        $role = $request->validate([
            'rolename'    => 'required',
            'description' => 'required'
        ]);
        $role = Role::find($id);
        $role->name        =  $request['rolename'];
        $role->description =  $request['description'];
        $role->guard_name  =  $request['guard_name'];
        $role->update();
        return redirect()->back()->with('message', 'Your add new role successfuly');
    }
    public function delete()
    {
        //....code....
    }
    public function permission($id)
    {
        //return view('role.permission');
    }
    public function changePermission(Request $request, $id)
    {
        $role_data = Role::find($id);
        $perm = Role::findByName($role_data->name)->permissions;
        $all_permission  = $perm->pluck('name')->toArray();

        if (!empty($all_permission)) {
            return view('role.change-permission', compact('all_permission', 'role_data'));
        }
    }

    public function changePermissionStore(Request $request)
    {
        $roleId = $request['role_id'];
        $role = Role::firstOrCreate(['id' => $request['role_id']]);
        //client module
        if ($request->has('client-view')) {
            $permission = Permission::firstOrCreate(['name' => 'client-view']);
            if (!$role->hasPermissionTo('client-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('client-view');
        }
        if ($request->has('client-add')) {
            $permission = Permission::firstOrCreate(['name' => 'client-add']);
            if (!$role->hasPermissionTo('client-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('client-add');
        }
        if ($request->has('client-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'client-edit']);
            if (!$role->hasPermissionTo('client-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('client-edit');
        }
        if ($request->has('client-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'client-delete']);
            if (!$role->hasPermissionTo('client-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('client-delete');
        }
        if ($request->has('client-contact-person')) {
            $permission = Permission::firstOrCreate(['name' => 'client-contact-person']);
            if (!$role->hasPermissionTo('client-contact-person')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('client-contact-person');
        }
        if ($request->has('assign-service')) {
            $permission = Permission::firstOrCreate(['name' => 'assign-service']);
            if (!$role->hasPermissionTo('assign-service')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('assign-service');
        }
        if ($request->has('portal-password')) {
            $permission = Permission::firstOrCreate(['name' => 'portal-password']);
            if (!$role->hasPermissionTo('portal-password')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('portal-password');
        }
        if ($request->has('new-company')) {
            $permission = Permission::firstOrCreate(['name' => 'new-company']);
            if (!$role->hasPermissionTo('new-company')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('new-company');
        }
        //Task module
        if ($request->has('task-view')) {
            $permission = Permission::firstOrCreate(['name' => 'task-view']);
            if (!$role->hasPermissionTo('task-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('task-view');
        }
        if ($request->has('task-add')) {
            $permission = Permission::firstOrCreate(['name' => 'task-add']);
            if (!$role->hasPermissionTo('task-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('task-add');
        }
        if ($request->has('task-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'task-edit']);
            if (!$role->hasPermissionTo('task-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('task-edit');
        }
        if ($request->has('task-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'task-delete']);
            if (!$role->hasPermissionTo('task-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('assign-staff');
        }
        if ($request->has('assign-staff')) {
            $permission = Permission::firstOrCreate(['name' => 'assign-staff']);
            if (!$role->hasPermissionTo('assign-staff')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('assign-staff');
        }
        if ($request->has('receive-document')) {
            $permission = Permission::firstOrCreate(['name' => 'receive-document']);
            if (!$role->hasPermissionTo('receive-document')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('receive-document');
        }
        //Service Module
        if ($request->has('service-view')) {
            $permission = Permission::firstOrCreate(['name' => 'service-view']);
            if (!$role->hasPermissionTo('service-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('service-view');
        }
        if ($request->has('service-add')) {
            $permission = Permission::firstOrCreate(['name' => 'service-add']);
            if (!$role->hasPermissionTo('service-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('service-add');
        }
        if ($request->has('service-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'service-edit']);
            if (!$role->hasPermissionTo('service-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('service-delete');
        }
        if ($request->has('service-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'service-delete']);
            if (!$role->hasPermissionTo('service-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('service-delete');
        }
        if ($request->has('service-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'service-delete']);
            if (!$role->hasPermissionTo('service-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('service-checklist');
        }
        if ($request->has('service-checklist')) {
            $permission = Permission::firstOrCreate(['name' => 'service-checklist']);
            if (!$role->hasPermissionTo('service-checklist')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('service-checklist');
        }
        //Dispatch Module
        if ($request->has('dispatch-view')) {
            $permission = Permission::firstOrCreate(['name' => 'dispatch-view']);
            if (!$role->hasPermissionTo('dispatch-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('dispatch-view');
        }
        if ($request->has('dispatch-add')) {
            $permission = Permission::firstOrCreate(['name' => 'dispatch-add']);
            if (!$role->hasPermissionTo('dispatch-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('dispatch-add');
        }
        if ($request->has('dispatch-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'dispatch-edit']);
            if (!$role->hasPermissionTo('dispatch-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('dispatch-edit');
        }
        if ($request->has('dispatch-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'dispatch-delete']);
            if (!$role->hasPermissionTo('dispatch-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('dispatch-delete');
        }
        if ($request->has('dispatch-dispatch')) {
            $permission = Permission::firstOrCreate(['name' => 'dispatch-dispatch']);
            if (!$role->hasPermissionTo('dispatch-dispatch')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('dispatch-dispatch');
        }
        //Reminder Module
        if ($request->has('reminder-view')) {
            $permission = Permission::firstOrCreate(['name' => 'reminder-view']);
            if (!$role->hasPermissionTo('reminder-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('reminder-view');
        }
        if ($request->has('reminder-add')) {
            $permission = Permission::firstOrCreate(['name' => 'reminder-add']);
            if (!$role->hasPermissionTo('reminder-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('reminder-add');
        }
        if ($request->has('reminder-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'reminder-edit']);
            if (!$role->hasPermissionTo('reminder-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('reminder-delete');
        }
        if ($request->has('reminder-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'reminder-delete']);
            if (!$role->hasPermissionTo('reminder-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('reminder-delete');
        }
        if ($request->has('reminder-complete')) {
            $permission = Permission::firstOrCreate(['name' => 'reminder-complete']);
            if (!$role->hasPermissionTo('reminder-complete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('reminder-complete');
        }
        //Policies Module
        if ($request->has('policies-view')) {
            $permission = Permission::firstOrCreate(['name' => 'policies-view']);
            if (!$role->hasPermissionTo('policies-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('policies-view');
        }
        if ($request->has('policies-add')) {
            $permission = Permission::firstOrCreate(['name' => 'policies-add']);
            if (!$role->hasPermissionTo('policies-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('policies-add');
        }
        if ($request->has('policies-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'policies-edit']);
            if (!$role->hasPermissionTo('policies-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('policies-delete');
        }
        if ($request->has('policies-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'policies-delete']);
            if (!$role->hasPermissionTo('policies-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('policies-delete');
        }
        //Template Module
        if ($request->has('template-view')) {
            $permission = Permission::firstOrCreate(['name' => 'template-view']);
            if (!$role->hasPermissionTo('template-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('template-add');
        }
        if ($request->has('template-add')) {
            $permission = Permission::firstOrCreate(['name' => 'template-add']);
            if (!$role->hasPermissionTo('template-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('template-edit');
        }
        if ($request->has('template-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'template-edit']);
            if (!$role->hasPermissionTo('template-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('template-delete');
        }
        if ($request->has('template-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'template-delete']);
            if (!$role->hasPermissionTo('template-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('template-delete');
        }
        //People Module
        if ($request->has('user-view')) {
            $permission = Permission::firstOrCreate(['name' => 'user-view']);
            if (!$role->hasPermissionTo('user-view')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('user-view');
        }
        if ($request->has('user-edit')) {
            $permission = Permission::firstOrCreate(['name' => 'user-edit']);
            if (!$role->hasPermissionTo('user-edit')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('user-edit');
        }
        if ($request->has('user-add')) {
            $permission = Permission::firstOrCreate(['name' => 'user-add']);
            if (!$role->hasPermissionTo('user-add')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('user-add');
        }
        if ($request->has('user-delete')) {
            $permission = Permission::firstOrCreate(['name' => 'user-delete']);
            if (!$role->hasPermissionTo('user-delete')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('user-delete');
        }
        //Report Module
        if ($request->has('daily-report')) {
            $permission = Permission::firstOrCreate(['name' => 'daily-report']);
            if (!$role->hasPermissionTo('daily-report')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('daily-report');
        }
        if ($request->has('weekly-report')) {
            $permission = Permission::firstOrCreate(['name' => 'weekly-report']);
            if (!$role->hasPermissionTo('weekly-report')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('weekly-report');
        }
        if ($request->has('monthly-report')) {
            $permission = Permission::firstOrCreate(['name' => 'monthly-report']);
            if (!$role->hasPermissionTo('monthly-report')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('monthly-report');
        }
        if ($request->has('yearly-report')) {
            $permission = Permission::firstOrCreate(['name' => 'yearly-report']);
            if (!$role->hasPermissionTo('yearly-report')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('yearly-report');
        }
        if ($request->has('role-permission')) {
            $permission = Permission::firstOrCreate(['name' => 'role-permission']);
            if (!$role->hasPermissionTo('role-permission')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('role-permission');
        }
        if ($request->has('general-setting')) {
            $permission = Permission::firstOrCreate(['name' => 'general-setting']);
            if (!$role->hasPermissionTo('general-setting')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('general-setting');
        }
        if ($request->has('profile-setting')) {
            $permission = Permission::firstOrCreate(['name' => 'profile-setting']);
            if (!$role->hasPermissionTo('profile-setting')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('profile-setting');
        }
        if ($request->has('hrm-setting')) {
            $permission = Permission::firstOrCreate(['name' => 'hrm-setting']);
            if (!$role->hasPermissionTo('hrm-setting')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('hrm-setting');
        }
        if ($request->has('module-setting')) {
            $permission = Permission::firstOrCreate(['name' => 'module-setting']);
            if (!$role->hasPermissionTo('module-setting')) {
                $role->givePermissionTo($permission);
            }
        } else {
            $role->revokePermissionTo('module-setting');
        }

        return redirect()->back()->with('message', 'Permission are set successfully!');
    }
    public function addPermission(Request $request)
    {
        $role = $request->validate([
            'permission'    => 'required',
        ]);
        $role = new Permission();
        $role->name        =  $request['permission'];
        $role->guard_name  =  $request['guard_name'];
        $role->save();
        return redirect()->back()->with('message', 'Your add new role successfuly');
    }
    public function  createPermission(Request $request)
    {
        return view('role.create');
    }
    public function assignPermission(Request $request)
    {
        return view('role.role_has_permission');
    }
}
