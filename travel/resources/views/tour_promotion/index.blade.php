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
                                <a class=" btn btn-primary btn-flat" href="{{ url('admin/tour_promotion/create') }}"><i
                                            class="fa fa-plus-circle"></i>
                                    Thêm Voucher</a>
                            </div>
                            <div class="box-tools col-md-2" style="float: right">
                                <form action="{{ url('admin/tour_promotion') }}" method="GET">
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
                                    <th>Tên</th>
                                    <th>Code</th>
                                    <th>Số lần sử dụng</th>
                                    <th>Số lần đã sử dụng</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($tourPromotion))
                                    @foreach($tourPromotion as $s)
                                        <tr>
                                            <td>{{$s->id}}</td>
                                            <td>{{$s->name}}</td>
                                            <td>{{$s->code}}</td>
                                            <td>{{$s->current_quantity}}</td>
                                            <td>{{$s->uses_quantity}}</td>

                                            <td><a class="btn"
                                                   href="{{ url('admin/tour_promotion/' . $s->id . '/edit') }}"
                                                   title="Sửa">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="delete" title="Xóa"
                                                   data-url="{{ url('admin/tour_promotion/' . $s->id) }}">
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
                                    {{ 'Tổng số ' . $tourPromotion->total() . ' bản ghi ' . (request()->search ? 'found' : '') }}
                                </div>
                            </div>
                            <div class="pull-right">
                                {{ $tourPromotion->appends(['search' => request()->search ])->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div><!-- end col-->

    </div>
@endsection
