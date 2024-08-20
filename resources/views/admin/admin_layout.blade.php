<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Health City - @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icon.png') }}">
        <link href="{{ asset('assets/plugins/sweetalert/dist/sweetalert.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/bootstrap5.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/sb-admin.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/jquery-ui.css') }}" rel="stylesheet" type="text/css">
        <link href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" />
        <link href="{{ asset('assets/ckeditor/samples/css/samples.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet" type="text/css">
        <meta http-equiv="Content-Security-Policy" content="frame-ancestors 'none'">

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://use.fontawesome.com/267f3d102f.js"></script>

        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap5.js') }}"></script>
        <script src="{{ asset('assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('assets/js/sb-admin.min.js') }}"></script>
        <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
        <script src="{{ asset('assets/js/bootbox.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/ckeditor/samples/js/sample.js') }}"></script>
        <script src="{{ asset('assets/js/popper.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </head>
    <body id="page-top">
        <div class="wrapper d-flex align-items-stretch">
            <div id="sidebar" >
                <nav class="navbar " role="navigation">
                    <div class="side-header">
   				        <a href="{{ url('admin/dashboard')}}"><img src="{{ asset('assets/images/logo.png') }}" /></a>
			        </div>
                    <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                            @php 
                                $navlinks   = Session::get('permissions');
                             
                            @endphp
                          
                                @foreach($navlinks as $row)
                                @if($row->setup_type == 2)
                                <li  class="has-subnav @yield('dashboard_active')">
                                    <a href="{{ url($row->module_name) }}">
                                        <i class="{{$row->display_icon}}"></i>
                                        <span class="nav-text">{{$row->display_name}}</span>
                                    </a>
                                </li>
                                @endif
                                @endforeach
                                {{--
                                        @if(Session::get('userData')['role'] === 1)
                                    <li>
                                        <a class="menu-toggle3 menu-toggle" data-toggle="collapse" href="#togglePages">Forms <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                        <ul id="togglePages3" class="unstyledd" style="display:none;">
                                            <li class="has-subnav">
                                                <a href="{{url('admin/contactlist') }}">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                    <span class="nav-text">Manage Contact</span>
                                                </a> 
                                            </li>
                                            <li class="has-subnav">
                                                <a href="{{url('admin/enquire')}}">
                                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                                    <span class="nav-text">Manage Enquire</span>
                                                </a>
                                            </li>
                                            <li class="has-subnav')">
                                                <a href="{{url('admin/bookappointment')}}">
                                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                                    <span class="nav-text">Manage Book Appointment</span>
                                                </a>
                                            </li>
                                            <li class="has-subnav')">
                                                <a href="{{url('admin/second_opinion')}}">
                                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                                    <span class="nav-text">Manage Second Opinion</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                                --}}
                            @if(Session::get('userData')['role'] === 1)
                            <li>
                                <a class="menu-toggle2 menu-toggle" data-toggle="collapse" href="#togglePages">Advance Settings <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                <ul id="togglePages2" class="unstyled" style="display:none;">
                                    <li class="has-subnav @yield('users_active')">
                                        <a href="{{url('admin/advancesetting/user') }}">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                            <span class="nav-text">Manage Users</span>
                                        </a> 
                                    </li>
                                    <li class="has-subnav @yield('role_active')">
                                        <a href="{{url('admin/advancesetting/role')}}">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                            <span class="nav-text">Manage Role</span>
                                        </a>
                                    </li>
		                            <li class="has-subnav @yield('modules_active')">
			                            <a href="{{url('admin/advancesetting/module')}}">
			                                <i class="fa fa-bars" aria-hidden="true"></i>
			                                <span class="nav-text">Manage Module</span>
			                            </a>
		                            </li>
 	                            </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
            <div id="content">
                <header class="headernew">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="closellapsbtn">
                            <i class="bi bi-list"></i>
                            <span class="sr-only">Toggle Menu</span>
                        </button>
                        <div class="nav-header">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#" class="li bellicon"><i class="fa fa-bell-o"></i><span>3</span></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle li" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >{{ Session::get('userData')['name'] }}<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('admin/changepassword')}}">Change Password</a></li>
                                        <li role="separator" class="divider"></li>
			                            <li><a href="{{url('admin/logout')}}">Logout</a></li>
		                            </ul>
                                </li>
                            </ul>
                            <form class="header-form navbar-form navbar-right">
                                <input type="text" class="form-control" placeholder="Search...">
                            </form>
                        </div>
                    </div>
                </header>
                <div class="main-body">
                    @section('contents')
                    @show
                </div>
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <div class="modal fade popup-delate" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Are you want to delete this Record...</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn button2" data-dismiss="modal">Delete</button>
                        <button type="button" class="btn button3" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
	        (function(){
                $('#msbo').on('click', function(){
                    $('body').toggleClass('msb-x');
                });
            }());

            //click menu toggles
            $(".menu-toggle1").click(function(){
	            $("#togglePages1").toggle();
	        });
	        $(".menu-toggle2").click(function(){
	            $("#togglePages2").toggle();
	        });
	        $(".menu-toggle3").click(function(){
	            $("#togglePages3").toggle();
	        });
	        $(".menu-toggle4").click(function(){
	            $("#togglePages4").toggle();
	        });
        </script>
  	    <script type="text/javascript">
            $(document).ready(function(){
                if ($(window).width() < 767) {
				    $('.sidebar-toggle-box').click( function(){
		                $('.sidebar').slideToggle();
		            });
                }
                CKEDITOR.replace('editor', {
                    height: '300px',
                });
            });
        </script>
        <script>
            function openNav() {
                document.getElementById("mySidepanel").style.width = "350px";
            }
            function closeNav() {
                document.getElementById("mySidepanel").style.width = "0";
            }
        </script>
    </body>
</html>