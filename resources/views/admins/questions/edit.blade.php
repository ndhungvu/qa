@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/questions">Questions</a></li>
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
                    {!! Form::open(array('url' => '/admin/question/edit/'.$question->id,'id'=>'frm','class'=>'form-horizontal form-label-left')) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Question<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                {!! Form::textarea('content', $question->content, ['class'=>'form-control', 'rows' => 2, 'cols' => 40, 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Awnsers<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <?php
                                    $awnser_name = Config::get('constant.awnser');                    
                                    $awnsers = $question->awnsers;
                                ?>
                                @foreach($awnsers as $key => $awnser)
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1 col-xs-1" for="last-name">{!! $awnser_name[$key] !!}</label>
                                    <div class="col-md-10 col-sm-10 col-xs-10">
                                        {!! Form::text('awnser[]', $awnser->content, array('required','id'=>'awnser_'.$awnser_name[$key], 'class'=>'form-control')) !!}
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-1">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="{!! $key !!}" class="flat" {!! $awnser->is_correct ? 'checked' : '' !!} name="is_correct">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Category
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <select class="form-control" name="category_id">
                                    <option value="0">---Select---</option>
                                    @if(!empty($categories))
                                        @foreach($categories as $key => $category)
                                        <option value="{!! $category->id !!}" @if($category->id == $question->category_id ) selected @endif>{!! $category->name !!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status', array('class' => 'control-label col-md-2 col-sm-2 col-xs-2')) !!}
                            <div class="checkbox">
                                <label>
                                    <div class="icheckbox_flat-green jsCheck">
                                        {!! Form::checkbox('status', '1', $question->status, array('class'=>'flat')) !!}
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