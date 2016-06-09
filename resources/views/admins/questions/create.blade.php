@extends('layouts.admin')
@section('content')

<!-- page content -->
<div class="lists">
    <div class="page-title">
        <ol class="breadcrumb">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/questions">Lists</a></li>
            <li class="active">Create</li>
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
                    <h2>Create</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::open(array('url' => '/admin/question/create','id'=>'frm','class'=>'form-horizontal form-label-left')) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Question<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                {!! Form::textarea('content',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40, 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="last-name">Awnsers<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <?php 
                                    $awnser_name = Config::get('constant.awnser');
                                    for($i = 0; $i <= 3; $i++ ){
                                ?>
                                    <div class="form-group">
                                        <label class="control-label col-md-1 col-sm-1 col-xs-1" for="last-name"><?php echo $awnser_name[$i];?></label>
                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                            {!! Form::text('awnser[]', null, array('required','id'=>'awnser_'.$awnser_name[$i], 'class'=>'form-control')) !!}
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" value="{!! $i !!}" class="flat" <?php echo $i==0 ? 'checked' : ''; ?> name="is_correct">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
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
                                        <option value="{!! $category->id !!}">{!! $category->name !!}</option>
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
                                        {!! Form::checkbox('status', '1', null, array('class'=>'flat')) !!}
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop