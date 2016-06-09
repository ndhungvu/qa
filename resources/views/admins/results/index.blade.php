@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li class="active">Results</li>
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
                            <span class="btn btn-danger jsDeleteAll" data-toggle="tooltip" data-placement="top" title="Delete" role="button"><i class="fa fa-trash"></i></i></span>
                            <span class="jsDeleteAllComfirm" style="display: none;"></span>                            
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::open(array('url'=>'/admin/result/delete-all', 'id'=>'frm', 'class'=>'form-horizontal')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th><input type="checkbox" class="tableflat jsCheckboxAll"></th>
                                <th>#</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Category</th>
                                <th>Score</th>
                                <th>Created</th>
                                <th class="no-link last"><span class="nobr">Actions</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($results)
                                @foreach($results as $key => $result)
                                <tr class="even pointer">
                                    <td class="a-center">
                                        <input type="checkbox" name="id[]" value="{!! $result->id !!}" class="tableflat jsCheckbox">
                                    </td>
                                    <td>{!! $key + 1 !!}</td>
                                    <td>{!! $result->user->email !!}</td>
                                    <?php 
                                         /*Get levels*/
                                        $levels = Helper::levels();
                                    ?>
                                    <td>{!! $levels[$result->level_id]!!}</td>
                                    <td>{!! $result->category->name !!}</td>
                                    <td>{!! round($result->correct_number / $result->number, 2)*10!!}</td>
                                    <td>{!! $result->created_at !!}</td>
                                    <td class="last">
                                        <a class="btn btn-success btn-xs"  href="{!! URL::route('admin.result.detail', $result->id) !!}" data-toggle="tooltip" data-placement="top" title="View" role="button"><i class="fa fa-fw fa-eye"></i></a>                                        
                                        <a href="javascript:;" class="btn btn-danger btn-xs jsDelete" attr-id = "{!! $result->id !!}" attr-href="/admin/result/delete/{!!$result->id !!}" data-toggle="tooltip" data-placement="top" title="Delete" role="button"><i class="fa fa-fw fa-trash"></i></a>
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
                    <?php echo $results->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
@stop