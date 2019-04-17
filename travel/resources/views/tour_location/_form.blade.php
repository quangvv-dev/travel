@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{ isset($tourLocation) ? url('admin/tour-location/' . $tourLocation->id) : url('admin/tour-location') }}"
                      enctype="multipart/form-data">
                    @if(isset($tourLocation))
                        {{ method_field('put') }}
                    @endif
                    {{ csrf_field() }}
                    <div class="row">
                        <ul class="nav nav-tabs col-md-12" style="margin-bottom: 10px">
                            <li class="nav-item"><a class="active nav-link" data-toggle="tab"
                                                    href="#menu1">Vietnamese</a></li>
                            <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#home">English</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu2">Thailand</a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tab" class="nav-link" href="#menu3">Cài đặt</a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                        <br>
                        <div class="tab-content col-md-12">
                            <div id="home" class="tab-pane fade ">
                                <div class="row">
                                    <div
                                        class="col-md-6 col-xs-12 form-group {{ $errors->has('name_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Tên (EN)</label>
                                        <input type="text" name="name_en" class="form-control"
                                               placeholder="Điền tên "
                                               value="{{ isset($tourLocation) ? $tourLocation->name_en : '' }}">
                                        <span class="help-block">{{ $errors->first('name_en', ':message') }}</span>
                                    </div>
                                    <div
                                        class="col-md-6 col-xs-12 form-group {{ $errors->has('slogan_en') ? 'has-error' : '' }}">
                                        <label class="control-label ">Slogan (EN)</label>
                                        <input type="text" name="slogan_en" class="form-control"
                                               placeholder="Name EN"
                                               value="{{ isset($tourLocation) ? $tourLocation->slogan_en : '' }}">
                                        <span class="help-block">{{ $errors->first('slogan_en', ':message') }}</span>
                                    </div>

                                    <div class="clear"></div>
                                    <div
                                        class="col-xs-12 col-md-6 form-group {{ $errors->has('description_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Mô tả (EN)</label>
                                        <textarea type="text" class="form-control" name="description_en"
                                                  placeholder="Description">
                                                {{ isset($tourLocation) ? $tourLocation->description_en : '' }}
                                            </textarea>
                                        <span
                                            class="help-block">{{ $errors->first('description_en', ':message') }}</span>
                                    </div>
                                    <div
                                        class="col-xs-12 col-md-6 form-group {{ $errors->has('best_time_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Thời gian tuyệt nhất để đi (EN)</label>
                                        <textarea type="text" class="form-control" name="best_time_en"
                                                  placeholder="Best time en">
                                                {{ isset($tourLocation) ? $tourLocation->best_time_en : '' }}
                                            </textarea>
                                        <span class="help-block">{{ $errors->first('best_time_en', ':message') }}</span>
                                    </div>
                                </div>

                            </div>
                            <div id="menu1" class="tab-pane fade show active">
                                <div class="row">
                                    <div
                                        class="col-md-6 col-xs-12 form-group {{ $errors->has('name_vi') ? 'has-error' : '' }}">
                                        <label class="control-label required">Tên (VI)</label>
                                        <input required type="text" name="name_vi" id="name_vi" class="form-control"
                                               placeholder="Điền tên"
                                               value="{{ isset($tourLocation) ? $tourLocation->name_vi : old('name_vi') }}">
                                        <span class="help-block">{{ $errors->first('name_vi', ':message') }}</span>
                                    </div>
                                    <div
                                        class="col-md-6 col-xs-12 form-group {{ $errors->has('slogan_vi') ? 'has-error' : '' }}">
                                        <label class="control-label ">Slogan (VI)</label>
                                        <input type="text" name="slogan_vi" class="form-control"
                                               placeholder="Name EN"
                                               value="{{ isset($tourLocation) ? $tourLocation->slogan_vi : '' }}">
                                        <span class="help-block">{{ $errors->first('slogan_vi', ':message') }}</span>
                                    </div>
                                    <div
                                        class="col-xs-12 col-md-6 form-group {{ $errors->has('description_vi') ? 'has-error' : '' }}">
                                        <label class="control-label">Mô tả (VI)</label>
                                        <textarea type="text" class="form-control" name="description_vi">
                                                    {{ isset($tourLocation) ? $tourLocation->description_vi : '' }}
                                                </textarea>
                                        <span
                                            class="help-block">{{ $errors->first('description_vi', ':message') }}</span>
                                    </div>
                                    <div
                                        class="col-xs-12 col-md-6 form-group {{ $errors->has('best_time_vi') ? 'has-error' : '' }}">
                                        <label class="control-label">Thời gian tuyệt nhất để đi (VI)</label>
                                        <textarea type="text" class="form-control" name="best_time_vi">
                                            {{ isset($tourLocation) ? $tourLocation->best_time_vi : '' }}
                                        </textarea>
                                        <span class="help-block">{{ $errors->first('best_time_vi', ':message') }}</span>
                                    </div>

                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="row">
                                    <div
                                        class="col-md-6 col-xs-12 form-group {{ $errors->has('name_th') ? 'has-error' : '' }}">
                                        <label class="control-label">Tên (TH)</label>
                                        <input type="text"
                                               value="{{ isset($tourLocation) ? $tourLocation->name_th : '' }}"
                                               name="name_th"
                                               class="form-control"
                                               placeholder="Name TH"><span
                                            class="help-block">{{ $errors->first('name_th', ':message') }}</span>
                                    </div>
                                    <div
                                        class="col-md-6 col-xs-12 form-group {{ $errors->has('slogan_th') ? 'has-error' : '' }}">
                                        <label class="control-label">Slogan (TH)</label>
                                        <input type="text" name="slogan_th" class="form-control"
                                               placeholder="Name EN"
                                               value="{{ isset($tourLocation) ? $tourLocation->slogan_th : '' }}">
                                        <span class="help-block">{{ $errors->first('slogan_th', ':message') }}</span>
                                    </div>
                                    <div class="clear"></div>

                                    <div
                                        class="col-xs-12 col-md-6 form-group {{ $errors->has('description_th') ? 'has-error' : '' }}">
                                        <label class="control-label">Mô tả (TH)</label>
                                        <textarea type="text" class="form-control" name="description_th"
                                                  placeholder="Description TH">
                                            {{ isset($tourLocation) ? $tourLocation->description_th : '' }}
                                        </textarea>
                                        <span
                                            class="help-block">{{ $errors->first('description_th', ':message') }}</span>
                                    </div>
                                    <div
                                        class="col-xs-12 col-md-6 form-group {{ $errors->has('best_time_th') ? 'has-error' : '' }}">
                                        <label class="control-label">Thời gian tuyệt nhất để đi (TH)</label>
                                        <textarea type="text" class="form-control" name="best_time_th"
                                                  placeholder="Best time TH">
                                        {{ isset($tourLocation) ? $tourLocation->best_time_th : '' }}
                                    </textarea>
                                        <span
                                            class="help-block">{{ $errors->first('description_th', ':message') }}</span>
                                    </div>
                                </div>

                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <div class="row">
                                    <div
                                        class="col-md-6 col-xs-12 form-group {{ $errors->has('time_zone') ? 'has-error' : '' }}">
                                        <label class="control-label {{ isset($tourLocation) ? '' : 'required' }}">Múi
                                            giờ (GTM)</label>
                                        <select required type="text" name="time_zone"
                                                class=" form-control select2">
                                            <option value="">Chọn</option>
                                            @foreach($gtm as $k => $s)
                                                <option
                                                    {{isset($tourLocation) && $tourLocation->time_zone==$k ?'selected':'' }} value="{{$k}}">{{'GTM ('.$s.')'}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="clear"></div>
                                    <div class="col-md-6 col-xs-12 form-group">
                                        <label class="control-label required">Nổi bật</label>
                                        <select required type="text" name="highlights" class="form-control select2"
                                                data-placeholder="Please select">
                                            <option
                                                {{isset($tourLocation) && $tourLocation->highlights==\App\Constants\StatusCode::NONE}} value="{{\App\Constants\StatusCode::NONE}}">
                                                None
                                            </option>
                                            <option
                                                {{isset($tourLocation) && $tourLocation->highlights==\App\Constants\StatusCode::HIGHLIGHT}} value="{{\App\Constants\StatusCode::HIGHLIGHT}}">
                                                YES
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-xs-12 form-group">
                                        <label class="control-label required">Thành phố</label>
                                        <select required type="text" id="country" name="city_id"
                                                class=" form-control select2">
                                            @if(isset($tourLocation) && $tourLocation->city_id)
                                                @foreach($city as $k => $s)
                                                    <option
                                                        {{$tourLocation->city_id == $k ?'selected':''}} value="{{$k}}">{{$s}}</option>
                                                @endforeach
                                            @else
                                                <option value="">Chọn</option>
                                                @foreach($country as $k => $s)
                                                    <option value="{{$k}}">{{$s}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-md-6 col-xs-12 form-group">
                                        <label class="control-label">Ảnh</label>
                                        <input type="file" name="image_file" class="form-control">
                                        @if (isset($tourLocation) && $tourLocation->image)
                                            <img class="img-thumbnail" height="80" width="70" id="image_file"
                                                 src="{{url('uploads/location/'.$tourLocation->image)}}">
                                        @endif
                                    </div>
                                    <div class="clear"></div>

                                    <div class="form-group col-sm-12">
                                        <label class="control-label required">Địa chỉ</label>
                                        <input id="pac-input" class="controls" type="text" style="width: 50%;height: 8%"
                                               placeholder="Nhập địa điểm" name="search_name"
                                               value="{{isset($tourLocation) ? $tourLocation->address :''}}">
                                        <span class="error"
                                              style="color: red;font-size: 10px">Vui lòng nhập địa điểm</span>
                                        <input type="hidden" name="lat_rcm" value="{{isset($lat)?$lat :''}}">
                                        <input type="hidden" name="lng_rcm" value="{{isset($long)?$long :''}}">
                                        <div id="map" style="width:100%;height:400px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clear"></div>
                        <!-- /.box-body -->
                        <div class="col-md-12 col-xs-12 form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Xác nhận
                            </button>
                            <a href="{{ url('admin/tour-location') }}" type="button" class="btn btn-danger"><i
                                    class="fa fa-times"></i> Về danh sách</a>
                        </div>
                        <div class="clear"></div>

                        <!-- /.box-footer -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/backend/assets/js/jquery.min.js"></script>

    <script>

        $('document').ready(function () {
            $('.error').css('display', 'block');
            $('#pac-input').change(function () {
                var val = $('#pac-input').val();
                if (val && val != 'null')
                    $('.error').css('display', 'none');
                else
                    $('.error').css('display', 'block');;
            })

            CKEDITOR.replace('description_en');
            CKEDITOR.replace('description_vi');
            CKEDITOR.replace('description_th');
            CKEDITOR.replace('best_time_en');
            CKEDITOR.replace('best_time_vi');
            CKEDITOR.replace('best_time_th');
            var ic = 1;
            $('#country').on('change', function () {
                var id = $('#country').val();
                if (id && id != 'null') {
                    @if (isset($tourLocation))
                        ic = 2
                    @endif
                        ic++;
                    if (ic <= 2) {

                        $.ajax({
                            url: '/admin/ajax/get-taxonomy',
                            type: 'GET',
                            data: {
                                id: id,
                            },
                            success: function (res) {
                                data = res.data;
                                $('#country').html('<option value="">Chọn</option>');
                                data.forEach(item => {
                                    $('#country').append('<option value="' + item.id + '" >' + item.name + '</option>')
                                });
                            },
                            error: function () {
                                alert("Lỗi, xin kiểm tra lại");
                            }
                        })
                    }
                }

            })

            $("#country").on("select2:unselecting", function (e) {
                if (ic >= 2) {
                    $("#country").html(`
                   <option value="">Chọn</option>
                                            @foreach($country as $k => $s)
                        <option
                            value="{{$k}}">{{$s}}</option>
                                            @endforeach
                        `)
                    ic = 0;
                }
            });

        })
    </script>

@endsection
@section('scripts')
    <script src="/backend/assets/js/bootstrapValidate.js"></script>
@endsection
