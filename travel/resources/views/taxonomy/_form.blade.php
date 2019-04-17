@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST"
                      action="{{ isset($taxonomy) ? url('admin/taxonomy/' . $taxonomy->id) : url('admin/taxonomy') }}"
                      enctype="multipart/form-data">
                    @if(isset($taxonomy))
                        {{ method_field('put') }}
                    @endif
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 col-xs-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="control-label required">Name</label>
                            <input required type="text" name="name" class="form-control" placeholder="Enter name"
                                   value="{{ isset($taxonomy) ? $taxonomy->name : '' }}">
                            <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                        </div>
                        <div
                            class="col-md-6 col-xs-12 form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                            <label class="control-label {{ isset($taxonomy) ? '' : 'required' }}">Type</label>
                            <select name="type" class="form-control type">
                                <option>
                                <option {{isset($taxonomy)&& $taxonomy->type==\App\Constants\StatusCode::CITY ?'selected':'' }} value="{{\App\Constants\StatusCode::CITY}}">City</option>
                                <option {{isset($taxonomy)&& $taxonomy->type==\App\Constants\StatusCode::ACCEPT ?'selected':'' }} value="{{\App\Constants\StatusCode::ACCEPT}}">Accept</option>
                                <option {{isset($taxonomy)&& $taxonomy->type==\App\Constants\StatusCode::COUNTRY ?'selected':'' }} value="{{\App\Constants\StatusCode::COUNTRY}}">Country</option>
                                </option>
                            </select>
                        </div>
                        <div
                            class="col-md-6 col-xs-12 form-group list-city {{ $errors->has('discount_max') ? 'has-error' : '' }}">
                            <label class="control-label ">Country</label>
                            <div
                                class="form-group">
                                <select name="parent_id" required class="form-control">
                                    <option value="">Select</option>
                                    @if(@$country)
                                        @foreach($country as $k =>$s)
                                            <option
                                                value="{{$k}}" {{isset($taxonomy) && $taxonomy->type==\App\Constants\StatusCode::CITY && $taxonomy->parent_id == $k? 'selected':''   }} >{{$s}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="clear"></div>

                        <!-- /.box-body -->
                        <div class="col-md-12 col-xs-12 form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> OK</button>
                            <a href="{{ url('admin/taxonomy') }}" type="button" class="btn btn-danger"><i
                                    class="fa fa-times"></i> Cancel</a>
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
        $('.list-city').css('display', 'none');
    @if(isset($taxonomy) && $taxonomy->type==\App\Constants\StatusCode::CITY && $taxonomy->parent_id !=0 )
    $('.list-city').css('display', 'block');
    @endif
$('.type').on('change', function () {
    var type = $('.type').val();
    console.log(type);
    if (type == 'city')
        $('.list-city').css('display', 'block');
    else
        $('.list-city').css('display', 'none');

})

$("form").validate({
    rules: {
        name: "required",
        type: "required",
        parent_id: "required",

    },
    messages: {
        name: "Please enter name",
        type: "Please enter type",
        parent_id: "Please enter parent",
    },
});
})
</script>
