@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li class="active">Questions</li>
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
                            <span onclick="location.href='/admin/question/create'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Create" role="button"><i class="fa fa-plus-square"></i></span>
                        </li>
                        <li>
                            <span class="btn btn-danger jsDeleteAll" data-toggle="tooltip" data-placement="top" title="Delete" role="button"><i class="fa fa-trash"></i></i></span>
                            <span class="jsDeleteAllComfirm" style="display: none;"></span>                            
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::open(array('url'=>'/admin/question/delete-all', 'id'=>'frm', 'class'=>'form-horizontal')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th><input type="checkbox" class="tableflat jsCheckboxAll"></th>
                                <th>#</th>
                                <th>Question</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th class="no-link last"><span class="nobr">Actions</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($questions)
                                @foreach($questions as $key => $question)
                                <tr class="even pointer">
                                    <td class="a-center">
                                        <input type="checkbox" name="id[]" value="{!! $question->id !!}" class="tableflat jsCheckbox">
                                    </td>
                                    <td>{!! $key + 1 !!}</td>
                                    <td>{!! $question->content !!}</td>
                                    <td>{!! $question->category->name !!}</td>
                                    <td>
                                        @if($question->status == 1)
                                        <a href="javascript:;" class="jsChangeStatus" attr-id = "{!! $question->id !!}" attr-status ="{!! $question->status !!}" attr-href="/admin/question/change-status/{!!$question->id !!}" data-toggle="tooltip" data-placement="top" title="On" role="button"><i class="fa fa-toggle-on"></i></a>
                                        @else
                                        <a href="javascript:;" class="jsChangeStatus" attr-id = "{!! $question->id !!}" attr-status ="{!! $question->status !!}" attr-href="/admin/question/change-status/{!!$question->id !!}" data-toggle="tooltip" data-placement="top" title="Off" role="button"><i class="fa fa-toggle-off"></i></a>
                                        @endif
                                    </td>
                                    <td>{!! $question->created_at !!}</td>
                                    <td class="last">
                                        <a class="btn btn-success btn-xs"  href="{!! URL::route('admin.question.detail', $question->id) !!}" data-toggle="tooltip" data-placement="top" title="View" role="button"><i class="fa fa-fw fa-eye"></i></a>
                                        <a class="btn btn-primary btn-xs" href="{!! URL::route('admin.question.edit', $question->id) !!}" data-toggle="tooltip" data-placement="top" title="Edit" role="button"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="javascript:;" class="btn btn-danger btn-xs jsDelete" attr-id = "{!! $question->id !!}" attr-href="/admin/question/delete/{!!$question->id !!}" data-toggle="tooltip" data-placement="top" title="Delete" role="button"><i class="fa fa-fw fa-trash"></i></a>
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
                    <?php echo $questions->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop