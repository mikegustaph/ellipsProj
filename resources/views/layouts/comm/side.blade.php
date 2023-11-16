<div class="sidebar-menu">

    <div class="sidebar-menu-inner">

        <header class="logo-env">
            <!-- logo -->
            <div class="logo">
                <h1 class="" style="color:white;font-weight:bold;">TMS</h1>
                <!--   <a href="index.html">
                        <img src="assets/images/logo@2x.png" width="120" alt="" />
                    </a> -->
            </div>
            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon">
                    <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>


            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation">
                    <!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>
        @php
            use App\Models\Role_has_Permission;
            use Spatie\Permission\Models\Permission;
            use Spatie\Permission\Models\Role;
            use App\Models\Tasks;

            $user = Auth::user()->role_id;
            $role = Role::find($user);
            $perm = Role::findByName($role->name)->permissions;
            $all_perm = $perm->pluck('name')->toArray();

        @endphp
        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            @if (in_array('dashboard-view', $all_perm))
                <li class="active opened active">
                    <a href="{{ URL::to('home') }}">
                        <i class="entypo-gauge"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ URL::to('tasks') }}">
                    <i class="glyphicon glyphicon-tasks"></i>
                    <span class="title">Tasks</span>
                </a>
            </li>
            @if (in_array('user-view', $all_perm))
                <li class="">
                    <a href="javascript:void(0)">
                        <i class="entypo-users"></i>
                        <span class="title">Users</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ URL::to('userlist') }}">
                                <span class="title">User List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('adduser') }}">
                                <span class="title">Add User</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (in_array('general-setting', $all_perm))
                <li class="">
                    <a href="javascript:void(0)">
                        <i class="glyphicon glyphicon-cog"></i>
                        <span class="title">Settings</span>
                    </a>
                    <ul>

                        <li>
                            <a href="{{ URL::to('/role-permission') }}">
                                <span class="title">Role Permission</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('settings.profile') }}">
                                <span class="title">Profile</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif
        </ul>

    </div>
</div>
