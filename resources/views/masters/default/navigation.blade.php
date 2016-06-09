<div class="top_nav">
    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav logo">
                <a href="#">
                     {!! Html::image('/default/images/logo.png', 'Avatar', array( 'width' => 80, 'height' => 80 )) !!}
               </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        <li>
                            <a href="#">Settings</a>
                        </li>
                        <li><a href="/admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
               
            </ul>
        </nav>
    </div>
</div>