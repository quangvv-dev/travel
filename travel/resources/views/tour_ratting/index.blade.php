@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <!-- end row -->

                <div class="row ">
                    <div class="col-sm-12 col-xs-12 col-md-12">
                        <div class="box-header row">
                            <div class="col-md-10">

                            </div>
                            <div class="box-tools col-md-2" style="float: right">
                                <form action="{{ url('admin/ratting_tour') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" class="form-control pull-right"
                                               placeholder="Search"
                                               value="{{request()->search ?: ''}}">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="p-20">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Tên người dùng</th>
                                    <th>Tên tour</th>
                                    <th>Đánh giá</th>
                                    <th>Bình luận</th>
                                    <th>Thời gian đánh giá</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($tourLocationratting))
                                    @foreach($tourLocationratting as $s)
                                        <tr>
                                            <th>{{$s->id}}</th>
                                            <th>{{@$s->user->username}}</th>
                                            <th>{{@$s->tour->tour_name_vi}}</th>
                                            <th>{{$s->star_rating}}</th>
                                            <th>{{$s->comment}}</th>
                                            <th>{{$s->created_at}}</th>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th id="no-data" class="text-center" colspan="8">No data available in table</th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <div class="page-info">
                                    {{ 'Total ' . $tourLocationratting->total() . ' records ' . (request()->search ? 'found' : '') }}
                                </div>
                            </div>
                            <div class="pull-right">
                                {{ $tourLocationratting->appends(['search' => request()->search ])->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div><!-- end col-->

    </div>
@endsection
