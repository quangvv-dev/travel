@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{ isset($categoryTour) ? url('admin/category_tour/' . $categoryTour->id) : url('admin/category_tour') }}"
                      enctype="multipart/form-data">
                    @if(isset($categoryTour))
                        {{ method_field('put') }}
                    @endif
                    {{ csrf_field() }}

                    <ul class="nav nav-tabs">
                        {{--<li class="active"><a href="#en" data-toggle="tab" title="{{ __("tab.en") }}">Home</a></li>--}}
                        <li class="nav-item "><a href="#vi" class="active nav-link" data-toggle="tab">Vietnamese</a>
                        </li>
                        <li class="nav-item"><a href="#en" class=" nav-link" data-toggle="tab">English</a></li>
                        <li class="nav-item"><a href="#th" class=" nav-link" data-toggle="tab">Thailand</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane " id="en">
                            <div class="row">
                                <div class="col-md-6 col-xs-12 form-group {{ $errors->has('slogan_en') ? 'has-error' : '' }}">
                                    <label class="control-label">Slogan</label>
                                    <input type="text" name="slogan_en" class="form-control"
                                           placeholder="Slogan"
                                           value="{{ isset($categoryTour) ? $categoryTour->slogan_en : '' }}">
                                    <span class="help-block">{{ $errors->first('slogan_en', ':message') }}</span>
                                </div>
                                <div class="col-md-6 col-xs-12 form-group {{ $errors->has('name_en') ? 'has-error' : '' }}">
                                    <label class="control-label">Tên Tiếng Anh</label>
                                    <input type="text" name="name_en" class="form-control"
                                           placeholder="Tên Tiếng Anh"
                                           value="{{ isset($categoryTour) ? $categoryTour->name_en : '' }}">
                                    <span class="help-block">{{ $errors->first('name_en', ':message') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active " id="vi">
                            <div class="row">

                                <div class="col-md-6 col-xs-12 form-group {{ $errors->has('slogan_vi') ? 'has-error' : '' }}">
                                    <label class="control-label required">Slogan</label>
                                    <input type="text" name="slogan_vi" class="form-control"
                                           placeholder="Slogan"
                                           value="{{ isset($categoryTour) ? $categoryTour->slogan_vi : old('slogan_vi') }}">
                                    <span class="help-block">{{ $errors->first('slogan_vi', ':message') }}</span>
                                </div>
                                <div class="col-md-6 col-xs-12 form-group {{ $errors->has('name_vi') ? 'has-error' : '' }}">
                                    <label class="control-label required">Tên Tiếng Việt</label>
                                    <input type="text" name="name_vi" class="form-control"
                                           placeholder="Tên Tiếng Việt"
                                           value="{{ isset($categoryTour) ? $categoryTour->name_vi : old('name_vi') }}">
                                    <span class="help-block">{{ $errors->first('name_vi', ':message') }}</span>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 col-xs-12 form-group {{ $errors->has('background') ? 'has-error' : '' }}">
                                    <label class="control-label required">Ảnh nền</label>
                                    <input type="file" name="background" class="form-control">
                                    <span class="help-block">{{ $errors->first('background', ':message') }}</span>
                                </div>
                                {{--<div class="col-md-6 col-xs-12 form-group {{ $errors->has('descript_vi') ? 'has-error' : '' }}">--}}
                                {{--<label class="control-label required">Descriptiton VI</label>--}}
                                {{--<input type="text" name="descript_vi" class="form-control"--}}
                                {{--placeholder="Descript VI"--}}
                                {{--value="{{ isset($categoryTour) ? $categoryTour->descript_vi : '' }}">--}}
                                {{--<span class="help-block">{{ $errors->first('descript_vi', ':message') }}</span>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="tab-pane " id="th">
                            <div class="row">
                                <div class="col-md-6 col-xs-12 form-group {{ $errors->has('slogan_th') ? 'has-error' : '' }}">
                                    <label class="control-label">Slogan</label>
                                    <input type="text" name="slogan_th" class="form-control"
                                           placeholder="Slogan"
                                           value="{{ isset($categoryTour) ? $categoryTour->slogan_th : '' }}">
                                    <span class="help-block">{{ $errors->first('slogan_th', ':message') }}</span>
                                </div>
                                <div class="col-md-6 col-xs-12 form-group {{ $errors->has('name_th') ? 'has-error' : '' }}">
                                    <label class="control-label">Tên Tiếng Thái</label>
                                    <input type="text" name="name_th" class="form-control"
                                           placeholder="Name TH"
                                           value="{{ isset($categoryTour) ? $categoryTour->name_th : '' }}">
                                    <span class="help-block">{{ $errors->first('name_th', ':message') }}</span>
                                </div>
                                {{--<div class="col-md-6 col-xs-12 form-group {{ $errors->has('descript_th') ? 'has-error' : '' }}">--}}
                                {{--<label class="control-label required">Descriptiton TH</label>--}}
                                {{--<input type="text" name="descript_th" class="form-control"--}}
                                {{--placeholder="Descript TH"--}}
                                {{--value="{{ isset($categoryTour) ? $categoryTour->descript_th : '' }}">--}}
                                {{--<span class="help-block">{{ $errors->first('descript_th', ':message') }}</span>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="col-md-12 col-xs-12 form-group">
                        <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Xác nhận
                        </button>
                        <a href="{{ url('admin/category_tour') }}" type="button" class="btn btn-danger"><i
                                    class="fa fa-times"></i> Về danh sách</a>
                    </div>
                    <div class="clear"></div>

                    <!-- /.box-footer -->
            </div>


            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
<script src="/backend/assets/js/jquery.min.js"></script>
@section('script')
    <script>
        $('document').ready(function () {
            console.log(1);
            $("form").validate({
                rules: {
                    slogan_vi: "required",
                    name_vi: "required",
                },
                messages: {
                    slogan_vi: "Không để trống slogan",
                    name_vi: "Không để trống Tên!",
                },
            });

        })
    </script>
@endsection
