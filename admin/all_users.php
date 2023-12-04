<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>All Users</title>
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

        table#user_table tbody tr td {
            color: black;
        }
    </style>
</head>

<body class="fix-header fix-sidebar">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">

                        <span><img src="../img/logo.png" alt="homepage" class="dark-logo" id="logo" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">




                    </ul>

                    <ul class="navbar-nav my-lg-0">



                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item dropdown">
                            <h3 style="display: inline;"><b>Welcome Adarsh Pawar!</b></h3>

                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-block;"><img src="../img/admin-icon.png" alt="user" class="profile-pic" /></a>

                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="left-sidebar">

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
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
                <div class="row">
                    <div class="col-12">

                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">All Users</h4>
                                </div>
                                <br>
                                <!-- Date Picker Inputs -->
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date">
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary mt-4" onclick="filterUsers()">Filter</button>
                                    </div>
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="user_table" class="table table-bordered table-striped table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Username</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Registration Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $sql = "SELECT * FROM users order by u_id desc";
                                            $query = mysqli_query($db, $sql);

                                            if (!mysqli_num_rows($query) > 0) {
                                                echo '<td colspan="7"><center>No Users</center></td>';
                                            } else {
                                                while ($rows = mysqli_fetch_array($query)) {



                                                    echo ' <tr><td>' . $rows['username'] . '</td>
																								<td>' . $rows['f_name'] . '</td>
																								<td>' . $rows['l_name'] . '</td>
																								<td>' . $rows['email'] . '</td>
																								<td>' . $rows['phone'] . '</td>
																								<td>' . $rows['address'] . '</td>																								
																								<td>' . $rows['date'] . '</td>
																									 </tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function filterUsers() {
            var startDateStr = $('#start_date').val();
            var endDateStr = $('#end_date').val();

            if (startDateStr === '' || endDateStr === '') {
                // Handling the case where either start date or end date is empty
                alert('Please select both start date and end date.');
                return;
            }

            var startDate = new Date(startDateStr);
            var endDate = new Date(endDateStr);

            // Loop through each row in the table
            $('#user_table tbody tr').each(function() {
                // Assuming the date is in the seventh column (index 6), modify this based on your table structure
                var registrationDateStr = $(this).find('td:eq(6)').text();
                var registrationDate = new Date(registrationDateStr);

                // Check if the date is valid and within the selected range
                if (!isNaN(registrationDate.getTime()) && registrationDate >= startDate && registrationDate <= endDate) {
                    $(this).show(); // Show rows within the selected date range
                } else {
                    $(this).hide(); // Hide rows outside the selected date range
                }
            });
        }
    </script>
    <script src="js/lib/jquery/jquery.min.js"></script>>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>


</body>

</html>