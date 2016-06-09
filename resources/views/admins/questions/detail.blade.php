@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/questions">Questions</a></li>
            <li class="active">Detail</li>
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
                            <span  onclick="location.href='/admin/question/edit/{!! $question->id !!}'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa" role="button"><i class="fa fa-edit"></i></span>
                        </li>
                        <li>
                            <span  onclick="location.href='/admin/question/delete/{!! $question->id !!}'" class="btn btn-danger jsDelete" data-toggle="tooltip" data-placement="top" title="Xóa" role="button"><i class="fa fa-trash"></i></i></span>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>ID: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $question->id !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Question: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $question->content !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Awnsers: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <?php $awnsers = $question->awnsers;?>
                            @if(!empty($awnsers ))
                                @foreach($awnsers as $key => $awnser)
                                    @if($awnser->is_correct)
                                    <strong>{!! ($key +1 ).') '.$awnser->content !!}</strong><br>
                                    @else
                                    {!! ($key +1 ).') '.$awnser->content !!} <br>
                                    @endif
                                
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Category: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $question->category->name !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Status: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $question->status == 1 ? 'Active' : 'UnActive' !!} 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Created: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $question->created_at !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Updated: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $question->updated_at !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop