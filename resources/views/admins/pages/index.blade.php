@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Trang chủ</a></li>
            <li class="active">Tin tức</li>
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
                    <h2>Danh sách</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <span onclick="location.href='/admin/page/create'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Thêm" role="button"><i class="fa fa-plus-square"></i></span>
                        </li>
                        <li>
                            <span class="btn btn-danger jsDeleteAll" data-toggle="tooltip" data-placement="top" title="Sửa" role="button"><i class="fa fa-trash"></i></i></span>
                            <span class="jsDeleteAllComfirm" style="display: none;"></span>                            
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::open(array('url'=>'/admin/page/delete-all', 'id'=>'frm', 'class'=>'form-horizontal')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th><input type="checkbox" class="tableflat jsCheckboxAll"></th>
                                <th>#</th>
                                <th>Tiêu đề</th>
                                <th>Mô tả</th>
                                <th>Hình ảnh</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th class="no-link last"><span class="nobr">Chức năng</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($pages)
                                @foreach($pages as $key => $page)
                                <tr class="even pointer">
                                    <td class="a-center">
                                        <input type="checkbox" name="id[]" value="{!! $page->id !!}" class="tableflat jsCheckbox">
                                    </td>
                                    <td>{!! $key + 1 !!}</td>
                                    <td>{!! $page->title !!}</td>
                                    <td>{!! $page->description !!}</td>
                                    <td>{!! Html::image($page->image, $page->name, array('width' => 50, 'height' => 50, 'class' => 'img-circle')) !!}</td>
                                    <td>
                                        @if($page->status == 1)
                                        <a href="javascript:;" class="jsChangeStatus" attr-id = "{!! $page->id !!}" attr-status ="{!! $page->status !!}" attr-href="/admin/page/change-status/{!!$page->id !!}" data-toggle="tooltip" data-placement="top" title="On" role="button"><i class="fa fa-toggle-on"></i></a>
                                        @else
                                        <a href="javascript:;" class="jsChangeStatus" attr-id = "{!! $page->id !!}" attr-status ="{!! $page->status !!}" attr-href="/admin/page/change-status/{!!$page->id !!}" data-toggle="tooltip" data-placement="top" title="Off" role="button"><i class="fa fa-toggle-off"></i></a>
                                        @endif
                                    </td>
                                    <td>{!! $page->created_at !!}</td>
                                    <td class="last">
                                        <a class="btn btn-success btn-xs"  href="{!! URL::route('admin.page.detail', $page->id) !!}" data-toggle="tooltip" data-placement="top" title="Xem" role="button"><i class="fa fa-fw fa-eye"></i></a>
                                        <a class="btn btn-primary btn-xs" href="{!! URL::route('admin.page.edit', $page->id) !!}" data-toggle="tooltip" data-placement="top" title="Sửa" role="button"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="javascript:;" class="btn btn-danger btn-xs jsDelete" attr-id = "{!! $page->id !!}" attr-href="/admin/page/delete/{!!$page->id !!}" data-toggle="tooltip" data-placement="top" title="Xóa" role="button"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td><span>No results</span></td>
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
                    <?php echo $pages->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop