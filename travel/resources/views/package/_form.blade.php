@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{ isset($package) ? url('admin/package/' . $package->id) : url('admin/package') }}"
                      enctype="multipart/form-data">
                    @if(isset($package))
                        {{ method_field('put') }}
                    @endif
                    {{ csrf_field() }}
                    @php
                        $time_array   = json_decode(@$package->time_start);
                    @endphp
                    <div class="row">
                        <ul class="nav nav-tabs col-md-12" style="margin-bottom: 10px">
                            <li class="nav-item "><a class="active nav-link" data-toggle="tab"
                                                     href="#home">VietNamese</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu1">English</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu3">ThaiLand</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu2">Time</a>
                            </li>
                        </ul>
                        <div class="tab-content col-md-12">
                            <div id="home" class="tab-pane fade show active">
                                <div class="row">
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('name_vi') ? 'has-error' : '' }}">
                                        <label class="control-label required">Tên (VI)</label>
                                        <input required type="text" name="name_vi" id="name_vi" class="form-control"
                                               placeholder=""
                                               value="{{ isset($package) ? $package->name_vi : old('name_vi') }}">
                                        <span class="help-block">{{ $errors->first('name_vi', ':message') }}</span>
                                    </div>
                                    <div class="col-xs-12 col-md-6"></div>

                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_adult') ? 'has-error' : '' }}">
                                        <label class="control-label required">Giá người lớn (VI)</label>
                                        <input required type="text"
                                               value="{{ isset($package) ? $package->price_adult : '' }}"
                                               name="price_adult"
                                               class="form-control number">
                                        <span class="help-block">{{ $errors->first('price_adult', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_adult_promotion') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá người lớn khuyến mại (VI) </label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_adult_promotion : '' }}"
                                               name="price_adult_promotion"
                                               class="form-control number">
                                        <span
                                                class="help-block">{{ $errors->first('price_adult_promotion', ':message') }}</span>
                                    </div>

                                    <div class="clear"></div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_child') ? 'has-error' : '' }}">
                                        <label class="control-label required">Giá trẻ em (VI)</label>
                                        <input required type="text"
                                               value="{{ isset($package) ? $package->price_child : '' }}"
                                               name="price_child"
                                               class="form-control number">
                                        <span class="help-block">{{ $errors->first('price_child', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_child_promotion') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá trẻ em khuyến mại (VI)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_child_promotion : '' }}"
                                               name="price_child_promotion"
                                               class="form-control number">
                                        <span
                                                class="help-block">{{ $errors->first('price_child_promotion', ':message') }}</span>
                                    </div>

                                    <div class="clear"></div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_disabiliti') ? 'has-error' : '' }}">
                                        <label class="control-label required">Giá người khuyết tật (VI)</label>
                                        <input required type="text"
                                               value="{{ isset($package) ? $package->price_disabiliti : '' }}"
                                               name="price_disabiliti"
                                               class="form-control number">
                                        <span
                                                class="help-block">{{ $errors->first('price_disabiliti', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_disabiliti_promotion') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá người khuyết tật khuyến mại (VI)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_disabiliti_promotion : '' }}"
                                               name="price_disabiliti_promotion"
                                               class="form-control number">
                                        <span
                                                class="help-block">{{ $errors->first('price_disabiliti_promotion', ':message') }}</span>
                                    </div>
                                    <div class="clear"></div>
                                    <div
                                            class="col-xs-12 col-md-12 form-group {{ $errors->has('description_vi') ? 'has-error' : '' }}">
                                        <label class="control-label">Mô tả (VI)</label>
                                        <textarea type="text" class="form-control" name="description_vi">
                                                    {{ isset($package) ? $package->description_vi : '' }}
                                                </textarea>
                                        <span
                                                class="help-block">{{ $errors->first('description_vi', ':message') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="row">
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('name_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Tên (EN)</label>
                                        <input type="text" name="name_en" class="form-control"
                                               placeholder="Name EN"
                                               value="{{ isset($package) ? $package->name_en : '' }}">
                                        <span class="help-block">{{ $errors->first('name_en', ':message') }}</span>
                                    </div>
                                    <div class="col-xs-12 col-md-6"></div>
                                    <div class="clear"></div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_adult_en') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá người lớn (EN)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_adult_en : '' }}"
                                               name="price_adult_en"
                                               class="form-control number">
                                        <span class="help-block">{{ $errors->first('price_adult_en', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_adult_promotion_en') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá người lớn khuyến mại (EN) </label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_adult_promotion_en : '' }}"
                                               name="price_adult_promotion_en"
                                               class="form-control number">
                                        <span
                                                class="help-block">{{ $errors->first('price_adult_promotion_en', ':message') }}</span>
                                    </div>

                                    <div class="clear"></div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_child_en') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá trẻ em (EN)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_child_en : '' }}"
                                               name="price_child_en"
                                               class="form-control number">
                                        <span class="help-block">{{ $errors->first('price_child_en', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_child_promotion_en') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá trẻ em khuyến mại (EN)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_child_promotion_en : '' }}"
                                               name="price_child_promotion_en"
                                               class="form-control number">
                                        <span
                                                class="help-block">{{ $errors->first('price_child_promotion_en', ':message') }}</span>
                                    </div>

                                    <div class="clear"></div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_disabiliti_en') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá người khuyết tật (EN)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_disabiliti_en : '' }}"
                                               name="price_disabiliti_en"
                                               class="form-control number">
                                        <span
                                                class="help-block">{{ $errors->first('price_disabiliti_en', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_disabiliti_promotion_en') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá người khuyết tật khuyến mại (EN)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_disabiliti_promotion_en : '' }}"
                                               name="price_disabiliti_promotion_en"
                                               class="form-control number">
                                        <span
                                                class="help-block">{{ $errors->first('price_disabiliti_promotion_en', ':message') }}</span>
                                    </div>
                                    <div class="clear"></div>
                                    <div
                                            class="col-xs-12 col-md-12 form-group {{ $errors->has('description_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Mô tả (EN)</label>
                                        <textarea type="text" class="form-control" name="description_en"
                                                  placeholder="Description">
                                            {{ isset($package) ? $package->description_en : '' }}
                                        </textarea>
                                        <span
                                                class="help-block">{{ $errors->first('description_en', ':message') }}</span>
                                    </div>

                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="row time-add">
                                    @if(@$time_array)
                                        @foreach($time_array as $key => $time)
                                            <div id="time_{{$key}}"
                                                 class="col-md-6 col-xs-12 form-group {{ $errors->has('time_start') ? 'has-error' : '' }}  ">
                                                <label class="control-label required">Thời gian khởi hành</label>
                                                <div class="row">
                                                    <input required type="text"
                                                           value="{{$time}}"
                                                           name="time_start[]"
                                                           class=" col-md-11 form-control single-input"
                                                           placeholder="HH:MM">
                                                    <span
                                                            class="help-block">{{ $errors->first('time_start', ':message') }}</span>

                                                    <a class="col-md-1" onclick="remove_for('{{'time_'.$key}}')"> <i
                                                                class="fa fa-times"></i> </a>
                                                </div>
                                            </div>


                                        @endforeach
                                    @endif
                                    <div class="clear"></div>
                                    <div class="col-md-12" style="margin-bottom: 10px">
                                        <button type="button" id="add" class="btn btn-success"><i
                                                    class="fa fa-plus"></i>
                                            Thêm thời gian
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <div class="row">
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('name_th') ? 'has-error' : '' }}">
                                        <label class="control-label ">Tên (TH)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->name_th : '' }}"
                                               name="name_th"
                                               class="form-control"
                                               placeholder="Name TH">
                                        <span class="help-block">{{ $errors->first('name_th', ':message') }}</span>
                                    </div>
                                    <div class="col-xs-12 col-md-6"></div>
                                    <div class="clear"></div>

                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_adult_th') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá người lớn (TH)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_adult_th : '' }}"
                                               name="price_adult_th"
                                               class="form-control number">
                                        <span class="help-block">{{ $errors->first('price_adult_th', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_adult_promotion_th') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá người lớn khuyến mại (TH) </label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_adult_promotion_th : '' }}"
                                               name="price_adult_promotion_th"
                                               class="form-control number">
                                        <span
                                                class="help-block">{{ $errors->first('price_adult_promotion_th', ':message') }}</span>
                                    </div>

                                    <div class="clear"></div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_child_th') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá trẻ em (TH)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_child_th : '' }}"
                                               name="price_child_th"
                                               class="form-control number">
                                        <span class="help-block">{{ $errors->first('price_child_th', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_child_promotion_th') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá trẻ em khuyến mại (TH)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_child_promotion_th : '' }}"
                                               name="price_child_promotion_th"
                                               class="form-control number">
                                        <span
                                                class="help-block">{{ $errors->first('price_child_promotion_th', ':message') }}</span>
                                    </div>

                                    <div class="clear"></div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_disabiliti_th') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá người khuyết tật (TH)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_disabiliti_th : '' }}"
                                               name="price_disabiliti_th"
                                               class="form-control number">
                                        <span
                                                class="help-block">{{ $errors->first('price_disabiliti_th', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('price_disabiliti_promotion_th') ? 'has-error' : '' }}">
                                        <label class="control-label ">Giá người khuyết tật khuyến mại (TH)</label>
                                        <input type="text"
                                               value="{{ isset($package) ? $package->price_disabiliti_promotion_th : '' }}"
                                               name="price_disabiliti_promotion_th"
                                               class="form-control number">
                                        <span
                                                class="help-block">{{ $errors->first('price_disabiliti_promotion_th', ':message') }}</span>
                                    </div>

                                    <div class="clear"></div>
                                    <div
                                            class="col-xs-12 col-md-12 form-group {{ $errors->has('description_th') ? 'has-error' : '' }}">
                                        <label class="control-label">Mô tả (TH)</label>
                                        <textarea type="text" class="form-control" name="description_th">
                                            {{ isset($package) ? $package->description_th : '' }}
                                        </textarea>
                                        <span
                                                class="help-block">{{ $errors->first('description_th', ':message') }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="clear"></div>

                        <!-- /.box-body -->
                        <div class="col-md-12 col-xs-12 form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Xác nhận
                            </button>
                            <a href="{{ url('admin/package') }}" type="button" class="btn btn-danger"><i
                                        class="fa fa-times"></i> Trở về danh sách</a>
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
    function remove(id) {
        $("." + id).remove();
    }

    function remove_for(class1) {
        $("#" + class1).remove();
    }

    $('document').ready(function () {

        $('.single-input').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
        CKEDITOR.replace('description_en');
        CKEDITOR.replace('description_vi');
        CKEDITOR.replace('description_th');

        // Add multiple time_start
        var count = 1;
        $('#add').on('click', function () {
            count++;
            var html = `<div
                          class="col-md-6 col-xs-12 form-group ` + count + ` {{ $errors->has('time_start') ? 'has-error' : '' }}">
                              <label class="control-label">Thời gian khởi hành</label>
                              <div class="row" > <input required type="text"
                                               value=""
                                               name="time_start"
                                               class="col-md-11 form-control single-input"
                                               placeholder="HH:MM">
                              <span class="help-block">{{ $errors->first('time_start', ':message') }}</span>
                              <a class="col-md-1" onclick="remove(` + count + `)" > <i class="fa fa-times" ></i> </a> </div>

                          </div>`;
            $('.time-add').append(html);
            $('.single-input').clockpicker({
                placement: 'bottom',
                align: 'left',
                autoclose: true,
                'default': 'now'
            });

        })

    })
</script>
@section('scripts')
    <script src="/backend/assets/js/bootstrapValidate.js"></script>
@endsection
