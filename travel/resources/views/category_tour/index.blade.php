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
                                <a class=" btn btn-primary btn-flat" href="{{ url('admin/category_tour/create') }}"><i
                                            class="fa fa-plus-circle"></i>
                                    Thêm Mới Category</a>
                            </div>
                            <div class="box-tools col-md-2" style="float: right">
                                <form action="{{ url('admin/category_tour') }}" method="GET">
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
                                    <th>Tên (VI)</th>
                                    <th>Slogan (VI)</th>
                                    <th>Ảnh nền</th>
                                    <th>Tên (EN)</th>
                                    <th>Slogan (EN)</th>
                                    <th>Tên (TH)</th>
                                    <th>Slogan (TH)</th>
                                    <th>Tour</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($categoryTour))
                                    @foreach($categoryTour as $s)
                                        <tr>
                                            <td>{{$s->id}}</td>
                                            <td>
                                                <img class="rounded-circle" height="80" width="70"
                                                     src="{{isset($s->background)? url('uploads/category_tour/'.$s->background) :url('backend/assets/images/user.png')}}"/>
                                            </td>
                                            <td>{{$s->name_vi}}</td>
                                            <td>{{$s->slogan_vi}}</td>
                                            <td>{{$s->name_en}}</td>
                                            <td>{{$s->slogan_en}}</td>
                                            <td>{{$s->name_th}}</td>
                                            <td>{{$s->slogan_th}}</td>
                                            <td><a data-placement="top" title="Thanh toán"
                                                   class="btn click"
                                                   data-id="{{ $s->id }}"
                                                   data-toggle="modal" data-target="#myModal">
                                                    <i class="fa fa-eye" style="color: orange" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td><a href="{{ url('admin/category_tour/' . $s->id . '/edit') }}"
                                                   title="Sửa">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="delete" title="Xóa"
                                                   data-url="{{ url('admin/category_tour/' . $s->id) }}">
                                                    <i class="fa fa-trash-o fa-red"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr id="no-data" class="text-center">
                                        Không có dữ liệu
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <div class="page-info">
                                    {{ 'Tống ' . $categoryTour->total() . ' bản ghi ' . (request()->search ? 'found' : '') }}
                                </div>
                            </div>
                            <div class="pull-right">
                                {{ $categoryTour->appends(['search' => request()->search ])->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div><!-- end col-->
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title"></h3>

                </div>
                <div class="modal-body">
                    <div class="list-sales-payment">
                        <table class="table table-striped table-bordered m-b-0 toggle-circle" data-page-size="20">
                            <h4 style="width: 100%; text-align: center;margin-bottom: 20px;margin-top: -5px;">Danh sách
                                Tour</h4>
                            <thead>
                            <tr class="text-center">
                                <th class="text-center" data-sort-initial="true" data-toggle="true">ID</th>
                                <th class="text-center" data-sort-initial="true" data-toggle="true">Tên Tour</th>
                                <th class="text-center" data-sort-initial="true" data-toggle="true">Giá Mặc Định
                                </th>
                                <th class="text-center" data-sort-initial="true" data-toggle="true">Số Người Sử Dụng
                                </th>
                                <th class="text-center" data-sort-initial="true" data-toggle="true">Đánh Giá</th>
                                <th class="text-center" data-sort-initial="true" data-toggle="true">Thao Tác</th>

                            </tr>
                            </thead>
                            <tbody id="data_paid">
                            <tfoot>

                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(".click").on('click', function () {
                var id = $(this).data('id')
                console.log(id)
                $.ajax({
                    url: '/ajax/getTour/' + id,
                    type: 'GET',
                    success: function (res, textStatus, jqXHR) {
                        console.log(res);

                    },
                })
            })
        })
    </script>
@endsection
