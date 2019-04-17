@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form autocomplete="off" class="form-horizontal" method="POST"
                      action="{{ isset($tourPromotion) ? url('admin/tour_promotion/' . $tourPromotion->id) : url('admin/tour_promotion') }}"
                      enctype="multipart/form-data">
                    @if(isset($tourPromotion))
                        {{ method_field('put') }}
                    @endif
                    {{ csrf_field() }}

                    <div class="row">
                        <ul class="nav nav-tabs col-md-12" style="margin-bottom: 10px">
                            <li class="nav-item"><a class="active nav-link" data-toggle="tab"
                                                    href="#thongtin">Thông tin cơ bản</a></li>
                            <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#if">Thêm điều kiện</a>
                        </ul>
                        <div class="tab-content col-xs-12 col-md-12">
                            <div id="thongtin" class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12 form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                                        <label class="control-label required">Tên</label>
                                        <input type="text" name="name" class="form-control" placeholder="Tên"
                                               value="{{ isset($tourPromotion) ? $tourPromotion->name : '' }}">
                                        <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                                    </div>
                                    <div class="col-xs-12 col-md-6 form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                                        <label class="control-label">Mô tả ngắn</label>
                                        <textarea type="text" class="form-control" name="content" placeholder="Content">{{ isset($tourPromotion) ? $tourPromotion->content : '' }}
                            </textarea>
                                        <span
                                                class="help-block">{{ $errors->first('content', ':message') }}</span>
                                    </div>

                                    <div class="col-md-6 col-xs-12 form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                                        <label class="control-label required">Code</label>
                                        <input type="text" name="code" class="form-control" placeholder="Code"
                                               value="{{ isset($tourPromotion) ? $tourPromotion->code : strtoupper(str_random(6)) }}">
                                        <span class="help-block">{{ $errors->first('code', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('money_promotion_vi') ? 'has-error' : '' }}">
                                        <label class="control-label required">Tiền giảm (VI)</label>
                                        <input type="text" name="money_promotion_vi" class="form-control number"
                                               placeholder="Số tiền được giảm"
                                               value="{{ isset($tourPromotion) ? $tourPromotion->money_promotion_vi : '' }}">
                                        <span class="help-block">{{ $errors->first('money_promotion_vi', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('money_promotion_th') ? 'has-error' : '' }}">
                                        <label class="control-label ">Tiền giảm (TH)</label>
                                        <input type="text" name="money_promotion_th" class="form-control number"
                                               placeholder="Số tiền được giảm"
                                               value="{{ isset($tourPromotion) ? $tourPromotion->money_promotion_th : '' }}">
                                        <span class="help-block">{{ $errors->first('money_promotion_th', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('money_promotion') ? 'has-error' : '' }}">
                                        <label class="control-label">Tiền giảm (EN)</label>
                                        <input type="text" name="money_promotion_en" class="form-control number"
                                               placeholder="Số tiền được giảm"
                                               value="{{ isset($tourPromotion) ? $tourPromotion->money_promotion_en : '' }}">
                                        <span class="help-block">{{ $errors->first('money_promotion_en', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('percent_promotion') ? 'has-error' : '' }}">
                                        <label class="control-label required ">Phần trăm giảm (%)</label>
                                        <input type="text" name="percent_promotion" class="form-control number1"
                                               placeholder="Phần trăm được giảm"
                                               value="{{ isset($tourPromotion) ? $tourPromotion->percent_promotion : '' }}">
                                        <span class="help-block">{{ $errors->first('percent_promotion', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('max_discout') ? 'has-error' : '' }}">
                                        <label class="control-label">Giảm giá tối đa</label>
                                        <input type="text" name="max_discount" class="form-control number"
                                               placeholder="Giá tối đã được giảm"
                                               value="{{ isset($tourPromotion) ? $tourPromotion->max_discount : '' }}">
                                        <span class="help-block">{{ $errors->first('max_discout', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('time_start') ? 'has-error' : '' }}">
                                        <label class="control-label required">Thời gian bắt đầu</label>
                                        <input type="text" name="time_start" class="form-control time1"
                                               placeholder="Thời gian bắt đầu"
                                               value="{{ isset($tourPromotion) ? \Carbon\Carbon::createFromFormat('Y-m-d',$tourPromotion->time_start)->format('d-m-Y') : '' }}">
                                        <span class="help-block">{{ $errors->first('time_start', ':message') }}</span>
                                    </div>

                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('time_end') ? 'has-error' : '' }}">
                                        <label class="control-label required">Thời gian kết thúc</label>
                                        <input type="text" name="time_end" class="form-control time1"
                                               placeholder="Thời gian kết thúc"
                                               value="{{ isset($tourPromotion) ? \Carbon\Carbon::createFromFormat('Y-m-d',$tourPromotion->time_end)->format('d-m-Y') : '' }}">
                                        <span class="help-block">{{ $errors->first('time_end', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('current_quantity') ? 'has-error' : '' }}">
                                        <label class="control-label required">Số lượng sử dụng</label>
                                        <input type="text" name="current_quantity" class="form-control number"
                                               placeholder="Số lượng sử dụng"
                                               value="{{ isset($tourPromotion) ? $tourPromotion->current_quantity : '' }}">
                                        <span class="help-block">{{ $errors->first('current_quantity', ':message') }}</span>
                                    </div>
                                    <div class="col-md-6 col-xs-12 form-group {{ $errors->has('person_rank') ? 'has-error' : '' }}">
                                        <label class="control-label ">Cấp người sử dụng</label>
                                        {{--{{ dd($tourPromotion->person_rank) }}--}}
                                        <select class="form-control select2" multiple name="person_rank[]">
                                            @if(isset($rank))
                                                @foreach($rank as $s)
                                                    <option value="{{ $s->id }}" {{ isset($tourPromotion->person_rank)?(in_array($s->id,$tourPromotion->person_rank)?'selected':''):'' }}>{{$s->rank_name_vi}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="help-block">{{ $errors->first('person_rank', ':message') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div id="if" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12 form-group {{ $errors->has('min_price') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá tối thiểu</label>
                                        <input type="text" name="min_price" class="form-control number"
                                               placeholder="Giá tối thiểu"
                                               value="{{ isset($tourPromotion) ? $tourPromotion->min_price : '' }}">
                                        <span class="help-block">{{ $errors->first('min_price', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('person_quantity') ? 'has-error' : '' }}">
                                        <label class="control-label ">Số người tối thiểu được áp dụng</label>
                                        <input type="text" name="person_quantity" class="form-control number"
                                               placeholder="Số người tối thiểu được áp dụng!"
                                               value="{{ isset($tourPromotion) ? $tourPromotion->person_quantity : '' }}">
                                        <span class="help-block">{{ $errors->first('person_quantity', ':message') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- /.box-body -->
                        <div class="col-md-12 col-xs-12 form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i>OK</button>
                            <a href="{{ url('admin/tour_promotion') }}" type="button" class="btn btn-danger"><i
                                        class="fa fa-times"></i>Trở về</a>
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
        jQuery('.time1').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "dd-mm-yyyy",
        }).on('change', function () {
            // $('.list-package').css('display', 'block');
        });
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
                name: "required",
                code: "required",
                money_promotion: "required",
                percent_promotion: "required",
                time_start: "required",
                time_end: "required",
                current_quantity: "required",
                money_promotion_vi: "required",
            },
            messages: {
                name: "Nhập tên mã giảm giá!",
                code: "Nhập code!",
                money_promotion: "Tiền được giảm không để trống",
                percent_promotion: "Phần trăm giảm giá không được để trống!",
                time_start: "Thời gian bắt đầu không được để trống!",
                time_end: "Thời gian kết thúc không được để trống!",
                current_quantity: "Số lượng sử dụng không được để trống!",
                money_promotion_vi: "Số tiền được giảm không được để trống!",
            },
        });
    })
</script>

