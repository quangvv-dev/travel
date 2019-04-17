@extends('layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <!-- end row -->

                <div class="row ">
                    <div class="col-sm-12 col-xs-12 col-md-12">
                        <div class="box-header row">
                            <div class="col-md-10">
                                <a class=" btn btn-primary btn-flat" href="{{ url('admin/users/create') }}"><i
                                            class="fa fa-plus-circle"></i>
                                    Thêm tài khoản</a>
                            </div>
                            <div class="box-tools col-md-2" style="float: right">
                                <form action="{{ url('admin/users') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" class="form-control pull-right"
                                               placeholder="Search"
                                               value="{{request()->search ?: ''}}">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="p-20">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>

                                    <th class="sorting">ID</th>
                                    <th>Ảnh</th>
                                    <th>Tên người dùng</th>
                                    <th>SĐT</th>
                                    <th>Cấp bậc</th>
                                    <th>Điểm</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($user))
                                    @foreach($user as $s)
                                        <tr>
                                            <td>{{$s->id}}</td>
                                            <td><img class="rounded-circle" height="60" widtd="60"
                                                     src="{{$s->image ? url('uploads/users/'.$s->image):url('backend/assets/images/user.png')}}"/>
                                            </td>
                                            <td>{{$s->username}}</td>
                                            <td>{{$s->phone}}</td>
                                            <td>{{isset($s->userRank) && isset($s->userRank->rank)? $s->userRank->rank->rank_name_vi :""}}</td>
                                            <td>{{isset($s->userRank) ? $s->userRank->member_point :"0"}}</td>
                                            <td><a class="btn" href="{{ url('admin/users/' . $s->id . '/edit') }}"
                                                   title="Sửa">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn delete" title="Xóa"
                                                   data-url="{{ url('admin/users/' . $s->id) }}">
                                                    <i class="fa fa-trash-o fa-red" style="color: red"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th id="no-data" class="text-center" colspan="7">Không có dữ liệu</th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <div class="page-info">
                                    {{ 'Tổng số ' . $user->total() . ' bản ghi ' . (request()->search ? 'found' : '') }}
                                </div>
                            </div>
                            <div class="pull-right">
                                {{ $user->appends(['search' => request()->search ])->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div><!-- end col-->

    </div>
@endsection
