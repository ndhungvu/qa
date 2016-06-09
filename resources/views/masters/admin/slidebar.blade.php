<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="fa fa-video-camera"></i> <span>Q&A!</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
                {!! Html::image(Auth::user()->avatar, 'Avatar', array('class'=>'img-circle profile_img','width'=>60, 'height'=> 60)) !!} 
            </div>
            <div class="profile_info">
                <h2><h2>
            </div>
        </div>
        <!-- /menu prile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">                
                <ul class="nav side-menu">
                    <li><a href="{{URL::route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard </a></li>
                    <!--Groups-->
                    <li class="@if(str_is('admin/group*', Request::path())) active @endif">
                        <a><i class="fa fa-group"></i> Groups <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{URL::route('admin.group.create')}}">Create</a></li>
                            <li><a href="{{URL::route('admin.groups')}}">Lists</a></li>
                        </ul>
                    </li>
                    <!--Users-->
                    <li class="@if(str_is('admin/user*', Request::path())) active @endif">
                        <a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{URL::route('admin.user.create')}}">Create</a></li>
                            <li><a href="{{URL::route('admin.users')}}">Lists</a></li>
                        </ul>
                    </li>
                    <!--Categories-->
                    <li class="@if(str_is('admin/category*', Request::path())) active @endif">
                        <a><i class="fa fa-asterisk"></i> Categories <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{URL::route('admin.category.create')}}">Create</a></li>
                            <li><a href="{{URL::route('admin.categories')}}">Lists</a></li>
                        </ul>
                    </li>
                    <!--Questions-->
                    <li class="@if(str_is('admin/question*', Request::path())) active @endif">
                        <a><i class="fa fa fa-question-circle"></i> Questions <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{URL::route('admin.question.create')}}">Create</a></li>
                            <li><a href="{{URL::route('admin.questions')}}">Lists</a></li>
                        </ul>
                    </li>
                    <li><a href="{{URL::route('admin.results')}}"><i class="fa fa-book"></i> Results </a></li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>