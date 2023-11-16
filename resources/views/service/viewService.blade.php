@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>View Service</strong></li>
    </ol>

    <div class="row">
        <div class="col-md-3">
            <h2>{{ $service->service_name }}</h2>
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
        <div class="col-md-3">
        </div>
    </div>
    <!--Main Content Start-->
    <div class="row">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Service checklist
                </div>
                <div class="panel-options">
                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered datatable" id="table-4">
                            <thead>
                                <tr>
                                    <th><strong>Prechecklist</strong></th>
                                    <th><strong>Actions</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($preData as $pre)
                                    <tr>
                                        <td>{{ $pre->note }}</td>
                                        <td>
                                            <a style="cursor: pointer;"
                                                href="{{ URL::to('/prechecklistDelete/' . $pre->id) }}" type="button"
                                                class="btn yes-btn btn-danger tooltip-primary" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Delete Checklist">
                                                <i class="entypo-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered datatable" id="table-4">
                            <thead>
                                <tr>
                                    <th><strong>Postchecklist</strong></th>
                                    <th><strong>Actions</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postData as $post)
                                    <tr>
                                        <td>{{ $post->note }}</td>
                                        <td>
                                            <a style="cursor: pointer;" type="button"
                                                class="btn yes-btn btn-danger tooltip-primary" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Delete Checklist"
                                                href="{{ URL::to('/postchecklistDelete/' . $post->id) }}">
                                                <i class="entypo-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal For the Precheck-->
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="row" style="padding:30px;">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <h4 class="modal-title text-center">Are you sure you want to delete this checklist?</h4>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-1">
                            @if (isset($pre))
                                <a style="cursor: pointer;" href="{{ URL::to('/prechecklistDelete/' . $pre->id) }}"
                                    type="button" class="btn yes-btn btn-danger" href="">Yes</a>
                            @endif
                        </div>
                        <div class="col-sm-1">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                        <div class="col-sm-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal For the Postcheck-->
    <div class="modal fade" id="modal-2">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="row" style="padding:30px;">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <h4 class="modal-title text-center">Are you sure you want to delete this checklist?</h4>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-1">
                            @if (isset($pre))
                                <a style="cursor: pointer;" type="button" class="btn yes-btn btn-danger"
                                    href="{{ URL::to('/postchecklistDelete/' . $post->id) }}">Yes</a>
                            @endif
                        </div>
                        <div class="col-sm-1">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                        <div class="col-sm-5"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Main Content End// -->

    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="assets/js/datatables/datatables.css">

    <!-- Bottom scripts (common) -->
    <script src="assets/js/joinable.js"></script>
    <script src="assets/js/resizeable.js"></script>
@endsection
