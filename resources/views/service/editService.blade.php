@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Edit Service</strong></li>

    </ol>

    <div class="row">
        <div class="col-md-3">
            <h2>Edit Service</h2>
        </div>
        <div class="col-md-6">
            @if ($errors->any())
                <div id="error-message" class="alert alert-danger">
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
            @if (session('error'))
                <div id="flash-message" class="alert alert-danger alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Oohps! </strong>{{ session('error') }}
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
        <div class="col-md-3">
        </div>
    </div>
    <!--Main Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        A Form to Edit Service
                    </div>
                    <div class="panel-options">
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/serviceupdate/' . $service->id) }}"
                        class="form-horizontal form-groups-bordered">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-3" style="padding-left:40px;">
                                <h5><strong>KPI to Complete Job</strong></h5>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Service Name </label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $service->service_name }}" name="service_name"
                                            class="form-control" id="field-1" placeholder="Enter service name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"> Description </label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $service->description }}" name="description"
                                            class="form-control" id="field-1" placeholder="Enter Description">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Due Date </label>
                                    <div class="col-sm-8">
                                        <input type="number" value="{{ $service->duedate }}" name="duedate"
                                            class="form-control" id="field-1" placeholder="Enter due date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"> Approver </label>
                                    <div class="col-sm-8">
                                        <select name="role" class="selectboxit">
                                            <option><strong>Select Role</strong></option>
                                            <option value="Super Admin">Super Admin</option>
                                            <option value="Coordinator">Coordinator</option>
                                            <option value="Senior">Senior</option>
                                            <option value="Junior">Junior</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Repeat </label>
                                    <div class="col-sm-8">
                                        <select name="repeat" class="selectboxit">
                                            <optgroup label="Repeat">
                                                <option>Select Repeat</option>
                                                <option value="none">none</option>
                                                <option value="daily">Daily</option>
                                                <option value="weekly">Weekly</option>
                                                <option value="monthly">Monthly</option>
                                                <option value="annually">Annually</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"> Track KPI </label>
                                    <div class="col-sm-8">
                                        <select name="service_kpi" class="selectboxit">
                                            <optgroup label="Track KPI">
                                                <option>Select Track KPI</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5 control-label"> Target Days </label>
                                    <div class="col-sm-4">
                                        <input type="text" value="{{ $service->kpi_complete_target_day }}"
                                            name="kpi_complete_target_day" class="form-control" id="field-1"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5 control-label"> Early Points </label>
                                    <div class="col-sm-4">
                                        <input type="text" value="{{ $service->kpi_complete_early_points }}"
                                            name="kpi_complete_early_points" class="form-control" id="field-1"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-5 control-label"> Late Points </label>
                                    <div class="col-sm-4">
                                        <input type="text" value="{{ $service->kpi_complete_late_points }}"
                                            name="kpi_complete_late_points" class="form-control" id="field-1"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <script type="text/javascript">
                            jQuery(window).load(function() {
                                var $table2 = jQuery("#table-2");

                                // Initialize DataTable
                                $table2.DataTable({
                                    "sDom": "tip",
                                    "bStateSave": false,
                                    "iDisplayLength": 8,
                                    "aoColumns": [{
                                            "bSortable": false
                                        },
                                        null,
                                        null,
                                        null,
                                        null
                                    ],
                                    "bStateSave": true
                                });

                                // Highlighted rows
                                $table2.find("tbody input[type=checkbox]").each(function(i, el) {
                                    var $this = $(el),
                                        $p = $this.closest('tr');

                                    $(el).on('change', function() {
                                        var is_checked = $this.is(':checked');

                                        $p[is_checked ? 'addClass' : 'removeClass']('highlight');
                                    });
                                });

                                // Replace Checboxes
                                $table2.find(".pagination a").click(function(ev) {
                                    replaceCheckboxes();
                                });
                            });

                            var addformRow = $('#formRow').ready(function() {

                            });
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" style="float:right;" class="btn btn-success btn-icon icon-right">
                Add Service <i class="entypo-plus"></i>
            </button>
        </div>
    </div>
    </form>


@endsection
