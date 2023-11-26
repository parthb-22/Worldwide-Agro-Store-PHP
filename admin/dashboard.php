<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
// error_reporting(0);
session_start();
if (empty($_SESSION["adm_id"])) {
    header('location:index.php');
} else {
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Admin Dashboard</title>
        <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <style>
            #logo {
                /* position: absolute; */
                /* left: 0px; */
                max-height: 60px;
                max-width: 100%;
                /* margin-top: 30px; */
            }

            * {
                background-image: url('../img/bg.png');
            }
        </style>
    </head>

    <body class="fix-header">

        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>

        <div id="main-wrapper">

            <div class="header">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">

                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="dashboard.php">
                            <span><img src="../img/logo.png" alt="homepage" class="dark-logo" id="logo" /></span>
                        </a>

                    </div>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-block;"><img src="../img/admin-icon.png" alt="user" class="profile-pic" /></a>
                        <h3 style="display: inline;"><b>Welcome Adarsh Pawar!</b></h3>

                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>

                        </div>
                    </li>
                </nav>

            </div>


            <div class="left-sidebar">

                <div class="scroll-sidebar">

                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-devider"></li>
                            <li class="nav-label">Home</li>
                            <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
                            </li>
                            <li class="nav-label">Log</li>
                            <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>

                            <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                            <li> <a href="all_contact_forms.php"><i class="fa fa-address-book" aria-hidden="true"></i><span>Contact Forms</span></a></li>

                        </ul>
                    </nav>

                </div>

            </div>

            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Admin Dashboard</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-users f-s-40"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2>
                                                    <?php
                                                    $userSql = "SELECT * FROM users";
                                                    $userResult = mysqli_query($db, $userSql);
                                                    $userCount = mysqli_num_rows($userResult);
                                                    echo $userCount;
                                                    ?>
                                                </h2>
                                                <p class="m-b-0">Users</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Total Orders Card -->
                                <div class="col-md-3">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-shopping-cart f-s-40"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2>
                                                    <?php
                                                    $orderSql = "SELECT COUNT(*) AS totalOrders FROM orders";
                                                    $orderResult = mysqli_query($db, $orderSql);
                                                    $orderCount = mysqli_fetch_assoc($orderResult)['totalOrders'];
                                                    echo $orderCount;
                                                    ?>
                                                </h2>
                                                <p class="m-b-0">Total Orders</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Total Earnings Card -->
                                <div class="col-md-3">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-money f-s-40"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2>
                                                    <?php
                                                    $earningsSql = "SELECT SUM(total_price) AS totalEarnings FROM orders";
                                                    $earningsResult = mysqli_query($db, $earningsSql);
                                                    $earnings = mysqli_fetch_assoc($earningsResult)['totalEarnings'];
                                                    echo 'Rs. ' . number_format($earnings, 2); // Display earnings formatted as currency
                                                    ?>
                                                </h2>
                                                <p class="m-b-0">Total Earnings</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Total Contact Forms Card -->
                                <div class="col-md-3">
                                    <div class="card p-30">
                                        <div class="media">
                                            <div class="media-left meida media-middle">
                                                <span><i class="fa fa-address-book f-s-40"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2>
                                                    <?php
                                                    $contactFormsSql = "SELECT COUNT(*) AS totalContactForms FROM contact";
                                                    $contactFormsResult = mysqli_query($db, $contactFormsSql);
                                                    $contactFormsCount = mysqli_fetch_assoc($contactFormsResult)['totalContactForms'];
                                                    echo $contactFormsCount;
                                                    ?>
                                                </h2>
                                                <p class="m-b-0">Total Contact Forms</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="js/lib/jquery/jquery.min.js"></script>
            <script src="js/lib/bootstrap/js/popper.min.js"></script>
            <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
            <script src="js/jquery.slimscroll.js"></script>
            <script src="js/sidebarmenu.js"></script>
            <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
            <script src="js/custom.min.js"></script>


    </body>

</html>
<?php
}
?>