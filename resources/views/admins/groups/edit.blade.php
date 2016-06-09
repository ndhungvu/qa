@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Trang chủ</a></li>
            <li><a href="/admin/groups">Danh sách</a></li>
            <li class="active">Cập nhật</li>
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
                    <h2>Edit</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::open(array('url' => '/admin/group/edit/'.$group->id,'id'=>'frm','class'=>'form-horizontal form-label-left')) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Tên <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                {!! Form::text('name', $group->name, array('required','id'=>'name', 'class'=>'form-control col-md-7 col-xs-12')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả', array('class' => 'control-label col-md-2 col-sm-2 col-xs-2')) !!}
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                {!! Form::textarea('description', $group->description,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', array('class' => 'control-label col-md-2 col-sm-2 col-xs-2')) !!}
                            <div class="checkbox">
                                <label>
                                    <div class="icheckbox_flat-green jsCheck">
                                        {!! Form::checkbox('status', '1', $group->status, array('class'=>'flat')) !!}
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <a class="btn btn-default"href="/admin/groups" role="button">Trở lại</a>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop