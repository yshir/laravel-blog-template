<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper-dashboard/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('paper-dashboard/img/favicon.png') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>test</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('paper-dashboard/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('paper-dashboard/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('paper-dashboard/css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('paper-dashboard/css/demo.css') }}" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('paper-dashboard/css/themify-icons.css') }}" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->
    
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        Creative Tim
                    </a>
                </div>
    
                <ul class="nav">
                    <li class="active">
                        <a href="{{ route('dashboard.index') }}">
                            <i class="ti-panel"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.users.index') }}">
                            <i class="ti-user"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.posts.index') }}">
                            <i class="ti-write"></i>
                            <p>Posts</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.categories.index') }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.tags.index') }}">
                            <i class="ti-view-list-alt"></i>
                            <p>Tags</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-write"></i>
								<p>New Posts</p>
                            </a>
                        </li>
                        {{-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
						<li>
                            <a href="#">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li> --}}
                    </ul>

                </div>
            </div>
        </nav>
        
        @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
          
                        <li>
                            <a href="https://twitter.com/y__hir">
                               y__hir
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="https://twitter.com/y__hir">@y__hir</a>
                </div>
            </div>
          </footer>
          
          <!--   Core JS Files   -->
          <script src="{{ asset('paper-dashboard/js/jquery.min.js') }}" type="text/javascript"></script>
          <script src="{{ asset('paper-dashboard/js/bootstrap.min.js') }}" type="text/javascript"></script>
          
          <!--  Checkbox, Radio & Switch Plugins -->
          <script src="{{ asset('paper-dashboard/js/bootstrap-checkbox-radio.js') }}"></script>
          
          <!--  Charts Plugin -->
          <script src="{{ asset('paper-dashboard/js/chartist.min.js') }}"></script>
          
          <!--  Notifications Plugin    -->
          <script src="{{ asset('paper-dashboard/js/bootstrap-notify.js') }}"></script>
          
          <!--  Google Maps Plugin    -->
          <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
          
          <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
          <script src="{{ asset('paper-dashboard/js/paper-dashboard.js') }}"></script>
          
          <script type="text/javascript">
            $(document).ready(function(){
          
                demo.initChartist();
          
                $.notify({
                    icon: 'ti-gift',
                    message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."
          
                  },{
                      type: 'success',
                      timer: 4000
                  });
          
            });
          </script>
    </div>
</div>
</body>
</html>
