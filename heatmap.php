<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="js/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="js/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="js/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="js/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="js/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="js/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="js/wow/animate.css" rel="stylesheet" media="all">
    <link href="js/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="js/slick/slick.css" rel="stylesheet" media="all">
    <link href="js/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="js/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                          <div class="icon">
                            <i class="zmdi zmdi-eye zmdi-hc-4x"></i>
                          </div>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="heatmap.php">
                                <i class="fas fa-chart-bar"></i>Heatmap</a>
                        </li>
                        <li>
                            <a href="Events.php">
                                <i class="fas fa-table"></i>Events</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <div class="icon">
                       <i class="zmdi zmdi-eye md-48"></i>
                    </div>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="heatmap.php">
                                <i class="fas fa-chart-bar"></i>Heatmap</a>
                        </li>
                        <li>
                            <a href="events.php">
                                <i class="fas fa-table"></i>Events</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-fire"></i>
                                            </div>
                                            <div class="text">
                                                <span>Heatmap</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4">
                                              <div class="heatmap"></div>
                                            </canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-label"></i>
                                            </div>
                                            <div class="text">
                                                <span>Sensors</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart5"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="js/bootstrap-4.1/popper.min.js"></script>
    <script src="js/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="js/slick/slick.min.js">
    </script>
    <script src="js/wow/wow.min.js"></script>
    <script src="js/animsition/animsition.min.js"></script>
    <script src="js/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="js/counter-up/jquery.waypoints.min.js"></script>
    <script src="js/counter-up/jquery.counterup.min.js">
    </script>
    <script src="js/circle-progress/circle-progress.min.js"></script>
    <script src="js/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="js/chartjs/Chart.bundle.min.js"></script>
    <script src="js/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
