@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Add new user</strong></li>
    </ol>

    <div class="row">
        <div class="col-md-3">

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
        </div>
        <div class="col-md-3"></div>
    </div>
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
    <!--Main Content-->

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        A form to new user
                    </div>

                    <div class="panel-options">

                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>

                <div class="panel-body">

                    <form id="typeform" action="{{ route('adduser') }}" method="POST" role="form"
                        class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Username</label>
                                    <div class="col-sm-7">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-7">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Password</label>
                                    <div class="col-sm-7">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Confirm Password</label>
                                    <div class="col-sm-7">
                                        <input id="password-confirm" type="password" class="col-sm-4 form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-4 control-label">Select User Role </label>
                                    <div class="col-sm-7">
                                        <select name="role_id" id="role" class=""
                                            style="padding: 6px; font-size: 11px; border: 1px solid #ccc; border-radius: 3px; width: 263px;"
                                            required>
                                            <option disabled selected>User Role</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Staff</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" id="submit-btn" style="float:right;" class="btn btn-success">
                            Submit <i class="entypo-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="assets/js/datatables/datatables.css">

    <link rel="stylesheet" href="assets/js/selectboxit/jquery.selectBoxIt.css">

    <!-- Imported scripts on this page -->
    <script src="assets/js/datatables/datatables.js"></script>
    <script src="assets/js/select2/select2.min.js"></script>
    <script src="assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="assets/js/typeahead.min.js"></script>
    <script src="assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>

@endsection
