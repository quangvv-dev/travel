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
                                <a class=" btn btn-primary btn-flat" href="{{ url('admin/faqs/create') }}"><i
                                            class="fa fa-plus-circle"></i>
                                    Thêm Mới </a>
                            </div>
                            <div class="box-tools col-md-2" style="float: right">
                                <form action="{{ url('admin/faqs') }}" method="GET">
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
                                    <th>Tên Chính Sách</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($faq))
                                    @foreach($faq as $s)
                                        <tr>
                                            <th>{{ $s->id }}</th>
                                            <th>{{ $s->question_vi }}</th>
                                            <th><a href="{{ url('admin/faqs/' . $s->id . '/edit') }}"
                                                   title="Sửa">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="delete" title="Xóa"
                                                   data-url="{{ url('admin/faqs/' . $s->id) }}">
                                                    <i class="fa fa-trash-o fa-red"></i>
                                                </a>
                                            </th>
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
                                    {{ 'Tống ' . $faq->total() . ' bản ghi ' . (request()->search ? 'found' : '') }}
                                </div>
                            </div>
                            <div class="pull-right">
                                {{ $faq->appends(['search' => request()->search ])->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div><!-- end col-->

    </div>
@endsection
