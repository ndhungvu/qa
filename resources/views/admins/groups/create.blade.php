@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Trang chủ</a></li>
            <li><a href="/admin/groups">Danh sách</a></li>
            <li class="active">Thêm mới</li>
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
                    <h2>Thêm mới</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::open(array('url' => '/admin/group/create','id'=>'frm','class'=>'form-horizontal form-label-left')) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Tên <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                {!! Form::text('name', null,array('required','id'=>'name', 'class'=>'form-control col-md-7 col-xs-12')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả', array('class' => 'control-label col-md-2 col-sm-2 col-xs-2')) !!}
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                {!! Form::textarea('description',null,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', array('class' => 'control-label col-md-2 col-sm-2 col-xs-2')) !!}
                            <div class="checkbox">
                                <label>
                                    <div class="icheckbox_flat-green jsCheck">
                                        {!! Form::checkbox('status', '1', null, array('class'=>'flat')) !!}
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <button type="reset" class="btn btn-primary">Làm lại</button>
                                <button type="submit" class="btn btn-success">Thêm mới</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop