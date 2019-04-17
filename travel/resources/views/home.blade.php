@extends('layouts.app')
{{--@section('tile')--}}
@section('content')
    <style>
        .success {
            color: #1bb99a;
        }

        .danger {
            color: #ff5d48;
        }

        .pink {
            color: #ff7aa3;
        }
    </style>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-layers float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Users</h6>
                <h2 class="m-b-20 success" data-plugin="counterup">{{number_format($count_user)}}</h2>
                <span class="label label-success"> +11% </span> <span class="text-muted">From previous period</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-paypal float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Tours</h6>
                <h2 class="m-b-20 danger"><span data-plugin="counterup">{{number_format($count_tour)}}</span></h2>
                <span class="label label-danger"> -29% </span> <span class="text-muted">From previous period</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-chart float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Tour Location</h6>
                <h2 class="m-b-20 pink"><span data-plugin="counterup">{{number_format($count_location)}}</span></h2>
                <span class="label label-pink"> 0% </span> <span class="text-muted">From previous period</span>
            </div>
        </div>
        <div class="clear"></div>
        <div class="col-xs-12 col-lg-12 col-xl-4">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Trends Monthly</h4>

                <div class="text-center m-b-20">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-sm btn-secondary">Today</button>
                        <button type="button" class="btn btn-sm btn-secondary">This Week</button>
                        <button type="button" class="btn btn-sm btn-secondary">Last Week</button>
                    </div>
                </div>

                <div id="morris-donut-example" style="height: 269px;"></div>

                <div class="text-center">
                    <ul class="list-inline chart-detail-list mb-0 m-t-10">
                        <li class="list-inline-item">
                            <h6 style="color: #3db9dc;"><i class="zmdi zmdi-circle-o m-r-5"></i>Phổ thông</h6>
                        </li>
                        <li class="list-inline-item">
                            <h6 style="color: #1bb99a;"><i class="zmdi zmdi-triangle-up m-r-5"></i>Bạc</h6>
                        </li>
                        <li class="list-inline-item">
                            <h6 style="color: #e2ce66;"><i class="zmdi zmdi-square-o m-r-5"></i>Vàng</h6>
                        </li>
                        <li class="list-inline-item">
                            <h6 style="color: #ff7aa3;"><i class="zmdi zmdi-square-o m-r-5"></i>Bạch kim</h6>
                        </li>
                        <li class="list-inline-item">
                            <h6 style="color: #ff5d48;"><i class="zmdi zmdi-square-o m-r-5"></i>Kim cương</h6>
                        </li>
                    </ul>
                </div>

            </div>
        </div><!-- end col-->

    </div>

@endsection
@section('script')
    <script>
        !function ($) {
            "use strict";

            var Dashboard = function () {
            };

            //creates Stacked chart
            Dashboard.prototype.createStackedChart = function (element, data, xkey, ykeys, labels, lineColors) {
                Morris.Bar({
                    element: element,
                    data: data,
                    xkey: xkey,
                    ykeys: ykeys,
                    stacked: true,
                    labels: labels,
                    hideHover: 'auto',
                    barSizeRatio: 0.4,
                    resize: true, //defaulted to true
                    gridLineColor: '#eeeeee',
                    barColors: lineColors
                });
            },


                //creates Donut chart
                Dashboard.prototype.createDonutChart = function (element, data, colors) {
                    Morris.Donut({
                        element: element,
                        data: data,
                        resize: true, //defaulted to true
                        colors: colors
                    });
                },

                Dashboard.prototype.init = function () {

                    //creating Stacked chart
                    var $stckedData = [
                        {y: '2005', a: 45, b: 180, c: 100},
                        {y: '2006', a: 75, b: 65, c: 80},
                        {y: '2007', a: 100, b: 90, c: 56},
                        {y: '2008', a: 75, b: 65, c: 89},
                        {y: '2009', a: 100, b: 90, c: 120},
                        {y: '2010', a: 75, b: 65, c: 110},
                        {y: '2011', a: 50, b: 40, c: 85},
                        {y: '2012', a: 75, b: 65, c: 52},
                        {y: '2013', a: 50, b: 40, c: 77},
                        {y: '2014', a: 75, b: 65, c: 90},
                        {y: '2015', a: 100, b: 90, c: 130}
                    ];
                    // this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b' ,'c'], ['Series A', 'Series B', 'Series C'], ['#3db9dc','#1bb99a', '#ebeff2']);

                    //creating donut chart
                    var $donutData = [
                        {label: "Common", value: {{$common}}},
                        {label: "Silver", value: {{$silver}}},
                        {label: "Gold", value: {{$gold}}},
                        {label: "Platinum", value: {{$platinum}}},
                        {label: "Diamond", value: {{$diamond}}}
                    ];
                    this.createDonutChart('morris-donut-example', $donutData, ['#3db9dc', '#1bb99a', '#e2ce66', '#ff7aa3', '#ff5d48']);
                },
                //init
                $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
        }(window.jQuery),

        //initializing
            function ($) {
                "use strict";
                $.Dashboard.init();
            }(window.jQuery);
    </script>
@endsection
