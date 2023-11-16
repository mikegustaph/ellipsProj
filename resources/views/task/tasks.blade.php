@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Tasks</strong></li>


        <a href="{{ URL::to('createTask') }}" style="float:right;" class="btn btn-success btn-icon icon-right">
            Add Task <i class="entypo-plus"></i>
        </a>


    </ol>

    <div class="row">
        <div class="col-md-9">

        </div>

        <div class="col-md-3"></div>
    </div>
    <!--Main Content-->
    <div class="row">
        <div class="col-md-12">

            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    var $table4 = jQuery("#table-4");

                    $table4.DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5'
                        ]
                    });
                });
            </script>

            <table class="table table-bordered datatable" id="table-4">
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Staff</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($tasks as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->start_date }}</td>
                            <td>{{ $row->end_date }}</td>
                            <td>{{ $row->userAssign->name }}</td>
                            <td>
                                @if ($row->status == 'Active')
                                    <span style="color:rgb(32, 112, 0);"><strong>Active</strong></span>
                                @elseif ($row->status == 'Inactive')
                                    <span style="color: rgb(234, 234, 234), 0);"><strong>Active</strong></span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-primary" role="menu">
                                        <li>
                                            <a href="{{ URL::to('/tasksprogress/' . $row->id) }}">
                                                View
                                            </a>
                                        </li>

                                        @if (Auth::user()->role_id < 3)
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{{ URL::to('/assignjunior/' . $row->id) }}">
                                                    Assign User
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>Task Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Staff</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
    <link rel="stylesheet" href="assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="assets/js/select2/select2.css">
    <script src="assets/js/datatables/datatables.js"></script>
    <script src="assets/js/select2/select2.min.js"></script>
@endsection
