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
                                <a class=" btn btn-primary btn-flat" href="{{ url('admin/intro/create') }}"><i
                                            class="fa fa-plus-circle"></i>
                                    Thêm mới</a>
                            </div>
                            <div class="box-tools col-md-2" style="float: right">
                                <form action="{{ url('admin/intro') }}" method="GET">
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
                                    <th>Ảnh</th>
                                    <th>Ngôn ngữ</th>
                                    <th>Thứ tự</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($intro))
                                    @foreach($intro as $s)
                                        <tr>
                                            <th>{{$s->id}}</th>
                                            <th>
                                                <img class="img-thumbnail" height="60" width="60"
                                                     src="{{url('uploads/intro/thumb_'.$s->images)}}"/>
                                            </th>
                                            <th>
                                                {!! $s->country_id == 'vi' ?'<span class="label label-success">Việt Nam</span>':($s->country_id == 'th' ?'<span class="label label-success">Thái Lan</span>':'<span class="label label-success">Anh</span>')!!}
                                            </th>
                                            <th>{{ $s->order }}</th>
                                            <th><a href="{{ url('admin/intro/' . $s->id . '/edit') }}" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="delete" title="Delete"
                                                   data-url="{{ url('admin/intro/' . $s->id) }}">
                                                    <i class="fa fa-trash-o fa-red"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th id="no-data" class="text-center" colspan="7">No data available in table</th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <div class="page-info">
                                    {{ 'Tổng ' . $intro->total() . ' bản ghi ' . (request()->search ? 'found' : '') }}
                                </div>
                            </div>
                            <div class="pull-right">
                                {{ $intro->appends(['search' => request()->search ])->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div><!-- end col-->

    </div>
@endsection
