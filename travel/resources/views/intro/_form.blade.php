@extends('layouts.app')
@section('title',$title)
@section('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{ isset($intro) ? url('admin/intro/' . $intro->id) : url('admin/intro') }}"
                      enctype="multipart/form-data">
                    @if(isset($intro))
                        {{ method_field('put') }}
                    @endif
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                            <label class="control-label {{ isset($intro) ? '' : 'required' }}">Country ID</label>
                            <select type="text" name="country_id" class="form-control select2"
                                    data-placeholder="Select Nationality">
                                <option value=""></option>
                                @foreach($lang as $s=>$k)
                                    <option value="{{$s}}" {{ isset($intro) && $intro->country_id == $s ? 'selected' : '' }}>{{$k}}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{ $errors->first('country_id', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('order') ? 'has-error' : '' }}">
                            <label class="control-label" {{ isset($intro) ? '' : 'required' }}>Order</label>
                            <input type="number" name="order" class="form-control"
                                   placeholder="Nhập số thứ tự hiển thị!"
                                   value="{{isset($intro)?$intro->order:old('order')}}">
                            <span class="help-block">{{ $errors->first('order', ':message') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('images') ? 'has-error' : '' }}">
                            <label class="control-label required">Ảnh</label>
                            <input type="file" name="images" class="form-control" id="profile-img"
                                   onchange="readURL(this);">
                            <img src="{{isset($intro->images)? url('uploads/intro/thumb_'.$intro->images): url('backend/assets/images/user.png')}}"
                                 id="profile-img-tag" width="100px" height="100px"/>
                            <span class="help-block">{{ $errors->first('images', ':message') }}</span>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <!-- /.box-body -->
                    <div class="col-md-12 col-xs-12 form-group">
                        <button type="submit" class="btn btn-info"><i class=""></i>Xác nhận</button>
                        <a href="{{ url('admin/intro') }}" type="button" class="btn btn-danger"><i
                                    class=""></i> Về danh sách</a>
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
                order: {
                    required: true,
                    min: 0,
                    max: 30,
                },
                country_id: "required",
            },
            messages: {
                order: {
                    required: "Không được để trống!",
                    min: "Tối thiểu nhập 0!",
                    max: "Tối đa là 30!",
                },
                country_id: "Chọn ngôn ngữ!",
            },
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profile-img").change(function () {
        readURL(this);
    });

</script>



