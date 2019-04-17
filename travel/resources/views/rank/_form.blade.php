@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{ isset($rank) ? url('admin/rank/' . $rank->id) : url('admin/rank') }}"
                      enctype="multipart/form-data">
                    @if(isset($rank))
                        {{ method_field('put') }}
                    @endif
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="control-label required">Tên (EN)</label>
                            <input required type="text" name="rank_name_en" class="form-control"
                                   placeholder="Tên Rank EN"
                                   value="{{ isset($rank) ? $rank->rank_name_en : '' }}">
                            <span class="help-block">{{ $errors->first('rank_name_en', ':message') }}</span>
                        </div>
                        <div
                                class="col-md-6 col-xs-12 form-group {{ $errors->has('rank_name_vi') ? 'has-error' : '' }}">
                            <label class="control-label required">Tên (VI)</label>
                            <input required type="text" name="rank_name_vi" id="rank_name_vi" class="form-control"
                                   placeholder="Tên VI"
                                   value="{{ isset($rank) ? $rank->rank_name_vi : '' }}">
                            <span class="help-block">{{ $errors->first('rank_name_vi', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="control-label required">Tên (TH)</label>
                            <input required type="text" value="{{ isset($rank) ? $rank->rank_name_th : '' }}"
                                   name="rank_name_th"
                                   class="form-control"
                                   placeholder="Tên TH">
                            <span class="help-block">{{ $errors->first('rank_name_th', ':message') }}</span>
                        </div>
                        <div
                                class="col-md-6 col-xs-12 form-group {{ $errors->has('point_level') ? 'has-error' : '' }}">
                            <label class="control-label {{ isset($rank) ? '' : 'required' }}">Điểm thăng cấp</label>
                            <input required type="text" name="point_level" class="form-control number"
                                   value="{{ isset($rank) ? $rank->point_level : '' }}"
                                   placeholder="Point Level">
                            <span class="help-block">{{ $errors->first('point_level', ':message') }}</span>
                        </div>
                        <div
                                class="col-md-6 col-xs-12 form-group {{ $errors->has('discount_max') ? 'has-error' : '' }}">
                            <label class="control-label ">Chiết khấu (%)</label>
                            <input type="text" name="discount_max" class="form-control number1"
                                   value="{{ isset($rank) ? $rank->discount_max : '' }}"
                                   placeholder="Example: 5 (5%)">
                            <span class="save_error help-block">{{ $errors->first('discount_max', ':message') }}</span>
                        </div>

                        <div class="clear"></div>

                        <div class="col-md-6 col-xs-12 form-group">
                            <label class="control-label">Ảnh</label>
                            <input type="file" id="image_file" name="image_file" class="form-control">
                            @if (isset($rank) && $rank->icon)
                                <img class="img-thumbnail" height="80" width="70" id="image_file"
                                     src="{{url('upload/rank/'.$rank->icon)}}">
                            @endif
                        </div>
                        <div class="clear"></div>
                        <!-- /.box-body -->
                        <div class="col-md-12 col-xs-12 form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Xác nhận
                            </button>
                            <a href="{{ url('admin/rank') }}" type="button" class="btn btn-danger"><i
                                        class="fa fa-times"></i> Về danh sách</a>
                        </div>
                        <div class="clear"></div>

                        <!-- /.box-footer -->
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('document').ready(function () {
            $('.number1').keypress(function () {
                var key_code = window.event.keyCode;
                if (key_code != 8) if ((key_code < 48 || key_code > 57) && key_code != 46) return false;
                if (key_code != 46 && (key_code < 48 || key_code > 57)) {
                    return false;
                }
            })
            $('input.number1').keyup(function () {
                var parent = $(this).closest('div');
                if ($(this).val() > 50) {
                    $(this).val(50);
                    parent.find('span.save_error').text('Không được nhập quá 50%').show();
                    setTimeout(function () {
                        parent.find('span.save_error').hide();
                    }, 2400)
                } else {
                    parent.find('span.save_error').hide();
                }
            })
            $("form").validate({
                rules: {
                    rank_name_vi: "required",
                    point_level: {
                        required: true,
                        number: true,
                    },
                    discount_max: "required",
                },
                messages: {
                    rank_name_vi: "Vui lòng điền tên",
                    point_level: {
                        required: "Không được để trống",
                        number: "Phải nhập là số",
                    },
                    discount_max: "Vui lòng điền tỷ % triếu khấu",
                },
            });
        })
    </script>
@endsection
