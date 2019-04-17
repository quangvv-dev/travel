<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App Favicon -->
    <link rel="shortcut icon" href="/backend/assets/images/favicon.ico">

    <!-- App title -->
    <title>@yield('title')</title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="/backend/assets/plugins/morris/morris.css">

    <!-- Switchery css -->
    <link href="/backend/assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>

    <!-- Bootstrap CSS -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="/backend/assets/css/general.css" rel="stylesheet" type="text/css"/>

    <!-- App CSS -->
    <link href="/backend/assets/css/style.css" rel="stylesheet" type="text/css"/>

    <!-- Modernizr js -->
    <script src="/backend/assets/js/modernizr.min.js"></script>

    {{--select2--}}
    <link href="/bower_components/select2/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="/bower_components/select2/dist/css/select2-bootstrap.css" rel="stylesheet"/>

</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar End -->
    <!-- ========== Left Sidebar Start ========== -->
    <!-- Left Sidebar End -->
    {{--content--}}
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">@yield('title')</h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>


</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="/backend/assets/js/jquery.min.js"></script>
<script src="/backend/assets/js/popper.min.js"></script><!-- Tether for Bootstrap -->
<script src="/backend/assets/js/bootstrap.min.js"></script>
<script src="/backend/assets/js/detect.js"></script>
<script src="/backend/assets/js/fastclick.js"></script>
<script src="/backend/assets/js/jquery.blockUI.js"></script>
<script src="/bower_components/select2/dist/js/select2.min.js"></script>

</body>
</html>
