@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{ isset($policy) ? url('admin/policy/' . $policy->id) : url('admin/policy') }}"
                      enctype="multipart/form-data">
                    @if(isset($policy))
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
                        <div class="tab-pane" id="en">
                            <div class="row">
                                <div class="col-md-6 col-xs-6 form-group <?php echo e($errors->has('policy_description_en') ? 'has-error' : ''); ?>">
                                    <label class="control-label">Chính sách (EN)</label>
                                    <textarea type="text" class="form-control" name="policy_description_en"
                                              placeholder="Description">
                            <?php echo e(isset($policy) ? $policy->policy_description_en : ''); ?></textarea>
                                    <span
                                            class="help-block"><?php echo e($errors->first('policy_description_en',
                                            ':message')); ?></span>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane active " id="vi">
                            <div class="row">
                                <div class="col-md-6 col-xs-12 form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                    <label class="control-label required">Tên Chính Sách</label>
                                    <input type="text" name="name" class="form-control"
                                           value="{{ isset($policy)? $policy->name : old('name') }}">
                                    <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6 form-group <?php echo e($errors->has('policy_description_vi') ? 'has-error' : ''); ?>">
                                    <label class="control-label required">Chính sách (VI)</label>
                                    <textarea type="text" class="form-control" name="policy_description_vi"
                                              placeholder="Description">
                            <?php echo e(isset($policy) ? $policy->policy_description_vi : old('policy_description_vi')); ?></textarea>
                                    <span
                                            class="help-block"><?php echo e($errors->first('policy_description_vi',
                                            ':message')); ?></span>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane " id="th">
                            <div class="row">
                                <div class="col-md-6 col-xs-6 form-group <?php echo e($errors->has('policy_description_th') ? 'has-error' : ''); ?>">
                                    <label class="control-label">Chính sách (TH)</label>
                                    <textarea type="text" class="form-control" name="policy_description_th"
                                              placeholder="Description">
                            <?php echo e(isset($policy) ? $policy->policy_description_th : ''); ?></textarea>
                                    <span
                                            class="help-block"><?php echo e($errors->first('policy_description_th',
                                            ':message')); ?></span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="col-md-12 col-xs-12 form-group">
                        <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Xác nhận
                        </button>
                        <a href="{{ url('admin/policy') }}" type="button" class="btn btn-danger"><i
                                    class="fa fa-times"></i> Về danh sách</a>
                    </div>
                    <div class="clear"></div>

                    <!-- /.box-footer -->


                </form>
            </div>
        </div>
    </div>
@endsection
<script src="/backend/assets/js/jquery.min.js"></script>
<script>
    $('document').ready(function () {
        CKEDITOR.replace('policy_description_en');
        CKEDITOR.replace('policy_description_vi');
        CKEDITOR.replace('policy_description_th');
        $("form").validate({
            rules: {
                name: "required",
            },
            messages: {
                name: "Không được để trống!",
            },
        });
    })

</script>

