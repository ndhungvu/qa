@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li class="active">Users</li>
        </ol>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @include('masters.message')
            </div>
        </div>

        <!--<div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>-->
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lists</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <span onclick="location.href='/admin/user/create'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Create" role="button"><i class="fa fa-plus-square"></i></span>
                        </li>
                        <li>
                            <span class="btn btn-danger jsDeleteAll" data-toggle="tooltip" data-placement="top" title="Delete" role="button"><i class="fa fa-trash"></i></i></span>
                            <span class="jsDeleteAllComfirm" style="display: none;"></span>                            
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::open(array('url'=>'/admin/user/delete-all', 'id'=>'frm', 'class'=>'form-horizontal')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th><input type="checkbox" class="tableflat jsCheckboxAll"></th>
                                <th>#</th>
                                <th>Nickname</th>
                                <th>Email</th>
                                <th>Avatar</th>
                                <th>Facebook ID</th>
                                <th>Twitter ID</th>
                                <th>Group</th>
                                <th>Created</th>
                                <th class="no-link last"><span class="nobr">Actions</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($users)
                                @foreach($users as $key => $user)
                                <tr class="even pointer">
                                    <td class="a-center">
                                        <input type="checkbox" name="id[]" value="{!! $user->id !!}" class="tableflat jsCheckbox">
                                    </td>
                                    <td>{!! $key + 1 !!}</td>
                                    <td>{!! $user->username !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! Html::image($user->avatar, $user->username, array('width' => 50, 'height' => 50, 'class' => 'img-circle')) !!}</td>
                                    <td>{!! $user->facebook_id !!}</td>
                                    <td>{!! $user->twitter_id !!}</td>
                                    <td>{!! $user->group->name !!}</td>
                                    <td>{!! $user->created_at !!}</td>
                                    <td class="last">
                                        <a class="btn btn-success btn-xs"  href="{!! URL::route('admin.user.detail', $user->id) !!}" data-toggle="tooltip" data-placement="top" title="View" role="button"><i class="fa fa-fw fa-eye"></i></a>
                                        <a class="btn btn-primary btn-xs" href="{!! URL::route('admin.user.edit', $user->id) !!}" data-toggle="tooltip" data-placement="top" title="Edit" role="button"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="javascript:;" class="btn btn-danger btn-xs jsDelete" attr-id = "{!! $user->id !!}" attr-href="/admin/user/delete/{!!$user->id !!}" data-toggle="tooltip" data-placement="top" title="Delete" role="button"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td><span>No Result.</span></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {!! Form::close() !!}
                    <?php echo $users->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop