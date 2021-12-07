<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{url('/')}}/public/assets/semantic/semantic.min.css">

    <script src="{{url('/')}}/public/assets/semantic/semantic.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{url('/')}}/public/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{url('/')}}/public/assets/css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="{{url('/')}}/public/assets/css/feather.css">

    <link rel="stylesheet" type="text/css" href="{{url('/')}}/public/assets/css/font-awesome-n.min.css">

    <link rel="stylesheet" href="{{url('/')}}/public/assets/css/chartist.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="{{url('/')}}/public/assets/css/datatables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/public/assets/css/buttons.datatables.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/public/assets/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="{{url('/')}}/public/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/public/assets/css/widget.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/public/assets/css/pages.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    @yield('css')

</head>

<body>

<div class="loader-bg">
    <div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a href="{{ route('admin.dashboard') }}">
                        <h3 class="text-capitalize">DriverApp</h3>
                    </a>
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu icon-toggle-right"></i>
                    </a>
                    <a class="mobile-options waves-effect waves-light">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                        <span class="input-group-prepend search-close">
                                            <i class="feather icon-x input-group-text"></i>
                                        </span>
                                    <input type="text" class="form-control" placeholder="Enter Keyword">
                                    <span class="input-group-append search-btn">
                                            <i class="feather icon-search input-group-text"></i>
                                        </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#!"
                               onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()"
                               class="waves-effect waves-light" data-cf-modified-d2d1d6e2f87cbebdf4013b26-="">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{url('/')}}/public/assets/logos/profile.png" class="img-radius"
                                         alt="User-Profile-Image">
                                    <span class="font-weight-bold"
                                          style="font-size: 15px">{{ auth()->user()->name }}</span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu"
                                    data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <a href="#">
                                            <i class="feather icon-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <nav class="pcoded-navbar">
                    <div class="nav-list">
                        <div class="pcoded-inner-navbar main-menu">

                            <div class="pcoded-navigation-label">DriverApp System</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="{{Request::segment(1) == null ? 'active' : ''}}">
                                    <a href="{{ route('admin.dashboard') }}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-home"></i>
                                            </span>
                                        <span class="pcoded-mtext">Home</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="pcoded-navigation-label">Content Management</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="{{Request::segment(1) == 'drivers' ? 'active' : ''}}">
                                    <a href="{{ route('drivers.index') }}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fa fa-list-ol"></i></span>
                                        <span class="pcoded-mtext">Drivers</span>
                                    </a>
                                </li>

                                <div class="pcoded-navigation-label">Management</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="">
                                        <a href="{{ route('logout') }}" class="waves-effect waves-dark" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-log-out"></i>
                                            </span>
                                            <span class="pcoded-mtext">Logout</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="pcoded-content">

                    <div class="page-header card">
                        <div class="row align-items-end">

                            @yield('pageHeaderTitle')

                            @yield('breadcrumb')

                        </div>
                    </div>

                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">

                                    @if(session()->has('success'))
                                        <div class="alert alert-success background-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                            </button>
                                            <strong>{{ session()->get('success') }}</strong>
                                        </div>
                                    @endif

                                    @if(session()->has('error'))
                                        <div class="alert alert-danger background-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                            </button>
                                            <strong>{{ session()->get('error') }}</strong>
                                        </div>
                                    @endif

                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>
                                            @foreach ($errors->all() as $error)
                                                <strong>{{ $error }} <br></strong>
                                            @endforeach
                                        </div>
                                    @endif

                                    @yield('content')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="styleSelector">
                </div>

            </div>
        </div>
    </div>
</div>


<script data-cfasync="false" src="{{url('/')}}/public/assets/js/email-decode.min.js"></script>

<script type="1dc21dc544476ddffbc54af6-text/javascript" src="{{url('/')}}/public/assets/js/jquery.min.js"></script>
<script type="1dc21dc544476ddffbc54af6-text/javascript" src="{{url('/')}}/public/assets/js/jquery-ui.min.js"></script>
<script type="1dc21dc544476ddffbc54af6-text/javascript" src="{{url('/')}}/public/assets/js/popper.min.js"></script>
<script type="1dc21dc544476ddffbc54af6-text/javascript" src="{{url('/')}}/public/assets/js/bootstrap.min.js"></script>

<script src="{{url('/')}}/public/assets/js/waves.min.js" type="1dc21dc544476ddffbc54af6-text/javascript"></script>


<script type="1dc21dc544476ddffbc54af6-text/javascript"
        src="{{url('/')}}/public/assets/js/jquery.slimscroll.js"></script>

<script type="1dc21dc544476ddffbc54af6-text/javascript" src="{{url('/')}}/public/assets/js/modernizr.js"></script>
<script type="1dc21dc544476ddffbc54af6-text/javascript" src="{{url('/')}}/public/assets/js/css-scrollbars.js"></script>

<script src="{{url('/')}}/public/assets/js/waves.min.js" type="1dc21dc544476ddffbc54af6-text/javascript"></script>

<script src="{{url('/')}}/public/assets/js/jquery.datatables.min.js"
        type="1dc21dc544476ddffbc54af6-text/javascript"></script>

<script src="{{url('/')}}/public/assets/js/datatables.buttons.min.js"
        type="1dc21dc544476ddffbc54af6-text/javascript"></script>

<script src="{{url('/')}}/public/assets/js/jszip.min.js" type="1dc21dc544476ddffbc54af6-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/pdfmake.min.js" type="1dc21dc544476ddffbc54af6-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/vfs_fonts.js" type="1dc21dc544476ddffbc54af6-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/buttons.print.min.js"
        type="1dc21dc544476ddffbc54af6-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/buttons.html5.min.js"
        type="1dc21dc544476ddffbc54af6-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/datatables.bootstrap4.min.js"
        type="1dc21dc544476ddffbc54af6-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/datatables.responsive.min.js"
        type="1dc21dc544476ddffbc54af6-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/responsive.bootstrap4.min.js"
        type="1dc21dc544476ddffbc54af6-text/javascript"></script>

<script src="{{url('/')}}/public/assets/js/data-table-custom.js"
        type="1dc21dc544476ddffbc54af6-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/pcoded.min.js" type="1dc21dc544476ddffbc54af6-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/vertical-layout.min.js"
        type="1dc21dc544476ddffbc54af6-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/jquery.mcustomscrollbar.concat.min.js"
        type="1dc21dc544476ddffbc54af6-text/javascript"></script>
<script type="1dc21dc544476ddffbc54af6-text/javascript" src="{{url('/')}}/public/assets/js/script.js"></script>

<script src="{{url('/')}}/public/assets/js/jquery.flot.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/jquery.flot.categories.js"
        type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/curvedlines.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/jquery.flot.tooltip.min.js"
        type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script type="6a728206c8ede063a939d6d6-text/javascript" src="{{url('/')}}/public/assets/js/jquery.wavify.js"></script>
<script type="6a728206c8ede063a939d6d6-text/javascript" src="{{url('/')}}/public/assets/js/tweenmax.min.js"></script>

<script src="{{url('/')}}/public/assets/js/chartist.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script src="{{url('/')}}/public/assets/js/amcharts.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/serial.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/light.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script type="6a728206c8ede063a939d6d6-text/javascript"
        src="{{url('/')}}/public/assets/js/owl.carousel.min.js"></script>
<script src="{{url('/')}}/public/assets/js/pcoded.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
<script src="{{url('/')}}/public/assets/js/vertical-layout.min.js"
        type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
<script type="6a728206c8ede063a939d6d6-text/javascript"
        src="{{url('/')}}/public/assets/js/widget-statistic.js"></script>
<script type="d2d1d6e2f87cbebdf4013b26-text/javascript"
        src="{{url('/')}}/public/assets/js/custom-dashboard.min.js"></script>
<script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{url('/')}}/public/assets/js/script.min.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
        type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script type="d2d1d6e2f87cbebdf4013b26-text/javascript">
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

</script>

<script src="{{url('/')}}/public/assets/js/rocket-loader.min.js" data-cf-settings="1dc21dc544476ddffbc54af6-|49"
        defer=""></script>

@yield('scripts')

</body>

</html>
