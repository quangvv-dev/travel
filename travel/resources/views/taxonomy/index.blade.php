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
                            <div class="col-md-9">
                                <a class=" btn btn-primary btn-flat" href="{{ url('admin/taxonomy/create') }}"><i
                                        class="fa fa-plus-circle"></i>
                                    Add new taxonomy</a>
                            </div>
                            <div class="list-option" style="margin-right:10px " >
                                <form id="option_form" action="{{ url('admin/taxonomy') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <select name="option" id="option" class="form-control">
                                            <option value="" >All</option>
                                            <option value="{{\App\Constants\StatusCode::CITY}}" {{(isset($_GET['option']) && $_GET['option'] == \App\Constants\StatusCode::CITY) ? 'selected':''}} >City</option>
                                            <option value="{{\App\Constants\StatusCode::ACCEPT}}" {{(isset($_GET['option']) && $_GET['option'] == \App\Constants\StatusCode::ACCEPT) ? 'selected':''}} >Accept</option>
                                            <option value="{{\App\Constants\StatusCode::COUNTRY}}" {{(isset($_GET['option']) && $_GET['option'] == \App\Constants\StatusCode::COUNTRY) ? 'selected':''}} >Country</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="" >
                                <form action="{{ url('admin/taxonomy') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" class="form-control pull-right"
                                               placeholder="Search"
                                               value="{{request()->search ?: ''}}">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-success" style="height: 31px;"><i class="fa fa-search"></i>
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($taxonomy))
                                    @foreach($taxonomy as $s)
                                        <tr>
                                            <th>{{$s->id}}</th>
                                            <th>{{$s->name}}</th>
                                            <th>{{$s->type}}</th>

                                            <th><a href="{{ url('admin/taxonomy/' . $s->id . '/edit') }}" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="delete" title="Delete"
                                                   data-url="{{ url('admin/taxonomy/' . $s->id) }}">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th id="no-data" class="text-center" colspan="7">No data available in table</th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <div class="page-info">
                                    {{ 'Total ' . $taxonomy->total() . ' records ' . (request()->search ? 'found' : '') }}
                                </div>
                            </div>
                            <div class="pull-right">
                                {{ $taxonomy->appends(['search' => request()->search ])->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div><!-- end col-->

    </div>
@endsection
<script src="/backend/assets/js/jquery.min.js"></script>
<script>
    $('document').ready(function () {
        $("#option").change(function () {
            $("#option_form").trigger("submit");
        });
    })
</script>
