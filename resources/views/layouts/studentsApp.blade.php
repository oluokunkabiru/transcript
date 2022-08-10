<!DOCTYPE html>
    <html>

    <head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RMS</title>

    <link href="/img/favicon.144x144.html" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="/img/favicon.114x114.html" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="/img/favicon.72x72.html" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="/img/favicon.57x57.html" rel="apple-touch-icon" type="image/png">
    <link href="/img/favicon.html" rel="icon" type="image/png">
    <link href="/img/favicon-2.html" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/css/lobipanel/lobipanel.min.css">
    <link rel="stylesheet" href="/css/vendor/lobipanel.min.css">
    <link rel="stylesheet" href="/css/jqueryui/jquery-ui.min.css">
    <link rel="stylesheet" href="/css/pages/widgets.min.css">
    <link rel="stylesheet" href="/css/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body class="with-side-menu control-panel control-panel-compact">

    <header class="site-header">
        <div class="container-fluid">
            <a href="" class="site-logo">
                {{--<img class="hidden-md-down" src="img/logo-2.png" alt="">--}}
                <img class="hidden-lg-down" src="/img/logo-2-mob.png" alt="">
                <a href="{{route('student.home')}}" class="link">Home</a>
            </a>

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
        {{-- <header class="side-menu-title">Menu</header> --}}
        <ul class="side-menu-list">

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="tag-color red"></i>
                    Courses <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('course-registration.new')}}">Course Registration</a></li>
                    <li><a href="{{route('course-registration.edit')}}">Edit Registration</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="{{route('student-view-result')}}">
                    <i class="tag-color pink"></i>
                    Result
                </a>
            </li>

            <li class="dropdown">
                <a href="{{route('student-view-result')}}">
                    <i class="tag-color pink"></i>
                    Result Transcript
                </a>
            </li>

           



        </ul>
    </section>
</nav><!--.side-menu-->

<div class="page-content">
    @yield('content')
</div><!--.page-content-->

<div class="control-panel-container">
  
</div>

<script src="{{ asset('js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/lib/popper/popper.min.js') }}"></script>
<script src="{{ asset('js/lib/tether/tether.min.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap/bootstrap.min.js') }}"></script>
{{-- <script src="/https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> --}}
<script src="{{ asset('js/plugins.js') }}"></script>
<script>
    $(document).ready(function() {
        
    });
</script>
<script src="{{ asset('js/app1.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

