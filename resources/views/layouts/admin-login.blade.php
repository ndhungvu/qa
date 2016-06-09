<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin - Login | TVOline</title>

        <!-- Bootstrap core CSS -->
        {!! Html::style('/admin/css/bootstrap.min.css') !!}

        {!! Html::style('/admin/fonts/css/font-awesome.min.css') !!}
        {!! Html::style('/admin/css/animate.min.css') !!}

        <!-- Custom styling plus plugins -->
        {!! Html::style('/admin/css/custom.css') !!}
        {!! Html::style('/admin/css/icheck/flat/green.css') !!}

        {!! Html::script('/admin/js/jquery.min.js'); !!}
        <!--[if lt IE 9]>
            <script src="admin/assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body style="background:#F7F7F7;">
        <div id="wrapper">
            @yield('content')
        </div>
    </body>
</html>