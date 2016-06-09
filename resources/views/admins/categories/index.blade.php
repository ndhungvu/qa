@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li class="active">Categories</li>
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
                    <h2>Lists</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <span onclick="location.href='/admin/category/create'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Create" role="button"><i class="fa fa-plus-square"></i></span>
                        </li>
                        <li>
                            <span class="btn btn-danger jsDeleteAll" data-toggle="tooltip" data-placement="top" title="Delete" role="button"><i class="fa fa-trash"></i></i></span>
                            <span class="jsDeleteAllComfirm" style="display: none;"></span>                            
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::open(array('url'=>'/admin/category/delete-all', 'id'=>'frm', 'class'=>'form-horizontal')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th><input type="checkbox" class="tableflat jsCheckboxAll"></th>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th class="no-link last"><span class="nobr">Chức năng</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($categories)
                                @foreach($categories as $key => $category)
                                <tr class="even pointer">
                                    <td class="a-center">
                                        <input type="checkbox" name="id[]" value="{!! $category->id !!}" class="tableflat jsCheckbox">
                                    </td>
                                    <td>{!! $key + 1 !!}</td>
                                    <td>{!! $category->name !!}</td>
                                    <td>{!! $category->description !!}</td>
                                    <td>
                                        @if($category->status == 1)
                                        <a href="javascript:;" class="jsChangeStatus" attr-id = "{!! $category->id !!}" attr-status ="{!! $category->status !!}" attr-href="/admin/category/change-status/{!!$category->id !!}" data-toggle="tooltip" data-placement="top" title="On" role="button"><i class="fa fa-toggle-on"></i></a>
                                        @else
                                        <a href="javascript:;" class="jsChangeStatus" attr-id = "{!! $category->id !!}" attr-status ="{!! $category->status !!}" attr-href="/admin/category/change-status/{!!$category->id !!}" data-toggle="tooltip" data-placement="top" title="Off" role="button"><i class="fa fa-toggle-off"></i></a>
                                        @endif
                                    </td>
                                    <td>{!! $category->created_at !!}</td>
                                    <td class="last">
                                        <a class="btn btn-success btn-xs"  href="{!! URL::route('admin.category.detail', $category->id) !!}" data-toggle="tooltip" data-placement="top" title="View" role="button"><i class="fa fa-fw fa-eye"></i></a>
                                        <a class="btn btn-primary btn-xs" href="{!! URL::route('admin.category.edit', $category->id) !!}" data-toggle="tooltip" data-placement="top" title="Edit" role="button"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="javascript:;" class="btn btn-danger btn-xs jsDelete" attr-id = "{!! $category->id !!}" attr-href="/admin/category/delete/{!!$category->id !!}" data-toggle="tooltip" data-placement="top" title="Delete" role="button"><i class="fa fa-fw fa-trash"></i></a>
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
                    <?php echo $categories->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop