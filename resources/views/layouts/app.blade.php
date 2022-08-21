<!DOCTYPE html>
    <html>

    <head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RMS</title>

    


   
    <link rel="stylesheet" href="{{ asset('css/lobipanel/lobipanel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/lobipanel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jqueryui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/widgets.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo-2-mob.png') }}" type="image/x-icon">

</head>
<body class="with-side-menu control-panel control-panel-compact">

    <header class="site-header">
        <div class="container-fluid">
            <a href="" class="site-logo">
                {{--<img class="hidden-md-down" src="img/logo-2.png" alt="">--}}
                <img class="hidden-lg-down" src="{{ asset('img/logo-2-mob.png') }}" alt="">
                <a href="{{route('home')}}" class="link"> Home</a>
            </a>

            {{--<button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
                <span>toggle menu</span>
            </button>--}}

            <button class="hamburger hamburger--htla">
                <span>toggle menu</span>
            </button>
            <div class="site-header-content">
                <div class="site-header-content-in">
                    <div class="site-header-shown">
                        <div class="dropdown user-menu">
                            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/img/avatar-2-64.png" alt="">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                {{--<a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
                                <div class="dropdown-divider"></div>--}}
                                <a class="dropdown-item" href="{{route('logout')}}"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                            </div>
                        </div>

                        <button type="button" class="burger-right">
                            <i class="font-icon-menu-addl"></i>
                        </button>
                    </div><!--.site-header-shown-->

                    <div class="mobile-menu-right-overlay"></div>

                </div><!--site-header-content-in-->
            </div><!--.site-header-content-->
        </div><!--.container-fluid-->
</header><!--.site-header-->

<div class="mobile-menu-left-overlay"></div>
<nav class="side-menu">
    
    <section>
        <header class="side-menu-title">Menu</header>
        <ul class="side-menu-list">

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="tag-color red"></i>
                    Users <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('UserType.index')}}">Create User Types</a></li>
                    <li><a href="{{route('user.index')}}">Create Users</a></li>
                    <li><a href="{{route('user.password')}}">Change Password</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="tag-color grey-blue"></i>
                    Results <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('result.index')}}">Result Filling</a></li>
                    <li><a href="{{route('result.view')}}">View Result</a></li>
                    <li><a href="{{route('result.edit')}}">Edit Result</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="tag-color green"></i>
                    Courses <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('course.index')}}">Add New Course</a></li>
                   {{-- <li><a href="{{route('course-registration.new')}}">Student's Course Registration</a></li>
                    <li><a href="{{route('course-registration.edit')}}">Edit Registration</a></li>--}}
                </ul>
            </li>

           



        </ul>
    </section>
</nav><!--.side-menu-->

<div class="page-content">
   pp
</div><!--.page-content-->

<div class="control-panel-container">
   
</div>

<script src="{{ asset('js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/lib/popper/popper.min.js') }}"></script>
<script src="{{ asset('js/lib/tether/tether.min.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap/bootstrap.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
<script src="{{ asset('js/plugins.js') }}"></script>

<script src="{{ asset('js/app1.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>

