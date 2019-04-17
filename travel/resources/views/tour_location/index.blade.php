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
                                <a class=" btn btn-primary btn-flat" href="{{ url('admin/tour-location/create') }}"><i
                                            class="fa fa-plus-circle"></i>
                                    Thêm địa điểm</a>
                            </div>
                            <div class="box-tools col-md-2" style="float: right">
                                <form action="{{ url('admin/tour-location') }}" method="GET">
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
                                    <th>Tên</th>
                                    <th>Nổi bật</th>
                                    <th class="text-center">Đánh giá</th>
                                    <th>Thống kê</th>
                                    <th>Số Tour</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($location))
                                    @foreach($location as $s)
                                        <tr>
                                            <td>{{$s->id}}</td>
                                            <td><img class="rounded-circle" height="60" width="60"
                                                     src="{{$s->image ?url('uploads/location/'.$s->image) :url('backend/assets/images/user.png')}}"/>
                                            </td>
                                            <td>{{$s->name_vi}}</td>
                                            <td>{!! $s->highlights== \App\Constants\StatusCode::HIGHLIGHT ?'<span class="label label-success">HIGHLIGHT</span>':'<span class="label label-info">None</span>'!!}</td>
                                            <td class="text-center">
                                                <a href="{{url('admin/tour_location_ratting?search='.$s->tour_name_vi)}}">
                                                    @for($i = 1; $i <= $s->avg_star_rating; $i++ )
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    @if($s->avg_star_rating/0.5%2 == 1)
                                                        <i class="fa fa-star-half"></i>
                                                    @endif
                                                    @for($i = 1; $i <= (5- $s->avg_star_rating); $i++ )
                                                        <i class="fa fa-star-o"></i>
                                                    @endfor
                                                </a>
                                            </td>
                                            <td><a class="btn"
                                                   href="{{ url('admin/tour_location_ratting?search='.$s->name_vi) }}"
                                                   title="Đánh giá">Đánh giá</a>
                                            </td>
                                            <td>{{ $s->tour_count  }}</td>
                                            <td><a class="btn"
                                                   href="{{ url('admin/tour-location/' . $s->id . '/edit') }}"
                                                   title="Sửa">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn delete" title="Xóa"
                                                   data-url="{{ url('admin/tour-location/' . $s->id) }}">
                                                    <i class="fa fa-trash-o fa-red"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th id="no-data" class="text-center" colspan="8">Không có dữ liệu</th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <div class="page-info">
                                    {{ 'Tổng số ' . $location->total() . ' bản ghi ' . (request()->search ? 'found' : '') }}
                                </div>
                            </div>
                            <div class="pull-right">
                                {{ $location->appends(['search' => request()->search ])->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div><!-- end col-->

    </div>
@endsection
