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
    <title>All Contact Forms</title>
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

        table#myTable tbody tr td {
            color: black;
        }

        .row.mb-3 {
            margin-bottom: 20px;
        }

        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
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
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-block;"><img src="../img/admin-icon.png" alt="user" class="profile-pic" /></a>
                            <h3 style="display: inline;"><b>Welcome Adarsh Pawar!</b></h3>
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
                                    <h4 class="m-b-0 text-white">All Contact Forms</h4>
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
                                        <button class="btn btn-primary mt-4" onclick="filterForms()">Filter</button>
                                    </div>
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Contact Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $sql = "SELECT * FROM contact";
                                            $query = mysqli_query($db, $sql);

                                            if (!mysqli_num_rows($query) > 0) {
                                                echo '<td colspan="7"><center>No Forms</center></td>';
                                            } else {
                                                while ($rows = mysqli_fetch_array($query)) {



                                                    echo ' <tr><td>' . $rows['your_name'] . '</td>
																								<td>' . $rows['your_email'] . '</td>
																								<td>' . $rows['your_subject'] . '</td>
																								<td>' . $rows['your_message'] . '</td>
																								<td>' . $rows['contact_date'] . '</td>
																	
																									 <td><a href="delete_form.php?form_del=' . $rows['your_email'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
																									</td></tr>';
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

    </div>

    </div>
    <script>
        function filterForms() {
            var startDateStr = $('#start_date').val();
            var endDateStr = $('#end_date').val();

            if (startDateStr === '' || endDateStr === '') {
                alert('Please select both start date and end date.');
                return;
            }

            var startDate = new Date(startDateStr);
            var endDate = new Date(endDateStr);

            $('#myTable tbody tr').each(function() {
                var dateStr = $(this).find('td:eq(4)').text(); // Adjust the index (4) based on your table structure
                var formDate = new Date(dateStr);

                if (!isNaN(formDate.getTime()) && formDate >= startDate && formDate <= endDate) {
                    $(this).show();
                } else {
                    $(this).hide();
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