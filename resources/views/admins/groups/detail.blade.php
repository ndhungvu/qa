@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/groups">Groups</a></li>
            <li class="active">Detail</li>
        </ol>
        @include('masters.message')
        <div class="title_left">
            <h3><a href="/admin/groups">Groups</a></h3>
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
                            <span  onclick="location.href='/admin/group/edit/{!! $group->id !!}'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit" role="button"><i class="fa fa-edit"></i></span>
                        </li>
                        <li>
                            <span  onclick="location.href='/admin/group/delete/{!! $group->id !!}'" class="btn btn-danger jsDelete" data-toggle="tooltip" data-placement="top" title="Delete" role="button"><i class="fa fa-trash"></i></i></span>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Name: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $group->name !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Description: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $group->description !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Status: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $group->status == 1 ? 'Active' : 'UnActive' !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Created: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $group->created_at !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label>Updated: </label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            {!! $group->updated_at !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop