@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{ isset($video) ? url('admin/video/' . $video->id) : url('admin/video') }}"
                      enctype="multipart/form-data">
                    @if(isset($video))
                        {{ method_field('put') }}
                    @endif
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="control-label required">Tên </label>
                            <input type="text" name="name" class="form-control" placeholder="Name"
                                   value="{{ isset($video) ? $video->name : '' }}">
                            <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('video_link') ? 'has-error' : '' }}">
                            <label class="control-label required">Youtube ID</label>
                            <input type="text" name="video_link" class="form-control" placeholder="Link Video Youtube"
                                   value="{{ isset($video) ? $video->video_link : '' }}">
                            <span class="help-block">{{ $errors->first('video_link', ':message') }}</span>
                        </div>

                        <div class="col-md-6 col-xs-12 form-group">
                            <label class="control-label required">Hiển thị</label>
                            <select required type="text" name="type" class="form-control select2"
                                    data-placeholder="Please select">
                                <option {{ @$video->type==\App\Constants\ConstCodeApi::NONE_DISPLAY?'selected':'' }} value="0">
                                    None
                                </option>
                                <option
                                        {{ @$video->type==\App\Constants\ConstCodeApi::DISPLAY?'selected':'' }}  value="1">
                                    YES
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('order') ? 'has-error' : '' }}">
                            <label class="control-label required">Thứ tự</label>
                            <input type="number" name="order" class="form-control" placeholder="Nhập thứ tự video"
                                   value="{{ isset($video) ? $video->order : '' }}">
                            <span class="help-block">{{ $errors->first('order', ':message') }}</span>

                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('point') ? 'has-error' : '' }}">
                            <label class="control-label required">Điểm thưởng xem video</label>
                            <input type="text" name="point" class="form-control number" placeholder="Nhập điểm thưởng!"
                                   value="{{ isset($video) ? $video->point : '' }}">
                            <span class="help-block">{{ $errors->first('point', ':message') }}</span>

                        </div>

                        <div class="clear"></div>

                        <!-- /.box-body -->
                        <div class="col-md-12 col-xs-12 form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Xác nhận
                            </button>
                            <a href="{{ url('admin/video') }}" type="button" class="btn btn-danger"><i
                                        class="fa fa-times"></i> Trở lại</a>
                        </div>
                        <div class="clear"></div>

                        <!-- /.box-footer -->
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script src="/backend/assets/js/jquery.min.js"></script>
<script>
    $('document').ready(function () {
        $("form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 4,
                    maxlength: 20,
                },
                video_link: "required",
                order: "required",
            },
            messages: {
                video_link: "Nhập video id!",
                order: "Chọn thứ tự hiển thị!",
                name: {
                    required: "Nhập tên video!",
                    minlength: "Nhập tối thiểu 6 ký tự",
                    maxlength: "Nhập tối đa 50 ký tự",
                },
            },
        });
    })
</script>
