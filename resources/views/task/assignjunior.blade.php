@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Assign Junior</strong></li>

    </ol>

    <div class="row">
        <div class="col-md-9 col-sm-7">
            <h2>Assign User</h2>
        </div>

        <div class="col-md-3 col-sm-5"></div>
    </div>
    <!--Main Content Start-->
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        A Form to assign user
                    </div>

                    <div class="panel-options">
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>

                <div class="panel-body">
                    <form role="form" method="post" action="{{ url('/assignjunior/' . $task->id) }}"
                        class="form-horizontal form-groups-bordered">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Task Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="service" name="name" value="{{ $task->name }}"
                                            class="form-control" id="field-1" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Staff</label>
                                    <div class="col-sm-8">
                                        <select name="junior" id="assignedEmployee" class="" data-allow-clear="true"
                                            style="padding: 6px; font-size: 11px; border: 1px solid #ccc; border-radius: 3px; width: 263px;">
                                            <option><strong>Select Staff</strong></option>
                                            @foreach ($junior as $user)
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
                                            class="form-control" id="field-1" value="{{ $task->start_date }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">End Date </label>
                                    <div class="col-sm-8">
                                        <input type="date" name="end_date" class="form-control" id="field-1"
                                            value="{{ $task->end_date }}" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" style="float:right;" class="btn btn-success">
                        Assign Task
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!--Main Content Start-->

    <link type="stylesheet" href="">
    <script>
        document.getElementById("start_date").min = new Date().toISOString().split("T")[0];
    </script>
@endsection
