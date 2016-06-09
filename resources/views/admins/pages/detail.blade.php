@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Trang chủ</a></li>
            <li><a href="/admin/pages">Danh sach</a></li>
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
                            <span  onclick="location.href='/admin/page/edit/{!! $page->id !!}'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa" role="button"><i class="fa fa-edit"></i></span>
                        </li>
                        <li>
                            <span  onclick="location.href='/admin/page/delete/{!! $page->id !!}'" class="btn btn-danger jsDelete" data-toggle="tooltip" data-placement="top" title="Xóa" role="button"><i class="fa fa-trash"></i></i></span>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Mã: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $page->id !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Tiêu đề: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $page->title !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Slug: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $page->slug !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Mô tả: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $page->description !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Nội dung: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $page->content !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Trạng thái: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $page->status == 1 ? 'Kích hoạt' : 'Không kích hoạt' !!} 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Ngày tạo: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $page->created_at !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Ngày cập nhật: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $page->updated_at !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop