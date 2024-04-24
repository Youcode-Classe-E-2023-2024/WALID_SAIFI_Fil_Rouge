<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('dashbord/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashbord/vendors/base/vendor.bundle.base.css') }}">

    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('dashbord/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('dashbord/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('dashbord/images/favicon.png')}}" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <div class="navbar-brand brand-logo" style="width: 40px; height: 60px;">
                <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('dashbord/images/shopabda.png')}}" alt="logo"/></a>
                </div>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-sort-variant"></span>
                </button>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown me-1">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">

                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="{{ asset('dashbord/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal"> Johnson
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    Upcoming board meeting
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown me-4">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="mdi mdi-bell mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-success">
                                    <i class="mdi mdi-information mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">Application Error</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Just now
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-warning">
                                    <i class="mdi mdi-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">Settings</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Private message
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-info">
                                    <i class="mdi mdi-account-box mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">New user registration</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    2 days ago
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item nav-profile dropdown">
                    <?php
                        $user = Auth::user();
                        ?>
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        @if($user->image)
                        <img src="{{ asset('images/'.$user->image)}}" alt="profile"/>
                        @else
                            <img src="{{ asset('images/profiel.webp')}}" alt="profile"/>
                        @endif
                        @if($user->name && $user->prenom)
                            <span class="nav-profile-name">{{ $user->name . " " . $user->prenom }}</span>
                        @else
                            <span class="nav-profile-name">{{ $user->email }}</span>
                        @endif


                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                        <form action="{{ route('user.deconnecter') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="mdi mdi-logout text-primary"></i>
                                Déconnexion
                            </button>
                        </form>

                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Admin.dashboard')}}">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('validation') }}">
                        <i class="mdi mdi-view-headline menu-icon"></i>
                        <span class="menu-title">Validation des Vendeurs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.index')}}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Gestion des catégories</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link"  href="{{route('indexMessage')}}" >
                        <i class="mdi mdi-tooltip-text menu-icon"></i>
                        <span class="menu-title ">Message</span>
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link"  href="{{route('profiel')}}" >
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">Modifier mon profiel</span>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- partial -->

                <div class="main-panel" >
                    <div class="content-wrapper" >
                        <div class="row" >


                                @yield('content')

                            </div>
                        </div>
                    </div>


                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script src="{{ asset('dashbord/vendors/base/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('dashbord/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('dashbord/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('dashbord/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('dashbord/js/off-canvas.js')}}"></script>
    <script src="{{ asset('dashbord/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('dashbord/js/template.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('dashbord/js/dashboard.js')}}"></script>
    <script src="{{ asset('dashbord/js/data-table.js')}}"></script>
    <script src="{{ asset('dashbord/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('dashbord/js/dataTables.bootstrap4.js')}}"></script>
    <!-- End custom js for this page-->

    <script src="{{ asset('dashbord/js/jquery.cookie.js')}}" type="text/javascript"></script>





    <script src="{{ asset('dashbord/js/chart.js')}}"></script>
    <script src="{{ asset('dashbord/js/file-upload.js')}}"></script>
</body>

</html>

