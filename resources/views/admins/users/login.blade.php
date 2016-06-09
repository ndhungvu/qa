@extends('layouts.admin-login')
@section('content')
<div id="login" class="animate form">
    <section class="login_content">
        {!! Form::open(array('url'=>'admin/login','action'=>'post')) !!}
            <h1>Đăng Nhập</h1>
            @include('masters.message')
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
            {!! Form::text('username', null, array('placeholder'=>'Tài khoản','class'=>'form-control')) !!}
            {!! Form::password('password', array('placeholder'=>'Mật khẩu','class'=>'form-control')) !!}
            <a class="reset_pass" href="#">Quên mật khẩu ?</a>
            <input class="btn btn-default submit" type="submit" value ="Đăng nhập"/>
            <div class="separator">
                <div>
                    <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Q&A!</h1>
                    <p>©2016 All Rights Reserved.</p>
                </div>
            </div>
        {!! Form::close() !!}
    </section>
</div>
@stop