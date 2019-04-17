@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{ isset($searchKeyword) ? url('admin/search_keyword/' . $searchKeyword->id) : url('admin/search_keyword') }}"
                      enctype="multipart/form-data">
                    @if(isset($searchKeyword))
                        {{ method_field('put') }}
                    @endif
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('keyword') ? 'has-error' : '' }}">
                            <label class="control-label required">Từ khóa</label>
                            <input type="text" name="keyword" class="form-control" required
                                   placeholder="Từ khóa tìm kiếm"
                                   value="{{ isset($searchKeyword) ? $searchKeyword->keyword : '' }}">
                            <span class="help-block">{{ $errors->first('keyword', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group">
                            <label class="control-label required">Hiển thị</label>
                            <select required type="text" name="type" class="form-control select2"
                                    data-placeholder="Please select">
                                <option
                                        {{ @$video->type==\App\Constants\ConstCodeApi::DISPLAY?'selected':'' }}  value="1">
                                    YES
                                </option>
                                <option {{ @$video->type==\App\Constants\ConstCodeApi::NONE_DISPLAY?'selected':'' }} value="0">
                                    None
                                </option>

                            </select>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group">
                            <label class="control-label">Địa điểm</label>
                            <select type="text" name="tour_location_id"
                                    class=" form-control select2">
                                <option value=""></option>
                                <?php if(@$location): ?>
                                <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                        value="<?php echo e($s->id); ?>" <?php echo e(isset($tour) && $tour->tour_location_id == $s->id ? 'selected' : ''); ?>><?php echo e($s->name_vi); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="clear"></div>

                        <!-- /.box-body -->
                        <div class="col-md-12 col-xs-12 form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i>Xác nhận
                            </button>
                            <a href="{{ url('admin/search_keyword') }}" type="button" class="btn btn-danger"><i
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
<script src="/backend/assets/js/jquery.min.js"></script>
<script>
    $('document').ready(function () {
        $("form").validate({
            rules: {
                keyword: "required",
                type: "required"

            },
            messages: {
                keyword: "Không được để trống từ khóa!",
                type: "Chọn trạng thái!"

            },
        });
    })
</script>
