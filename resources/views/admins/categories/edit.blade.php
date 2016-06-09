@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/categories">Categories</a></li>
            <li class="active">Edit</li>
        </ol>
        <div class="title_left">
            @include('masters.message')
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
                    {!! Form::open(array('url' => '/admin/category/edit/'.$category->id,'id'=>'frm','class'=>'form-horizontal form-label-left')) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                {!! Form::text('name', $category->name, array('required','id'=>'name', 'class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-2" for="last-name">Description </label>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                {!! Form::textarea('description',$category->description,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Category
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <select class="form-control" name="level_id">
                                    <option value="0">---Select---</option>
                                    @if(!empty($levels))
                                        @foreach($levels as $key => $level)
                                        <option value="{!! $key !!}" @if($category->level_id == $key) selected @endif >{!! $level !!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', array('class' => 'control-label col-md-2 col-sm-2 col-xs-2')) !!}
                            <div class="checkbox">
                                <label>
                                    <div class="icheckbox_flat-green jsCheck">
                                        {!! Form::checkbox('status', '1', $category->status, array('class'=>'flat')) !!}
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <a class="btn btn-default"href="/admin/categories" role="button">Back</a>
                                <button type="submit" class="btn btn-primary">OK</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop