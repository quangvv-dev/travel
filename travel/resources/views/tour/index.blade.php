@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
            {{--{{ dd($tour)  }}--}}
            <!-- end row -->
                <div class="row ">
                    <div class="col-sm-12 col-xs-12 col-md-12">
                        <div class="box-header row">
                            <div class="col-md-10">
                                <a class=" btn btn-primary btn-flat" href="{{ url('admin/tour/create') }}"><i
                                            class="fa fa-plus-circle"></i>
                                    Thêm tour</a>
                            </div>
                            <div class="box-tools col-md-2" style="float: right">
                                <form action="{{ url('admin/tour') }}" method="GET">
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
                                    <th>Tên (VN)</th>
                                    <th>Giá (mặc định)</th>
                                    <th>Số người sử dụng</th>
                                    <th class="text-center">Đánh giá</th>
                                    <th class="text-center">Hot</th>
                                    <th>Thống kê</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($tour))
                                    @foreach($tour as $s)
                                        <tr>
                                            <td>{{$s->id}}</td>
                                            <td><img class="rounded-circle" height="60" widtd="60"
                                                     src="{{isset($s->images)? url('uploads/tour/'.$s->images) :url('backend/assets/images/user.png')}}"/>
                                            </td>
                                            <td>{{$s->tour_name_vi}}</td>
                                            <td>{{number_format(@$s->packageDefault->price_adult)}}</td>
                                            <td>{{$s->booked_number}}</td>
                                            <td class="text-center">
                                                <a href="{{url('admin/ratting_tour?search='.$s->tour_name_vi)}}"
                                                   style="color: #88be14">
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
                                            <td class="text-center">
                                                @if($s->hot==1)
                                                    <i><span class="label label-success">HOT</span>
                                                @endif</td>
                                            <td>updating...</td>
                                            <td><a class="btn" href="{{ url('admin/tour/' . $s->id . '/edit') }}"
                                                   title="Sửa">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="delete" title="Xóa"
                                                   data-url="{{ url('admin/tour/' . $s->id) }}">
                                                    <i class="fa fa-trash-o fa-red"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th id="no-data" class="text-center" colspan="9">Không có dữ liệu</th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <div class="page-info">
                                    {{ 'Tổng số ' . $tour->total() . ' bản ghi ' . (request()->search ? 'found' : '') }}
                                </div>
                            </div>
                            <div class="pull-right">
                                {{ $tour->appends(['search' => request()->search ])->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div><!-- end col-->

    </div>
@endsection
