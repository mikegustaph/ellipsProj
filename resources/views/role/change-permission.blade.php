@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong> permissions </strong></li>
    </ol>
    <div class="row">
        <div class="col-md-5">

        </div>
        <div class="col-md-6">
            @if ($errors->any())
                <div id="error-message" class="alert alert-danger alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><strong>Oohps! </strong>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('message'))
                <div id="flash-message" class="alert alert-success alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Well done! </strong>{{ session('message') }}
                </div>
                <script>
                    $(document).ready(function() {
                        setTimeout(function() {
                            $('#flash-message').fadeOut('slow');
                            $('#error-message').fadeOut('slow');
                        }, 5000); // Adjust the timeout value (in milliseconds) as needed
                    });
                </script>
            @endif
        </div>
    </div>
    <!-- General Settings -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title" style="text-align: center;">Admin Group Permission</div>
                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                        <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('role.setPermission') }}" role="form"
                class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered table-responsive">
                    <div class="form-group" style="display: none;">
                        <input tabindex="5" value="{{ $role_data->id }}" name="role_id" type="checkbox" class="icheck"
                            id="minimal-checkbox-2" checked>
                    </div>

                    <thead>
                        <tr>
                            <th><strong>Module Name</strong></th>
                            <th><strong>View</strong></th>
                            <th><strong>Add</strong></th>
                            <th><strong>Edit</strong></th>
                            <th><strong>Delete</strong></th>
                            <th><strong></strong></th>
                            <th><strong></strong></th>
                            <th><strong></strong></th>

                        </tr>
                    </thead>

                    <tbody>
                        <!-- Client Module Start-->
                        <tr>
                            <td>Dashboard</td>
                            <td>
                                @if (in_array('client-view', $all_permission))
                                    <input tabindex="5" value="1" name="client-view" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="client-view" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2">
                                @endif

                            </td>
                            <td>
                                @if (in_array('client-add', $all_permission))
                                    <input tabindex="5" value="1" name="client-add" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="client-add" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('client-edit', $all_permission))
                                    <input tabindex="5" value="1" name="client-edit" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="client-edit" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('client-contact-person', $all_permission))
                                    <input tabindex="5" value="1" name="client-contact-person" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="client-contact-person" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>

                        </tr>
                        <!-- Client Module End-->
                        <tr>
                            <!-- Task Module Start-->
                            <td>Tasks</td>
                            <td>
                                @if (in_array('task-view', $all_permission))
                                    <input tabindex="5" value="1" name="task-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="task-view" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('task-add', $all_permission))
                                    <input tabindex="5" value="1" name="task-add" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="task-add" type="checkbox" class="icheck"
                                        id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('task-edit', $all_permission))
                                    <input tabindex="5" value="1" name="task-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="task-edit" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>
                            <td>
                                @if (in_array('task-delete', $all_permission))
                                    <input tabindex="5" value="1" name="task-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked>
                                @else
                                    <input tabindex="5" value="1" name="task-delete" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2">
                                @endif
                            </td>

                        </tr>
                        <!--Task Module End //-->

                        <tr>
                            <td>Settings</td>
                            <td>
                                @if (in_array('role-permission', $all_permission))
                                    <input tabindex="5" value="1" name="role-permission" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked><span> Role permission</span>
                                @else
                                    <input tabindex="5" value="1" name="role-permission" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2"><span> Role permission</span>
                                @endif
                            </td>
                            <td>
                                @if (in_array('general-setting', $all_permission))
                                    <input tabindex="5" value="1" name="general-setting" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked><span> General </span>
                                @else
                                    <input tabindex="5" value="1" name="general-setting" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2"><span> General </span>
                                @endif
                            </td>
                            <td>
                                @if (in_array('profile-setting', $all_permission))
                                    <input tabindex="5" value="1" name="profile-setting" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2" checked><span> profile</span>
                                @else
                                    <input tabindex="5" value="1" name="profile-setting" type="checkbox"
                                        class="icheck" id="minimal-checkbox-2"><span> Profile</span>
                                @endif
                            </td>

                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="row" style="padding-right:0;">
        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" id="submit-btn" style="float:right;" class="btn btn-success">
                    Save Changes
                </button>
            </div>

            </form>
        </div>
    </div>
@endsection
