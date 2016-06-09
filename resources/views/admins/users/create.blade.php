@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/users">Users</a></li>
            <li class="active">Create</li>
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
                    <h2>Create</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::open(array('url' => '/admin/user/create','id'=>'frm','class'=>'form-horizontal form-label-left')) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Nickname <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                {!! Form::text('username', null, array('required','id'=>'last_name', 'class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                {!! Form::email('email', null,array('required','id'=>'email', 'class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Password<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                {!! Form::password('password', array('required', 'id'=>'password', 'class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Avatar</label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                    <div class="col-lg-12">                                       
                                        {!! Html::image('/uploads/avatars/no-avatar.png', 'Avatar', array('class'=>'img-rounded img-active','width'=>150, 'height'=> 150)) !!} 
                                        <input type = "hidden" name = "image_old" value = "/uploads/avatars/no-avatar.png"/>
                                        <input type = "hidden" name = "image_tmp" value = ""/>
                                        <div class="rows">
                                            <a class="btn btn-primary btn-xs jsUploadImage" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-fw fa-pencil"></i></a>
                                            <a class="btn btn-danger btn-xs jsDeleteImage" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-fw fa-trash"></i></a>                                                
                                            <img src="{!! asset('admin/images/loading.gif') !!}" alt="Loading..." class= "jsLoading" /> 
                                            <input id="image" type="file" class="jsImage" data-overwrite-initial="false" name="image">
                                        </div>                              
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">By Group</label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                {!! Form::select('group_id', $groups, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop