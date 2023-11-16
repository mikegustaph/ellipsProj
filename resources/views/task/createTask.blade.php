@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Tasks</strong></li>

    </ol>

    <div class="row">
        <div class="col-md-3">
            <h2>Tasks</h2>
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
        <div class="col-md-3"></div>
    </div>
    <!--Main Content Start-->
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        A Form to Create a Task
                    </div>

                    <div class="panel-options">
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>

                <div class="panel-body">
                    <form role="form" method="post" action="{{ route('task.createTask') }}"
                        class="form-horizontal form-groups-bordered">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Task name</label>
                                    <div class="col-sm-8">
                                        <input id="taskname" type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    @if (Auth::user()->role_id <= 3)
                                        <label for="field-1" class="col-sm-3 control-label">Select Staff </label>
                                    @else
                                        <label for="field-1" class="col-sm-3 control-label">Select Staff</label>
                                    @endif
                                    <div class="col-sm-8">
                                        <select
                                            style="padding: 6px; font-size: 11px; border: 1px solid #ccc; border-radius: 3px; width: 263px;"
                                            name="employees" id="assignedEmployee" class="" data-allow-clear="true">
                                            <option disabled selected style="display:none;"><strong>Select Staff</strong>
                                            </option>
                                            @foreach ($users as $user)
                                                @if ($user->role_id > 1)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Start Date </label>
                                    <div class="col-sm-8">
                                        <input type="date" id="start_date" name="start_date" min="{{ date('Y-m-d') }}"
                                            class="form-control" id="field-1" placeholder="Enter Start date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">End Date </label>
                                    <div class="col-sm-8">
                                        <input type="date" name="end_date" class="form-control" id="field-1"
                                            placeholder="End Date">
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" style="float:right;" class="btn btn-success btn-icon icon-right">
                        Add Task <i class="entypo-plus"></i>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!--Main Content Start-->

    <script>
        document.getElementById("start_date").min = new Date().toISOString().split("T")[0];
    </script>
    <script type="text/javascript"></script>

@endsection
