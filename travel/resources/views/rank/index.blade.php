@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <!-- end row -->

                <div class="row ">
                    <div class="col-sm-12 col-xs-12 col-md-12">
                        <div class="box-header row" style="float: right;margin-bottom: 10px;margin-right: 10px">

                            <div class="box-tools col-md-2" >
                                <form action="{{ url('admin/rank') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" class="form-control pull-right"
                                               placeholder="Search"
                                               value="{{request()->search ?: ''}}">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>
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
                                    <th>Ảnh</th>
                                    <th>Tên (EN)</th>
                                    <th>Tên (Vi)</th>
                                    <th>Tên (TH)</th>
                                    <th>Điểm thăng cấp</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($rank))
                                    @foreach($rank as $s)
                                        <tr>
                                            <td>{{$s->id}}</td>
                                            <td><img class="rounded-circle" height="60" width="60" src="{{$s->icon ?url('uploads/rank/'.$s->icon):url('backend/assets/images/user.png')}}"/>
                                            </td>
                                            <td>{{$s->rank_name_en}}</td>
                                            <td>{{$s->rank_name_vi}}</td>
                                            <td>{{$s->rank_name_th}}</td>
                                            <td>{{$s->point_level	}}</td>
                                            <td><a class="btn" href="{{ url('admin/rank/' . $s->id . '/edit') }}" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th id="no-data" class="text-center" colspan="7" >No data available in table</th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <div class="page-info">
                                    {{ 'Tổng số ' . $rank->total() . ' bản ghi ' . (request()->search ? 'found' : '') }}
                                </div>
                            </div>
                            <div class="pull-right">
                                {{ $rank->appends(['search' => request()->search ])->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div><!-- end col-->

    </div>
@endsection
