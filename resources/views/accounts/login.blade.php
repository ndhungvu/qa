@extends('layouts.admin-login')
@section('content')
<div id="login" class="animate form">
    <section class="login_content">
        {!! Form::open(array('id'=>'frmLogin')) !!}
            <h1>Đăng nhập</h1>
            <span class="jsError jsErrorAll"></span>
            @include('masters.message')
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
            {!! Form::text('email', null, array('placeholder'=>'Email','class'=>'form-control jsEmail')) !!}
            <span class="jsError jsErrorEmail"></span>
            {!! Form::password('password', array('placeholder'=>'Mật khẩu','class'=>'form-control jsPassword')) !!}
            <p class="jsError jsErrorPassword"></p>
            <a class="reset_pass" href="#">Quên mật khẩu ?</a>
            <input class="btn btn-default submit jsSubmit" type="button" value ="Đăng nhập"/>
        {!! Form::close() !!}
       

        <a href="/auth/facebook">FB</a>
        <a href="/auth/twitter">TW</a>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.jsSubmit').on('click', function(){
            $('.jsError').hide();
            var _email = $('.jsEmail').val();
            var _password = $('.jsPassword').val();
            if(!validateEmail(_email)) {
                $('.jsErrorEmail').html('Email không hợp lệ.').show();
                return false;
            }
            if(_password == '') {
                $('.jsErrorPassword').html('Mật khẩu không hợp lệ.').show();
                return false;
            }
            var _form = $('#frmLogin');
            $.ajax({
                type: 'POST',
                url: '/account/login',
                data: _form.serialize(),
                dataType: 'JSON',
                success: function(res) {
                    if(res.status) {
                        var _url = window.location.href;
                        window.location.href = _url;
                    }else {
                        $('.jsErrorAll').html(res.message).show();
                    }
                }
            });
        });
    });

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
</script>

@stop