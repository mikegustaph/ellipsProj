@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Forbidden</strong></li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="" style="text-align: center;float:center;">
                <div class="page-error-404">
                    <div class="error-symbol">
                        <i class="entypo-attention"></i>
                    </div>

                    <div class="error-text">
                        <h2>403</h2>
                        <p>You don't have Permission!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
