<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="{{ Storage::url('images/' . $favicon) }}">
    <title>{{ isset($title) ? $title : 'Default Title' }}</title>

    <link rel="stylesheet" href="{{ url('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/font-icons/entypo/css/entypo.css') }}">
    <link rel="stylesheet" href="{{ url('//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic') }}">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/neon-core.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/neon-theme.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/neon-forms.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">

    <script src="{{ url('assets/js/jquery-1.11.3.min.js') }}"></script>

</head>
<style>
    tr>td:first-letter {
        text-transform: uppercase;
    }
</style>

<body class="page-body  page-fade" data-URL::to="http://clix.co.tz">
    <div class="page-container">
        <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
        <!--Side Menu Start-->
        @include('layouts.comm.side')
        <!--Side Menu End-->
        <div class="main-content">
            <!--header-->
            @include('layouts.comm.header')
            <!--header end//-->

            <hr />
            @yield('content')
            <br />
            <!-- Footer -->
            @include('layouts.comm.footer')
        </div>
    </div>

    <script type="text/javascript">
        var currentYear = new Date().getFullYear();
        document.getElementById('currentYear').textContent = currentYear;
    </script>

    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="{{ url('assets/js/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/rickshaw/rickshaw.min.css') }}">

    <!-- Bottom scripts (common) -->
    <script src="{{ url('assets/js/gsap/TweenMax.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/js/joinable.js') }}"></script>
    <script src="{{ url('assets/js/resizeable.js') }}"></script>
    <script src="{{ url('assets/js/neon-api.js') }}"></script>
    <script src="{{ url('assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>


    <!-- Imported scripts on this page -->
    <script src="{{ url('assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js') }}"></script>
    <script src="{{ url('assets/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('assets/js/rickshaw/vendor/d3.v3.js') }}"></script>
    <script src="{{ url('assets/js/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ url('assets/js/raphael-min.js') }}"></script>
    <script src="{{ url('assets/js/morris.min.js') }}"></script>
    <script src="{{ url('assets/js/toastr.js') }}"></script>
    <script src="{{ url('assets/js/neon-chat.js') }}"></script>


    <!-- JavaScripts initializations and stuff -->
    <script src="{{ url('assets/js/neon-custom.js') }}"></script>


    <!-- Demo Settings -->
    <script src="{{ url('assets/js/neon-demo.js') }}"></script>

</body>

</html>
