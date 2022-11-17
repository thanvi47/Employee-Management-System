<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> EMS - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('templates/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('templates/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">EMS Admin <sup>giot</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        @if(isset(auth()->user()->role->permissions['name']['department']['can-view']))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Departments</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
{{--                    <h6 class="collapse-header">Custom Components:</h6>--}}
                    @if(isset(auth()->user()->role->permissions['name']['department']['can-add']))
                    <a class="collapse-item" href="{{route('department.create')}}">Create Department</a>
                    @endif
                    @if(isset(auth()->user()->role->permissions['name']['department']['can-view']))
                        <a class="collapse-item" href="{{route('department.index')}}">View Department</a>
                    @endif
                </div>
            </div>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-power-off"></i>
                <span>Roles Permission</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
{{--                    <h6 class="collapse-header">Custom Components:</h6>--}}
                    @if(isset(auth()->user()->role->permissions['name']['role']['can-add']))
                    <a class="collapse-item" href="{{route('role.create')}}">Create Role</a>
                    @endif
                    @if(isset(auth()->user()->role->permissions['name']['department']['can-view']))
                    <a class="collapse-item" href="{{route('role.index')}}">View Role</a>
                    @endif
                    @if(isset(auth()->user()->role->permissions['name']['permission']['can-add']))
                    <a class="collapse-item" href="{{route('permission.create')}}">Create Permission</a>
                    @endif
                    @if(isset(auth()->user()->role->permissions['name']['permission']['can-view']))
                    <a class="collapse-item" href="{{route('permission.index')}}">View Permission</a>
                    @endif
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        @if(isset(auth()->user()->role->permissions['name']['user']['can-view']))
            <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-users"></i>

                <span>Employees</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Employees</h6>
                    @if(isset(auth()->user()->role->permissions['name']['user']['can-add']))
                    <a class="collapse-item" href="{{route('user.create')}}">User Create</a>
                    @endif
                    @if(isset(auth()->user()->role->permissions['name']['user']['can-view']))
                    <a class="collapse-item" href="{{route('user.index')}}">All User</a>
                    @endif
{{--                    <a class="collapse-item" href="utilities-animation.html">Animations</a>--}}
{{--                    <a class="collapse-item" href="utilities-other.html">Other</a>--}}
                </div>
            </div>
        </li>
        @endif

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"--}}
{{--               aria-expanded="true" aria-controls="collapsePages">--}}
{{--                <i class="fas fa-fw fa-folder"></i>--}}
{{--                <span>Pages</span>--}}
{{--            </a>--}}
{{--            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Login Screens:</h6>--}}
{{--                    <a class="collapse-item" href="login.html">Login</a>--}}
{{--                    <a class="collapse-item" href="register.html">Register</a>--}}
{{--                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>--}}
{{--                    <div class="collapse-divider"></div>--}}
{{--                    <h6 class="collapse-header">Other Pages:</h6>--}}
{{--                    <a class="collapse-item" href="404.html">404 Page</a>--}}
{{--                    <a class="collapse-item" href="blank.html">Blank Page</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}

        <!-- Nav Item - Charts -->
        @if(isset(auth()->user()->role->permissions['name']['leave']['can-list']))
        <li class="nav-item">
            <a class="nav-link" href="{{route('leave.index')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Staff Leave Request</span></a>
        </li>
        @endif
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('leave.create')}}">
                <i class="fas fa-fw fa-pencil-alt"></i>
                <span>Create Leave</span></a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{route('notice.index')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>All Notice</span></a>
        </li>
        @if(isset(auth()->user()->role->permissions['name']['notice']['can-add']))
        <li class="nav-item">
            <a class="nav-link" href="{{route('notice.create')}}">
                <i class="fas fa-fw fa-pen"></i>
                <span>Create Notice</span></a>
        </li>
        @endif
        @if(isset(auth()->user()->role->permissions['name']['mail']['can-add']))
        <li class="nav-item">
            <a class="nav-link" href="{{route('mail.create')}}">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Mail </span></a>
        </li>
        @endif

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->
        <div class="sidebar-card d-none d-lg-flex">
            <img class="sidebar-card-illustration mb-2" src="{{asset('templates/img/undraw_rocket.svg')}}" alt="...">
{{--            <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>--}}
{{--            <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>--}}
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->

