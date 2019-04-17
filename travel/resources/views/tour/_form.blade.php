@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form autocomplete="off" class="form-horizontal" method="POST"
                      action="{{ isset($tour) ? url('admin/tour/' . $tour->id) : url('admin/tour') }}"
                      enctype="multipart/form-data">
                    @if(isset($tour))
                        {{ method_field('put') }}
                    @endif
                    {{ csrf_field() }}
                    @php
                        if (isset($tour)){
                            $category_array = json_decode(@$tour->category_id, true);
                            $packed_array   = json_decode(@$tour->package_day);
                        }
                    @endphp
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
                            <div id="home" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12 form-group {{ $errors->has('name_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Tên (EN)</label>
                                        <input type="text" name="name_en" class="form-control"
                                               placeholder="Điền tên English"
                                               value="{{ isset($tour) ? $tour->tour_name_en : '' }}">
                                        <span class="help-block">{{ $errors->first('name_en', ':message') }}</span>
                                    </div>
                                    <div class="col-md-6 col-xs-12 form-group"></div>
                                    <div class="clear"></div>

                                    <div class="col-xs-12 col-md-6 form-group {{ $errors->has('tour_description_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Mô tả (EN)</label>
                                        <textarea type="text" class="form-control" name="tour_description_en"
                                                  placeholder="Mô tả">
                            {{ @$tour->tour_description_en }}</textarea>
                                        <span class="help-block">{{ $errors->first('tour_description_en', ':message') }}</span>
                                    </div>

                                    <div class="col-xs-12 col-md-6 form-group {{ $errors->has('experience_content_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Trải nghiệm (EN)</label>
                                        <textarea type="text" class="form-control" name="experience_content_en"
                                                  placeholder="Nội dung trải nhiệm">
                            {{ isset($tour) ? $tour->experience_content_en : '' }}</textarea>
                                        <span class="help-block">{{ $errors->first('experience_content_en', ':message') }}</span>
                                    </div>
                                    <div class="clear"></div>

                                    <div class="col-xs-12 col-md-6 form-group {{ $errors->has('tour_services_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Dịch vụ (EN)</label>
                                        <textarea type="text" class="form-control" name="tour_services_en"
                                                  placeholder="Dịch vụ">
                            {{ isset($tour) ? $tour->tour_services_en : '' }}</textarea>
                                        <span class="help-block">{{ $errors->first('tour_services_en', ':message') }}</span>
                                    </div>

                                    <div class="col-xs-12 col-md-6 form-group {{ $errors->has('additional_info_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Thông tin bổ sung (EN)</label>
                                        <textarea type="text" class="form-control" name="additional_info_en"
                                                  placeholder="Bổ sung">
                            {{ isset($tour) ? $tour->additional_info_en : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('additional_info_en', ':message') }}</span>
                                    </div>
                                    <div class="col-xs-12 col-md-6 form-group {{ $errors->has('additional_info_2_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Bí kíp (EN)</label>
                                        <textarea type="text" class="form-control" name="additional_info_2_en"
                                                  placeholder="Bổ sung">
                            {{ isset($tour) ? $tour->additional_info_2_en : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('additional_info_2_en', ':message') }}</span>
                                    </div>
                                    <div class="clear"></div>

                                    <div class="col-xs-12 col-md-6 form-group {{ $errors->has('tour_guide_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Hướng dẫn sử dụng (EN)</label>
                                        <textarea type="text" class="form-control" name="tour_guide_en"
                                                  placeholder="Hướng dẫn sử dụng">
                            {{ isset($tour) ? $tour->tour_guide_en : '' }}</textarea>
                                        <span class="help-block">{{ $errors->first('tour_guide_en', ':message') }}</span>
                                    </div>
                                    <div class="clear"></div>


                                </div>

                            </div>
                            <div id="menu1" class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12 form-group {{ $errors->has('name_vi') ? 'has-error' : '' }}">
                                        <label class="control-label required">Tên (VI)</label>
                                        <input required type="text" name="name_vi" class="form-control"
                                               placeholder="Điền tên Vietnam"
                                               value="{{ isset($tour) ? $tour->tour_name_vi : '' }}">
                                        <span class="help-block">{{ $errors->first('name_vi', ':message') }}</span>
                                    </div>
                                    <div class="col-md-6 col-xs-12 form-group"></div>
                                    <div class="clear"></div>

                                    <div
                                            class="col-xs-12 col-md-6 form-group {{ $errors->has('tour_description_vi') ? 'has-error' : '' }}">
                                        <label class="control-label">Mô tả (VI)</label>
                                        <textarea type="text" class="form-control" name="tour_description_vi"
                                                  placeholder="Mô tả">
                            {{ isset($tour) ? $tour->tour_description_vi : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('tour_description_vi', ':message') }}</span>
                                    </div>

                                    <div
                                            class="col-xs-12 col-md-6 form-group {{ $errors->has('experience_content_vi') ? 'has-error' : '' }}">
                                        <label class="control-label">Trải nghiệm (VI)</label>
                                        <textarea type="text" class="form-control" name="experience_content_vi"
                                                  placeholder="Trải nhiệm">
                            {{ isset($tour) ? $tour->experience_content_vi : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('experience_content_vi', ':message') }}</span>
                                    </div>
                                    <div class="clear"></div>

                                    <div
                                            class="col-xs-12 col-md-6 form-group {{ $errors->has('tour_services_vi') ? 'has-error' : '' }}">
                                        <label class="control-label">Dịch vụ (VI)</label>
                                        <textarea type="text" class="form-control" name="tour_services_vi"
                                                  placeholder="Dịch vụ">
                            {{ isset($tour) ? $tour->tour_services_vi : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('tour_services_vi', ':message') }}</span>
                                    </div>

                                    <div
                                            class="col-xs-12 col-md-6 form-group {{ $errors->has('additional_info_vi') ? 'has-error' : '' }}">
                                        <label class="control-label">Thông tin bổ sung (VI)</label>
                                        <textarea type="text" class="form-control" name="additional_info_vi"
                                                  placeholder="Tin bổ sung">
                            {{ isset($tour) ? $tour->additional_info_vi : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('additional_info_vi', ':message') }}</span>
                                    </div>

                                    <div
                                            class="col-xs-12 col-md-6 form-group {{ $errors->has('additional_info_2_vi') ? 'has-error' : '' }}">
                                        <label class="control-label">Bí kíp (VI)</label>
                                        <textarea type="text" class="form-control" name="additional_info_2_vi"
                                                  placeholder="Tin bổ sung">
                            {{ isset($tour) ? $tour->additional_info_2_vi : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('additional_info_2_vi', ':message') }}</span>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-xs-12 col-md-6 form-group {{ $errors->has('tour_guide_vi') ? 'has-error' : '' }}">
                                        <label class="control-label">Hướng dẫn sử dụng (VI)</label>
                                        <textarea type="text" class="form-control" name="tour_guide_vi"
                                                  placeholder="Hướng dẫn sử dụng">
                            {{ isset($tour) ? $tour->tour_guide_vi : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('tour_guide_vi', ':message') }}</span>
                                    </div>

                                    <div class="clear"></div>
                                    <div class="col-xs-12 col-md-6 form-group {{ $errors->has('cancel_policy_vi') ? 'has-error' : '' }}">
                                        <label class="control-label">Chính sách (VI)</label>
                                        <select required type="text" class="form-control select2" name="cancel_policy">
                                            @if(@$policys)
                                                <option>Chọn</option>
                                                @foreach($policys as $s)
                                                    <option
                                                            value="{{$s->id}}" {{isset($tour) && $tour->cancel_policy ?'selected':'' }} >{{$s->name}}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="help-block">{{ $errors->first('cancel_policy_vi', ':message') }}</span>
                                    </div>
                                    <div class="col-xs-12 col-md-6 form-group {{ $errors->has('cancel_policy_vi') ? 'has-error' : '' }}">
                                        <label class="control-label">FAQs (VI)</label>
                                        <select required type="text" class="form-control select2 "
                                                name="faq[]"
                                                multiple="multiple">
                                            @if(@$faqs)
                                                @foreach($faqs as $s)
                                                    <option
                                                            value="{{$s->id}}" {{isset($tour) && $tour->faq?'selected':'' }} >{{$s->question_vi}}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="help-block">{{ $errors->first('cancel_policy_vi', ':message') }}</span>
                                    </div>

                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="row">
                                    <div
                                            class="col-md-6 col-xs-12 form-group {{ $errors->has('name_th') ? 'has-error' : '' }}">
                                        <label class="control-label">Tên (TH)</label>
                                        <input type="text" name="name_th" class="form-control"
                                               placeholder="Điền tên ThaiLand"
                                               value="{{ isset($tour) ? $tour->name_th : '' }}">
                                        <span class="help-block">{{ $errors->first('name_th', ':message') }}</span>
                                    </div>
                                    <div class="col-md-6 col-xs-12 form-group"></div>

                                    <div class="clear"></div>

                                    <div
                                            class="col-xs-12 col-md-6 form-group {{ $errors->has('tour_description_th') ? 'has-error' : '' }}">
                                        <label class="control-label">Mô tả (TH)</label>
                                        <textarea type="text" class="form-control" name="tour_description_th"
                                                  placeholder="Mô tả">
                                            {{ isset($tour) ? $tour->tour_description_th : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('tour_description_th', ':message') }}</span>
                                    </div>

                                    <div
                                            class="col-xs-12 col-md-6 form-group {{ $errors->has('experience_content_th') ? 'has-error' : '' }}">
                                        <label class="control-label">Trải nghiệm (TH)</label>
                                        <textarea type="text" class="form-control"
                                                  name="experience_content_th">{{ isset($tour) ? $tour->experience_content_th : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('experience_content_th', ':message') }}</span>
                                    </div>
                                    <div class="clear"></div>

                                    <div
                                            class="col-xs-12 col-md-6 form-group {{ $errors->has('tour_services_th') ? 'has-error' : '' }}">
                                        <label class="control-label">Dịch vụ (TH)</label>
                                        <textarea type="text" class="form-control"
                                                  name="tour_services_th">{{ isset($tour) ? $tour->tour_services_th : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('tour_services_th', ':message') }}</span>
                                    </div>

                                    <div
                                            class="col-xs-12 col-md-6 form-group {{ $errors->has('additional_info_th') ? 'has-error' : '' }}">
                                        <label class="control-label">Thông tin bổ sung (TH)</label>
                                        <textarea type="text" class="form-control"
                                                  name="additional_info_th">{{ isset($tour) ? $tour->additional_info_th : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('additional_info_th', ':message') }}</span>
                                    </div>
                                    <div
                                            class="col-xs-12 col-md-6 form-group {{ $errors->has('additional_info_2_th') ? 'has-error' : '' }}">
                                        <label class="control-label">Bí kíp (TH)</label>
                                        <textarea type="text" class="form-control"
                                                  name="additional_info_2_th">{{ isset($tour) ? $tour->additional_info_2_th : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('additional_info_2_th', ':message') }}</span>
                                    </div>
                                    <div class="clear"></div>

                                    <div class="col-xs-12 col-md-6 form-group {{ $errors->has('tour_guide_th') ? 'has-error' : '' }}">
                                        <label class="control-label">Hướng dẫn sử dụng (TH)</label>
                                        <textarea type="text" class="form-control"
                                                  name="tour_guide_th">{{ isset($tour) ? $tour->tour_guide_th : '' }}</textarea>
                                        <span
                                                class="help-block">{{ $errors->first('tour_guide_th', ':message') }}</span>
                                    </div>


                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <div class="row body3">
                                    <div class="col-md-6 col-xs-12 form-group {{ $errors->has('cancel_time') ? 'has-error' : '' }}">
                                        <label class="control-label">Thời gian hủy (số ngày)</label>
                                        <input type="number" name="cancel_time" class="form-control"
                                               placeholder="Điền số ngày hủy"
                                               value="{{ isset($tour) ? $tour->cancel_time : '' }}">
                                        <span class="help-block">{{ $errors->first('cancel_time', ':message') }}</span>
                                    </div>
                                    <div class="col-md-6 col-xs-12 form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                                        <label class="control-label">Thời gian hủy (số ngày)</label>
                                        <input type="number" name="quantity" id="quantity_total" readonly
                                               class="form-control"
                                               placeholder="Điền số ngày hủy"
                                               value="{{ isset($tour) ? $tour->quantity : '' }}">
                                        <span class="help-block">{{ $errors->first('quantity', ':message') }}</span>
                                    </div>
                                    <div class="col-md-6 col-xs-12 form-group {{ $errors->has('name_en') ? 'has-error' : '' }}">
                                        <label class="control-label">Video ID</label>
                                        <input type="text" name="video_id" class="form-control"
                                               placeholder="Youtube ID"
                                               value="{{ isset($tour) ? $tour->video_id : '' }}">
                                        <span class="help-block">{{ $errors->first('video_id', ':message') }}</span>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-md-6 col-xs-12 form-group">
                                        <label class="control-label required">Địa điểm</label>
                                        <select required type="text" name="tour_location_id"
                                                class=" form-control select2">
                                            <option value=""></option>
                                            @if(@$location)
                                                @foreach($location as $s)
                                                    <option
                                                            value="{{$s->id}}" {{ isset($tour) && $tour->tour_location_id == $s->id ? 'selected' : '' }}>{{$s->name_vi}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-md-6 col-xs-12 form-group scroll">
                                        <label class="control-label required">Danh mục tour</label>
                                        <select required type="text" name="category_id[]"
                                                class=" form-control select2" multiple>
                                            <option value=""></option>
                                            @if(@$category)
                                                @foreach($category as $s)
                                                    <option
                                                            value="{{$s->id}}" {{ isset($tour) && isset($category_array) && in_array($s->id,$category_array) ? 'selected' : '' }}>{{$s->name_vi}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-md-6 col-xs-12 form-group">
                                        <label class="control-label required">Gói mặc định</label>
                                        <select required type="text" class=" form-control select2"
                                                name="default_package">
                                            @if(@$package)
                                                @foreach($package as $s)
                                                    <option
                                                            value="{{$s->id}}" {{isset($tour)?($tour->default_package==$s->id?'selected':''):'' }} >{{$s->name_vi}}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-xs-12 form-group">
                                        <label class="control-label">Ảnh</label>
                                        <input type="file" name="image_file" class="form-control">
                                        @if (isset($tour) && $tour->image)
                                            <img class="img-thumbnail" height="80" width="70" id="image_file"
                                                 src="{{url('uploads/location/'.$tour->image)}}">
                                        @endif
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-md-6 col-xs-12 form-group">
                                        <label class="control-label required">Xác nhận</label>
                                        <select type="text"
                                                class=" form-control select2" name="accept">
                                            @if(count($accepts))
                                                @foreach($accepts as $s)
                                                    <option
                                                            value="{{$s['id']}}" {{isset($tour)?($tour->accept==$s->id?'selected':''):'' }} >{{$s['name']}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-xs-12 form-group">
                                        <label class="control-label required">Hot Tour</label>
                                        <select required type="text" name="highlights" class="form-control select2"
                                                data-placeholder="Please select">
                                            <option
                                                    {{isset($tour) && $tour->hot==\App\Constants\StatusCode::NONE}} value="{{\App\Constants\StatusCode::NONE}}">
                                                None
                                            </option>
                                            <option
                                                    {{isset($tour) && $tour->hot==\App\Constants\StatusCode::HIGHLIGHT}} value="{{\App\Constants\StatusCode::HIGHLIGHT}}">
                                                YES
                                            </option>
                                        </select>
                                    </div>

                                    <div class="clear"></div>

                                    <div class="form-group col-sm-12">
                                        <label class="control-label required">Địa điểm tập trung</label>
                                        <input id="pac-input" class="controls" type="text" style="width: 50%;height: 8%"
                                               placeholder="Nhập địa điểm" name="search_name"
                                               value="{{isset($tour) ? $tour->address :''}}">
                                        <span class="error"
                                              style="color: red;font-size: 10px">Vui lòng nhập địa điểm</span>

                                        <input type="hidden" name="lat_rcm" value="{{isset($lat)?$lat :''}}">
                                        <input type="hidden" name="lng_rcm" value="{{isset($long)?$long :''}}">
                                        <div id="map" style="width:100%;height:400px;"></div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-md-12" id="add_element">
                                        @if(isset($packed_array))
                                            @foreach($packed_array as $p => $pk)
                                                <div class="col-md-12 col-xs-12 form-group list-package {{'list-'.str_replace('/','-',$p)}}">
                                                    <div class="row">
                                                        <label class="control-label">Ngày</label>
                                                        <div class="col-md-3 col-xs-12">
                                                            <input type="text" class="form-control date date_al "
                                                                   placeholder="dd/mm/yyyy" value="{{$p}}">
                                                        </div>
                                                        <label class="control-label">Gói</label>
                                                        <div class="col-md-4 col-xs-12 scroll">
                                                            <select type="text"
                                                                    class=" form-control select2 package_al">
                                                                @if(@$package)
                                                                    @foreach($package as $s)
                                                                        <option
                                                                                value="{{$s->id}}" {{isset($s) && in_array($s->id,explode(',',$pk->packed))?'selected':'' }} >{{$s->name_vi}}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <label class="control-label">Số lượng</label>
                                                        <div class="col-md-3 col-xs-12">
                                                            <input required type="number"
                                                                   class="form-control quantity_al quantity"
                                                                   placeholder="Điền số lượng"
                                                                   value="{{$pk->quantity}}">
                                                        </div>

                                                        <input type="hidden" name="date_time[{{$p}}][packed]"
                                                               value="{{$pk->packed}}"
                                                               class="date_time">
                                                        <input type="hidden" name="date_time[{{$p}}][quantity]"
                                                               value="{{$pk->quantity}}"
                                                               class="date_time">
                                                        <a onclick="remove_for('{{'list-'.str_replace('/','-',$p)}}')">
                                                            <i
                                                                    class="fa fa-times"></i> </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="clear"></div>

                                </div>

                                <button type="button" id="add_date" class="btn btn-success" style="margin-bottom: 10px">
                                    Thêm ngày
                                </button>

                            </div>
                        </div>

                        <div class="clear"></div>
                        <!-- /.box-body -->
                        <div class="col-md-12 col-xs-12 form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Xác nhận
                            </button>
                            <a href="{{ url('admin/tour') }}" type="button" class="btn btn-danger"><i
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
    <script async>
        function remove(id) {
            $(".list-package_" + id).remove();
        }

        function remove_for(class1) {
            $("." + class1).remove();
        }

        $('document').ready(function () {
            $('#pac-input').change(function () {
                var val = $('#pac-input').val();
                if (val && val != 'null')
                    $('.error').css('display', 'none');
                else
                    $('.error').css('display', 'block');
            });
            CKEDITOR.replace('tour_description_en');
            CKEDITOR.replace('experience_content_en');
            CKEDITOR.replace('tour_services_en');
            CKEDITOR.replace('additional_info_en');
            CKEDITOR.replace('additional_info_2_en');
            CKEDITOR.replace('additional_info_2_vi');
            CKEDITOR.replace('additional_info_2_th');
            CKEDITOR.replace('tour_guide_en');

            CKEDITOR.replace('tour_description_vi');
            CKEDITOR.replace('experience_content_vi');
            CKEDITOR.replace('tour_services_vi');
            CKEDITOR.replace('additional_info_vi');
            CKEDITOR.replace('tour_guide_vi');

            CKEDITOR.replace('tour_description_th');
            CKEDITOR.replace('experience_content_th');
            CKEDITOR.replace('tour_services_th');
            CKEDITOR.replace('additional_info_th');
            CKEDITOR.replace('tour_guide_th');


            jQuery('.date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: "dd-mm-yyyy",
            }).on('change', function () {
                // $('.list-package').css('display', 'block');
            });
            var count = 1;
            var total = 0;
            $('#add_element').on('change', '.quantity', function () {

                if (total != 0)
                    total = 0;
                $('.quantity').each(function () {
                    total += Number($(this).val());
                });
                $('#quantity_total').val(total);
            });
            $('#add_date').click(function () {
                count++;
                var html = `<div class="col-md-12 col-xs-12 form-group list-package_` + count + `  list-package-all">
                                        <div class="row">
                                        <label class="control-label">Ngày</label>
                                        <div class="col-md-3"><input type="text" name="date" class="form-control date"
                                               placeholder="dd/mm/yyyy" ></div>
                                               <br>
                                        <label class="control-label">Gói</label>
                                        <div class="col-md-4" scroll>
                                        <select required type="text" class="package form-control select2">
                                            @if(@$package)
                        @foreach($package as $s)
                    <option
                        value="{{$s->id}}">{{$s->name_vi}}</option>
                                                @endforeach
                        @endif
                    </select></div>
                    <label class="control-label">Số lượng</label>
                    <div class="col-md-3">
                    <input required type="number" class="form-control quantity" placeholder="Enter quantity" > </div>
            <a onclick="remove(` + count + `)" > <i class="fa fa-times" ></i> </a>
                                  </div>
                              </div>`;
                $('#add_element').append(html);
                jQuery('.date').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: "dd-mm-yyyy",
                }).on('change', function () {
                    // $('.list-package').css('display', 'block');
                });
                $('.select2').select2({
                    width: '100%',
                    theme: 'bootstrap',
                    allowClear: true,
                    placeholder: function () {
                        $(this).data('placeholder');
                    }
                });

                $('.select2-hidden-accessible').on('change', function () {
                    $(this).valid();
                });
                $('.date,.package,.quantity').on('change', function () {
                    var parent = $(this).closest('.list-package-all');
                    var date = parent.find('.date').val();
                    var quantity = parent.find('.quantity').val();
                    var package = parent.find('.package').val();
                    var parent = $(this).closest('.form-group');
                    var input = '<input type="hidden" name="date_time[' + date + '][quantity]" value="' + quantity + '" class="date_time">' +
                        '<input type="hidden" name="date_time[' + date + '][packed]" value="' + package + '" class="date_time">';
                    parent.find('input.date_time').remove();
                    parent.append(input);

                })

            });
            $('.package_al,.date_al,.quantity_al').on('change', function () {
                var parent = $(this).closest('.list-package');
                var date = parent.find('.date_al').val();
                var package = parent.find('.package_al').val();
                var quantity = parent.find('.quantity_al').val();
                var input = '<input type="hidden" name="date_time[' + date + '][quantity]" value="' + quantity + '" class="date_time">' +
                    '<input type="hidden" name="date_time[' + date + '][packed]" value="' + package + '" class="date_time">';
                parent.find('input.date_time').remove();
                parent.append(input);
            })
        })
    </script>

@endsection

