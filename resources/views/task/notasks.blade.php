@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Tasks</strong></li>
        <a href="{{ URL::to('createTask') }}" style="float:right;" class="btn btn-primary btn-icon icon-right">
            Create Task <i class="entypo-plus"></i>
        </a>
    </ol>

    <div class="row">
        <div class="col-md-9 col-sm-7">
            <h2>Tasks</h2>
        </div>

        <div class="col-md-3 col-sm-5"></div>
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

                        ]
                    });
                });
            </script>

            <table class="table table-bordered datatable" id="table-4">
                <thead>
                    <tr>
                        <th>
                            <div class="checkbox checkbox-replace">
                                <input type="checkbox" id="chk-1">
                            </div>
                        </th>
                        <th>Clients</th>
                        <th>Deadline</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Senior</th>
                        <th>Junior</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tbody>
                <tfoot>
                    <tr>
                        <th>
                            <div class="checkbox checkbox-replace">
                                <input type="checkbox" id="chk-1">
                            </div>
                        </th>
                        <th>Clients</th>
                        <th>Deadline</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Senior</th>
                        <th>Junior</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>


    <!------ Modal Here -------------->
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Assign Service to Client</h4>
                </div>

                <div class="modal-body">
                    Cooming Soon!
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="assets/js/select2/select2.css">

    <!-- Imported scripts on this page -->
    <script src="assets/js/datatables/datatables.js"></script>
    <script src="assets/js/select2/select2.min.js"></script>
    <script src="assets/js/neon-chat.js"></script>

    <!-- Bottom scripts (common) -->
    <script src="assets/js/gsap/TweenMax.min.js"></script>
    <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/joinable.js"></script>
    <script src="assets/js/resizeable.js"></script>
    <script src="assets/js/neon-api.js"></script>
@endsection
