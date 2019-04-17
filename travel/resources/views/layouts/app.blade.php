<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
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

    {{--DatePicker--}}
    <link href="/backend/assets/plugins/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
    <link href="/backend/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    {{--bootstrap-validate--}}
    <link href="/backend/assets/css/bootstrapValidator.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all"
          rel="stylesheet" type="text/css"/>


    <style type="text/css">

        .main-section {

            margin: 0 auto;

            padding: 20px;

            margin-top: 100px;

            background-color: #fff;

            box-shadow: 0px 0px 20px #c1c1c1;

        }

        .fileinput-remove,
        .fileinput-upload {

            display: none;

        }

    </style>
    {{--Time picker--}}
    <link href="/backend/assets/plugins/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">

    <!-- Sweet Alert css -->
    <link href="/backend/assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css"/>

    <style>
        .help-block {
            color: red;
        }

        .select2-selection__rendered {
            top: 0px;

        }
    </style>
</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
@include('layouts.header')
<!-- Top Bar End -->
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">

            <!--- Sidemenu -->
        @include('layouts.side-menu')

        <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>

    </div>
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
                @if(Session::has('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ Session::get('status') }}
                        @php
                            Session::forget('status');
                        @endphp
                    </div>
                @elseif(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ Session::get('error') }}
                        @php
                            Session::forget('error');
                        @endphp
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
    <!-- End content-page -->
    @include('layouts.footer')


</div>
<!-- END wrapper -->

<!-- Page specific js -->

<!-- jQuery  -->
<script src="/backend/assets/js/jquery.min.js"></script>
<script src="/backend/assets/js/popper.min.js"></script><!-- Tether for Bootstrap -->
<script src="/backend/assets/js/bootstrap.min.js"></script>
<script src="/backend/assets/js/waves.js"></script>
<script src="/backend/assets/plugins/switchery/switchery.min.js"></script>
<script src="/backend/assets/js/jquery.nicescroll.js"></script>
<script src="/backend/assets/js/detect.js"></script>
<script src="/backend/assets/js/fastclick.js"></script>
<script src="/backend/assets/js/jquery.blockUI.js"></script>
<script src="/bower_components/select2/dist/js/select2.min.js"></script>
{{--Ckeditor--}}
<script src="/bower_components/ckeditor/ckeditor.js" type="text/javascript"></script>
{{--jquery validate--}}
<script src="/bower_components/jquery-validation/dist/jquery.validate.js"></script>
{{--jquery number--}}
<script src="/backend/assets/js/jquery.number.min.js"></script>
{{--Moment--}}
<script src="/backend/assets/plugins/moment/moment.js"></script>
{{--Datepicker JS--}}
<script src="/backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="/backend/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
{{--Chart circle--}}
<script src="/backend/assets/plugins/morris/morris.min.js"></script>
<script src="/backend/assets/plugins/raphael/raphael-min.js"></script>
<script src="/backend/assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="/backend/assets/plugins/counterup/jquery.counterup.min.js"></script>

<script src="/backend/assets/js/jquery.core.js"></script>
<script src="/backend/assets/js/jquery.app.js"></script>
{{--Time picker JS--}}
<script src="/backend/assets/plugins/clockpicker/bootstrap-clockpicker.js"></script>
{{--Alert you are sure--}}
<script src="/backend/assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>

@yield('script')
<script src="/backend/assets/js/bootstrapValidator.min.js"></script>

<style type="text/css">

    .main-section {

        margin: 0 auto;

        padding: 20px;

        margin-top: 20px;

        background-color: #fff;

        box-shadow: 0px 0px 20px #c1c1c1;

    }

    .fileinput-remove,
    .fileinput-upload {

        display: none;
    }

    .scroll {
        overflow: auto;
    }

</style>


@include('layouts._script')

<script>
    var resizefunc = [];
    //Jquery number
    $('.number').number(true);

    // ajax csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // validate form
    $('#form').submit(function () {
        $(this).validate();
    })
    // validate error
    $.validator.setDefaults({
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else if (element.hasClass('select2-hidden-accessible')) {
                error.insertAfter(element.next('span'));
            } else {
                error.insertAfter(element);
            }
        }
    });
    // select 2
    $(document).ready(function () {
        $('.select2').select2({
            width: '100%',
            theme: 'bootstrap',
            allowClear: true,
            placeholder: function () {
                $(this).data('placeholder');
            }
        });

        $('.select2-hidden-accessible').on('change', function () {
            $(this).valid();
        });
        // close alert
        window.setTimeout(function () {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
                $(this).remove();
            });
        }, 2000);

        // delete action
        $('.delete').click(function () {
            var url = $(this).data('url');
            swal({
                title: 'Are you sure ?',
                text: "You will not be able to recover this imaginary file!",
                type: "error",
                showCancelButton: true,
                cancelButtonClass: 'btn-secondary waves-effect',
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: 'OK'
            }, function () {
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        _method: 'delete',
                    },
                    success: function () {
                        window.location.reload();
                    }
                })
            })

        });
    }).ajaxStart(function () {
        $('#loading').show();
    }).ajaxStop(function () {
        $('#loading').hide();
    });
</script>
@yield('scripts')
</body>
</html>
