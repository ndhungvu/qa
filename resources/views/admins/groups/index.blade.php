@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Trang chủ</a></li>
            <li class="active">Nhóm</li>
        </ol>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @include('masters.message')
            </div>
        </div>

        <!---<div class="title_right">
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
                    <h2>Danh sách</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <span onclick="location.href='/admin/group/create'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Thêm" role="button"><i class="fa fa-plus-square"></i></span>
                        </li>
                        <li>
                            <span class="btn btn-danger jsDeleteAll" data-toggle="tooltip" data-placement="top" title="Xóa" role="button"><i class="fa fa-trash"></i></i></span>
                            <span class="jsDeleteAllComfirm" style="display: none;"></span>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::open(array('url'=>'/admin/group/delete-all', 'id'=>'frm', 'class'=>'form-horizontal')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th><input type="checkbox" class="tableflat jsCheckboxAll"></th>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th class="no-link last"><span class="nobr">Chức năng</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($groups)
                                @foreach($groups as $key => $group)
                                <tr class="even pointer">
                                    <td class="a-center">
                                        <input type="checkbox" name="id[]" value="{!! $group->id !!}" class="tableflat jsCheckbox">
                                    </td>
                                    <td>{!! $key + 1 !!}</td>
                                    <td>{!! $group->name !!}</td>
                                    <td>
                                        @if($group->status == 1)
                                        <a href="javascript:;" class="jsChangeStatus" attr-id = "{!! $group->id !!}" attr-status ="{!! $group->status !!}" attr-href="/admin/group/change-status/{!!$group->id !!}" data-toggle="tooltip" data-placement="top" title="Hủy" role="button"><i class="fa fa-toggle-on"></i></a>
                                        @else
                                        <a href="javascript:;" class="jsChangeStatus" attr-id = "{!! $group->id !!}" attr-status ="{!! $group->status !!}" attr-href="/admin/group/change-status/{!!$group->id !!}" data-toggle="tooltip" data-placement="top" title="Kích hoạt" role="button"><i class="fa fa-toggle-off"></i></a>
                                        @endif
                                    </td>
                                    <td>{!! $group->created_at !!}</td>
                                    <td class="last">
                                        <a class="btn btn-success btn-xs"  href="{!! URL::route('admin.group.detail', $group->id) !!}" data-toggle="tooltip" data-placement="top" title="Xem" role="button"><i class="fa fa-fw fa-eye"></i></a>
                                        <a class="btn btn-primary btn-xs" href="{!! URL::route('admin.group.edit', $group->id) !!}" data-toggle="tooltip" data-placement="top" title="Sửa" role="button"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="javascript:;" class="btn btn-danger btn-xs jsDelete" attr-id = "{!! $group->id !!}" attr-href="/admin/group/delete/{!!$group->id !!}" data-toggle="tooltip" data-placement="top" title="Xóa" role="button"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td><span>Không có dữ liệu.</span></td>
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
                    <?php echo $groups->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop