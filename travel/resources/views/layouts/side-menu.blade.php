<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="has_sub">
                    <a href="{{url('admin/home')}}" class="waves-effect">
                        <i class="zmdi zmdi-view-dashboard"></i><span> Dashboard </span> </a>
                </li>

                <li class="has_sub">
                    <a href="{{url('admin/users')}}" class="waves-effect"><i class="fa fa-user-circle"></i>
                        <span> Quản lý người dùng </span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-shopping-cart"></i>
                        <span> Quản lý tour</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('admin/tour')}}"><i class="fa fa-circle-o"></i>Tours</a></li>
                        <li><a href="{{url('admin/package')}}"><i class="fa fa-circle-o"></i>Gói</a></li>
                        <li><a href="{{url('admin/tour-location')}}"><i class="fa fa-circle-o"></i>Địa điểm</a>
                        </li>
                        <li><a href="{{url('admin/category_tour')}}"><i class="fa fa-circle-o"></i>Danh mục tours</a>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-spin fa-cog"></i>
                        <span> Quản lý cài đặt</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('admin/search_keyword')}}"><i class="fa fa-circle-o"></i>Từ khóa</a></li>
                        <li><a href="{{url('admin/setting_point')}}"><i class="fa fa-circle-o"></i>Điểm thưởng</a></li>
                        <li><a href="{{url('admin/policy')}}"><i class="fa fa-circle-o"></i>Chính sách</a></li>
                        <li><a href="{{url('admin/faqs')}}"><i class="fa fa-circle-o"></i>FAQs</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-film"></i>
                        <span> Quản lý hiển thị</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('admin/intro')}}"><i class="fa fa-circle-o"></i>Ảnh intro</a></li>
                        <li><a href="{{url('admin/video')}}"><i class="fa fa-circle-o"></i>Video</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="{{url('admin/rank')}}" class="waves-effect">
                        <i class="fa fa-star "></i><span> Quản lý cấp bậc </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{url('admin/taxonomy')}}" class="waves-effect">
                        <i class="fa fa-book "></i><span> Quản lý địa chỉ </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{url('admin/tour_promotion')}}" class="waves-effect">
                        <i class="fa fa-money"></i><span> Quản lý quà tặng </span> </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cubes"></i>
                        <span> Quản lý đánh giá</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        {{--<li><a href="{{url('admin/tour_location_ratting')}}"><i class="fa fa-circle-o"></i>Đánh giá địa--}}
                        {{--điểm</a></li>--}}
                        <li><a href="{{url('admin/ratting_tour')}}"><i class="fa fa-circle-o"></i>Đánh giá Tour</a></li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
