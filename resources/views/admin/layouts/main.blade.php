<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Moja Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style (2).css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo me-5" href="{{route('admin.dashboard')}}">
                <H4>AdminDashboard</H4>
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{route('admin.dashboard')}}">
                <H6>AdminDashboard</H6>
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="ti-view-list"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">

                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <img src="../../images/faces/propic.jpg" alt="profile" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a href="{{Route('logout')}}" class="dropdown-item">
                            <i class="ti-power-off text-primary"></i>

                            Logout
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="ti-view-list"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">
                        <i class=" ti-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.profile')}}">
                        <i class="ti-shield menu-icon"></i>
                        <span class="menu-title">Admin Profile </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <i class="ti-user menu-icon"></i>
                        <span class="menu-title">Users</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('admin.users.all')}}">All User</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('admin.users.premium')}}">Premium
                                    User</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('admin.users.admin')}}">Admin</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{route('admin.users.production')}}">Production House</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('MovieList')}}">
                        <i class="ti-video-clapper  menu-icon"></i>
                        <span class="menu-title">Movies</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Statistics')}}">
                        <i class=" ti-stats-up   menu-icon"></i>
                        <span class="menu-title">statistics </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.payment')}}">
                        <i class="ti-video-clapper  menu-icon"></i>
                        <span class="menu-title">Payment History</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('report')}}">
                        <i class="ti-clipboard  menu-icon"></i>
                        <span class="menu-title">Reports</span>
                    </a>
                </li>


                
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="font-weight-bold mb-0">Moja Admin Dashboard</h4>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    
                    
                   
                   
                </div>
                @yield('content')
            </div>

        </div>
    </div>

    </div>
    <!-- main-panel ends -->

    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="../../vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <script src="../../js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../js/dashboard.js"></script>
    <!-- End custom js for this page-->

</body>

</html>