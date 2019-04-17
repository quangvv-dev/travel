@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{ isset($faq) ? url('admin/faqs/'.$faq->id) : url('admin/faqs') }}"
                      enctype="multipart/form-data">
                    @if(isset($faq))
                        {{ method_field('put') }}
                    @endif
                    {{ csrf_field() }}

                    <ul class="nav nav-tabs">
                        {{--<li class="active"><a href="#en" data-toggle="tab" title="{{ __("tab.en") }}">Home</a></li>--}}
                        <li class="nav-item "><a href="#vi" class="active nav-link" data-toggle="tab">Vietnamese</a>
                        </li>
                        <li class="nav-item "><a href="#en" class="nav-link" data-toggle="tab">English</a>
                        </li>
                        <li class="nav-item "><a href="#th" class="nav-link" data-toggle="tab">Thailand</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="vi">
                            <div class="row">
                                <div class="col-md-6 col-xs-12 form-group <?php echo e($errors->has('question_vi') ? 'has-error' : ''); ?>">
                                    <label class="control-label required">Câu hỏi (VI)</label>
                                    <input type="text" name="question_vi" class="form-control"
                                           value="{{ isset($faq)? $faq->question_vi : old('question_vi') }}">
                                    <span class="help-block"><?php echo e($errors->first('question_vi',
                                            ':message')); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6 form-group <?php echo e($errors->has('faqs_vi') ? 'has-error' : ''); ?>">
                                    <label class="control-label required">Trả lời (VI)</label>
                                    <textarea type="text" class="form-control" name="faqs_vi"
                                              placeholder="FAQS">
                            <?php echo e(isset($faq) ? $faq->faqs_vi : old('faqs_vi')); ?></textarea>
                                    <span
                                            class="help-block"><?php echo e($errors->first('faqs_vi',
                                            ':message')); ?></span>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="en">
                            <div class="row">
                                <div class="col-md-6 col-xs-12 form-group <?php echo e($errors->has('question_en') ? 'has-error' : ''); ?>">
                                    <label class="control-label required">Câu hỏi (EN)</label>
                                    <input type="text" name="question_en" class="form-control"
                                           value="{{ isset($faq)? $faq->question_en : old('question_en') }}">
                                    <span class="help-block"><?php echo e($errors->first('question_en',
                                            ':message')); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6 form-group <?php echo e($errors->has('faqs_en') ? 'has-error' : ''); ?>">
                                    <label class="control-label required">Trả lời (EN)</label>
                                    <textarea type="text" class="form-control" name="faqs_en"
                                              placeholder="FAQS">
                            <?php echo e(isset($faq) ? $faq->faqs_en : old('faqs_en')); ?></textarea>
                                    <span
                                            class="help-block"><?php echo e($errors->first('faqs_en',
                                            ':message')); ?></span>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="th">
                            <div class="row">
                                <div class="col-md-6 col-xs-12 form-group <?php echo e($errors->has('question_th') ? 'has-error' : ''); ?>">
                                    <label class="control-label required">Câu hỏi (TH)</label>
                                    <input type="text" name="question_th" class="form-control"
                                           value="{{ isset($faq)? $faq->question_th : old('question_th') }}">
                                    <span class="help-block"><?php echo e($errors->first('question_th',
                                            ':message')); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6 form-group <?php echo e($errors->has('faqs_th') ? 'has-error' : ''); ?>">
                                    <label class="control-label required">Trả lời (TH)</label>
                                    <textarea type="text" class="form-control" name="faqs_th"
                                              placeholder="FAQS">
                            <?php echo e(isset($faq) ? $faq->faqs_th : old('faqs_th')); ?></textarea>
                                    <span
                                            class="help-block"><?php echo e($errors->first('faqs_th',
                                            ':message')); ?></span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="col-md-12 col-xs-12 form-group">
                        <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Xác nhận
                        </button>
                        <a href="{{ url('admin/faqs') }}" type="button" class="btn btn-danger"><i
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
        CKEDITOR.replace('faqs_vi');
        CKEDITOR.replace('faqs_en');
        CKEDITOR.replace('faqs_th');
        $("form").validate({
            rules: {
                question_vi: "required",
            },
            messages: {
                question_vi: "Không được để trống!",
            },
        });
    })

</script>

