@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{ url('admin/setting_point') }}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('introduce_friend') ? 'has-error' : '' }}">
                            <label class="control-label required">Giới thiệu bạn bè(điểm)</label>
                            <input type="text" name="introduce_friend" class="form-control number"
                                   placeholder="Giới thiệu bạn bè"
                                   value="{{ isset($setting_point) ? $setting_point->introduce_friend : '' }}">
                            <span class="help-block">{{ $errors->first('introduce_friend', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('share_location') ? 'has-error' : '' }}">
                            <label class="control-label required">Điểm thưởng chia sẻ địa điểm </label>
                            <input type="text" name="share_location" class="form-control number"
                                   placeholder="Chia sẻ địa điểm"
                                   value="{{ isset($setting_point) ? $setting_point->share_location : '' }}">
                            <span class="help-block">{{ $errors->first('share_location', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('share_tour') ? 'has-error' : '' }}">
                            <label class="control-label required">Điểm thưởng chia sẻ tour</label>
                            <input type="text" name="share_tour" class="form-control number"
                                   placeholder="Chia sẻ tour"
                                   value="{{ isset($setting_point) ? $setting_point->share_tour : '' }}">
                            <span class="help-block">{{ $errors->first('share_tour', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('rating_tour') ? 'has-error' : '' }}">
                            <label class="control-label required">Điểm thưởng đánh giá tour</label>
                            <input type="text" name="rating_tour" class="form-control number"
                                   placeholder="Đánh giá tour"
                                   value="{{ isset($setting_point) ? $setting_point->rating_tour : '' }}">
                            <span class="help-block">{{ $errors->first('rating_tour', ':message') }}</span>
                        </div>
                        {{--<div class="col-md-6 col-xs-12 form-group {{ $errors->has('rating_location') ? 'has-error' : '' }}">--}}
                        {{--<label class="control-label required">Điểm thưởng đánh giá địa điểm</label>--}}
                        {{--<input type="text" name="rating_location" class="form-control number"--}}
                        {{--placeholder="Đánh giá địa điểm"--}}
                        {{--value="{{ isset($setting_point) ? $setting_point->rating_location : '' }}">--}}
                        {{--<span class="help-block">{{ $errors->first('rating_location', ':message') }}</span>--}}
                        {{--</div>--}}
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('discount_order') ? 'has-error' : '' }}">
                            <label class="control-label required">Điểm giảm giá khi thanh toán</label>
                            <input type="text" name="discount_order" class="form-control number"
                                   placeholder="Giảm giá theo điểm"
                                   value="{{ isset($setting_point) ? $setting_point->discount_order : '' }}">
                            <span class="help-block">{{ $errors->first('discount_order', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('redemption_point_vi') ? 'has-error' : '' }}">
                            <label class="control-label required">Điểm quy đổi từ đặt tour (1000đ/1 điểm)</label>
                            <input type="text" name="redemption_point_vi" class="form-control number"
                                   placeholder="Điểm quy đổi từ tiền(VI)"
                                   value="{{ isset($setting_point) ? $setting_point->redemption_point_vi : '' }}">
                            <span class="help-block">{{ $errors->first('redemption_point_vi', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('redemption_point_th') ? 'has-error' : '' }}">
                            <label class="control-label required">Điểm quy đổi từ đặt tour (100 bạt /1 điểm)</label>
                            <input type="text" name="redemption_point_th" class="form-control number"
                                   placeholder="Điểm quy đổi từ tiền (Thái)"
                                   value="{{ isset($setting_point) ? $setting_point->redemption_point_th : '' }}">
                            <span class="help-block">{{ $errors->first('redemption_point_th', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('redemption_point_en') ? 'has-error' : '' }}">
                            <label class="control-label required">Điểm quy đổi từ đặt tour (1usd/10 điểm)</label>
                            <input type="text" name="redemption_point_en" class="form-control number"
                                   placeholder="Điểm quy đổi từ tiền (USD)"
                                   value="{{ isset($setting_point) ? $setting_point->redemption_point_en : '' }}">
                            <span class="help-block">{{ $errors->first('redemption_point_en', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('exchange_en') ? 'has-error' : '' }}">
                            <label class="control-label required">Tỷ giá quy đổi sang USD</label>
                            <input type="text" name="exchange_en" class="form-control number"
                                   placeholder="Tỉ giá quy đổi sang USD"
                                   value="{{ isset($setting_point) ? $setting_point->exchange_en : '' }}">
                            <span class="help-block">{{ $errors->first('exchange_en', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('exchange_th') ? 'has-error' : '' }}">
                            <label class="control-label required">Tỷ giá quy đổi sang Baht Thái</label>
                            <input type="text" name="exchange_th" class="form-control number"
                                   placeholder="Tỉ giá quy đổi sang Baht"
                                   value="{{ isset($setting_point) ? $setting_point->exchange_th : '' }}">
                            <span class="help-block">{{ $errors->first('exchange_th', ':message') }}</span>
                        </div>

                        <!-- /.box-body -->
                        <div class="col-md-12 col-xs-12 form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Xác nhận
                            </button>
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
                introduce_friend: "required",
                share_location: "required",
                share_tour: "required",
                rating_tour: "required",
                // rating_location: "required",
                discount_order: "required",
                redemption_point_vi: "required",
                redemption_point_en: "required",
                redemption_point_th: "required",
                exchange_en: "required",
                exchange_th: "required",

            },
            messages: {
                introduce_friend: "Không được để trống điểm giới thiệu bạn bè!",
                share_location: "Không được để trống điểm chia sẻ địa điểm!",
                share_tour: "Không được để trống điểm chia sẻ tour!",
                rating_tour: "Không được để trống điểm đánh giá tour!",
                // rating_location: "Không được để trống điểm đánh giá địa điểm!",
                discount_order: "Không được để trống điểm giảm giá!",
                redemption_point_vi: "Không được để trống điểm quy đổi tiền việt!",
                redemption_point_en: "Không được để trống điểm quy đổi tiền usd!",
                redemption_point_th: "Không được để trống điểm quy đổi tiền thái!",
                exchange_en: "Không được để trống tỷ giá quy đổi tiền usd!",
                exchange_th: "Không được để trống tỷ giá quy đổi tiền thái!",

            },
        });
    })
</script>
