@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{ isset($user) ? url('admin/users/' . $user->id) : url('admin/users') }}"
                      enctype="multipart/form-data">
                    @if(isset($user))
                        {{ method_field('put') }}
                    @endif
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                            <label class="control-label required">Tên người dùng</label>
                            <input required type="text" name="username" class="form-control"
                                   placeholder="Tên người dùng"
                                   value="{{ isset($user) ? $user->username : '' }}">
                            <span class="help-block">{{ $errors->first('username', ':message') }}</span>
                        </div>
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="control-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   placeholder="Email"
                                   value="{{ isset($user) ? $user->email : '' }}">
                            <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                        </div>
                        <div class="clear"></div>

                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="control-label {{ isset($user) ? '' : 'required' }}">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="Mật khẩu">
                            <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                        </div>
                        <div
                                class="col-md-6 col-xs-12 form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <label class="control-label {{ isset($user) ? '' : 'required' }}">Xác nhận mật khẩu</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="Xác nhận mật khẩu">
                            <span class="help-block">{{ $errors->first('password_confirmation', ':message') }}</span>

                        </div>
                        <div class="clear"></div>

                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label class="control-label {{ isset($user) ? '' : 'required' }}">SĐT</label>
                            <input required type="number" name="phone" id="phone" class="form-control"
                                   placeholder="SĐT"
                                   value="{{ isset($user) ? $user->phone : '' }}">
                            <span class="help-block">{{ $errors->first('Phone', ':message') }}</span>
                            <span class="error" style="color: red"> Trùng số điện thoại ! </span>
                        </div>

                        @if(isset($name_parent))
                            <div class="col-md-6 col-xs-12 form-group">
                                <label class="control-label {{ isset($user) ? '' : 'required' }}">Người giới
                                    thiệu</label>
                                <input readonly type="text" class="form-control"
                                       value="{{ isset($user) ? $name_parent->username : '' }}">
                            </div>
                        @endif

                        <div class="col-md-6 col-xs-12 form-group">
                            <label class="control-label">Ảnh</label>
                            <input type="file" name="image_file" class="form-control">
                            @if (isset($user) && $user->image)
                                <img class="img-thumbnail" height="80" width="70" id="image_file"
                                     src="{{url('uploads/user/'.$user->image)}}">
                            @endif
                        </div>
                        @if(isset($name_parent))
                            <div class="col-md-6 col-xs-12 form-group">
                            </div>
                        @endif
                        <div class="clear"></div>

                        <div class="clear"></div>
                        <!-- /.box-body -->
                        <br>
                        <div class="box-footer">
                            <button type="submit" id="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i>
                                Xác nhận
                            </button>
                            <a href="{{ url('admin/users') }}" type="button" class="btn btn-danger"><i
                                        class="fa fa-times"></i> Về danh sách</a>
                        </div>
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
        $('.error').css('display', 'none');
        $('#phone').change(function () {
            var phone = $('#phone').val();
            var url = "/admin/ajax/check-phone";
            $.ajax({
                type: "GET",
                url: url,
                async: false,
                data: {
                    'phone': phone
                },
                success: function (data) {
                    if (data == 1) {
                        $('.error').css('display', 'block');
                        $('#submit[type="submit"]').attr('disabled', 'disabled');
                    } else {
                        $('#submit[type="submit"]').removeAttr('disabled');
                        $('.error').css('display', 'none');
                    }

                }
            });
        })
        $("form").validate({
            rules: {
                username: "required",
                phone: "required",
                @if(!isset($user))
                password: "required",
                @endif
                password_confirmation: {
                    @if(!isset($user))
                    required: true,
                    @endif
                    equalTo: "#password"
                },
            },
            messages: {
                username: "Vui lòng điền tên người dùng",
                phone: "Vui lòng điền SĐT",
                password: "Vui lòng điền mật khẩu",
                password_confirmation: {
                    required: "Vui lòng điền mật khẩu xác nhận",
                    equalTo: "Xác nhận mật khẩu không khớp",
                },
            },
        });
    })
</script>
