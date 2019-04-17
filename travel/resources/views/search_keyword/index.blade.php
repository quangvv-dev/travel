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
                                <a class=" btn btn-primary btn-flat" href="{{ url('admin/search_keyword/create') }}"><i
                                            class="fa fa-plus-circle"></i>
                                    Thêm Từ Khóa</a>
                            </div>
                            <div class="box-tools col-md-2" style="float: right">
                                <form action="{{ url('admin/search_keyword') }}" method="GET">
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
                                    <th>Từ Khóa</th>
                                    <th>Khu Vực</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($searchKeyword))
                                    @foreach($searchKeyword as $s)
                                        <tr>
                                            <th>{{$s->id}}</th>

                                            <th>{{$s->keyword}}</th>
                                            <th>{{ isset($s->tourLocation->name_vi)?$s->tourLocation->name_vi: 'Trang chủ' }}</th>
                                            <th><a href="{{ url('admin/search_keyword/' . $s->id . '/edit') }}"
                                                   title="Sửa">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="delete" title="Xóa"
                                                   data-url="{{ url('admin/search_keyword/' . $s->id) }}">
                                                    <i class="fa fa-trash-o fa-red"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th id="no-data" class="text-center" colspan="7">Không có dữ liệu</th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <div class="page-info">
                                    {{ 'Tổng ' . $searchKeyword->total() . ' bản ghi ' . (request()->search ? 'found' : '') }}
                                </div>
                            </div>
                            <div class="pull-right">
                                {{ $searchKeyword->appends(['search' => request()->search ])->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div><!-- end col-->

    </div>
@endsection
