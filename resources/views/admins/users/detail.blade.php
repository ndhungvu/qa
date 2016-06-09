@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Trang chủ</a></li>
            <li><a href="/admin/users">Danh sách</a></li>
            <li class="active">Chi tiết</li>
        </ol>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @include('masters.message')
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detail</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <span  onclick="location.href='/admin/user/edit/{!! $user->id !!}'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa" role="button"><i class="fa fa-edit"></i></span>
                        </li>
                        <li>
                            <span  onclick="location.href='/admin/user/delete/{!! $user->id !!}'" class="btn btn-danger jsDelete" data-toggle="tooltip" data-placement="top" title="Xóa" role="button"><i class="fa fa-trash"></i></i></span>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Nickname: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $user->username !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Email: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $user->email !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Ảnh đại diện: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! Html::image($user->avatar, 'Avatar', array('class'=>'img-rounded img-active','width'=>150, 'height'=> 150)) !!} 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Thuộc nhóm: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $user->group->name !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Ngày tạo: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $user->created_at !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Ngày cập nhật: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $user->updated_at !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop