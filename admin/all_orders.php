<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if (empty($_SESSION["adm_id"])) {
    header('location:index.php');
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>All Orders</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom Styles -->
        <style>
            #logo {
                max-height: 60px;
                max-width: 100%;
            }

            * {
                background-image: url('../img/bg.png');
            }

            .table-responsive.m-t-40 {
                margin-bottom: 20px;
                /* Adjust margin as needed */
            }
        </style>
    </head>

    <body class="fix-header fix-sidebar">
        <!-- Your navbar and sidebar content here -->
        
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="m-b-0" style="text-align: center;">All Orders</h4>
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Order No.</th>
                                                <th>Customer Name</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Address</th>
                                                <th>Phone no</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 1; // Initialize the counter
                                            $sql = "SELECT orders.name AS username, order_items.product_name AS title, order_items.quantity, orders.total_price AS price, orders.address, orders.phone, orders.order_date AS date, orders.status AS status
                                                FROM orders
                                                INNER JOIN order_items ON orders.order_id = order_items.order_id";

                                            $query = mysqli_query($db, $sql);

                                            if (!$query || mysqli_num_rows($query) <= 0) {
                                                echo '<tr><td colspan="8"><center>No Orders</center></td></tr>';
                                            } else {
                                                while ($rows = mysqli_fetch_array($query)) {
                                                    // Adjust Action column data based on status
                                                    $status = $rows['status'];
                                                    $buttonClass = '';
                                                    $buttonText = '';
                                                    if ($status == "" or $status == "NULL") {
                                                        $buttonClass = 'btn btn-info';
                                                        $buttonText = 'Dispatch';
                                                    } else if ($status == "in process") {
                                                        $buttonClass = 'btn btn-warning';
                                                        $buttonText = 'On The Way!';
                                                    } else if ($status == "closed") {
                                                        $buttonClass = 'btn btn-primary';
                                                        $buttonText = 'Delivered';
                                                    } else if ($status == "rejected") {
                                                        $buttonClass = 'btn btn-danger';
                                                        $buttonText = 'Cancelled';
                                                    }
                                            ?>
                                                    <tr>
                                                        <td><?php echo $counter; ?></td>
                                                        <td><?php echo $rows['username']; ?></td>
                                                        <td><?php echo $rows['title']; ?></td>
                                                        <td><?php echo $rows['quantity']; ?></td>
                                                        <td>Rs.<?php echo $rows['price']; ?></td>
                                                        <td><?php echo $rows['address']; ?></td>
                                                        <td><?php echo $rows['phone']; ?></td>
                                                        <td><?php echo $rows['date']; ?></td>
                                                        <td><?php echo $rows['status']; ?></td>
                                                        <!-- Action button based on status -->


                                                    </tr>
                                            <?php
                                                    $counter++;
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button id="redirectButton" class="btn btn-primary mt-3">Go to Dashboard</button>
            </div>
        </div>
        <script>
            // JavaScript for redirection
            document.getElementById("redirectButton").onclick = function() {
                window.location.href = "dashboard.php";
            };
        </script>
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