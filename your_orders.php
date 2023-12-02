<?php
include("./connection/connect.php");
error_reporting(0);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Your Orders - Worldwide Agro Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Poppins:wght@200;600;700&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <style>
        #logo {
            max-height: 60px;
            max-width: 100%;
        }

        body {
            background-image: url("./img/bg.png");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a href="index.php" class="navbar-brand">
                    <img src="./img/logo.png" alt="Logo" id="logo" />
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <li class="nav-item"><a href="index.php" class="nav-item nav-link">Home</a></li>
                        <?php
                        if (empty($_SESSION["user_id"])) // if the user is not logged in
                        {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a></li>
                                  <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a></li>';
                        } else {
                            echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
                            echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Content Start -->
    <div class="container mt-5">
        <?php
        if (isset($_SESSION['user_id'])) {
            // Retrieve the user's name from the database based on user_id
            $user_id = $_SESSION['user_id'];
            $query = "SELECT f_name, l_name FROM users WHERE u_id = $user_id";
            $result = mysqli_query($db, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                $firstname = $user['f_name'];
                $lastname = $user['l_name'];
                echo '<h4>Welcome, ' . $firstname . ' ' . $lastname . '!</h4>';
            } else {
                // Handle the case where the user's name could not be retrieved
                echo '<h4>Welcome, User!</h4>'; // Provide a default welcome message
            }
        } else {
            echo '<h4>Welcome, Guest!</h4>'; // Display a default welcome message for guests
        }
        ?>
        <h2>My Orders</h2>
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
                <button class="btn btn-primary mt-4" onclick="filterOrders()">Filter</button>
            </div>
        </div>

        <table id="order_table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.No.</th>
                    <th>Order Date</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user_id = $_SESSION['user_id'];

                // Modify your SQL query to join 'orders' and 'order_items' tables
                $query = "SELECT orders.order_date, order_items.product_name, order_items.quantity, orders.total_price
                          FROM orders
                          INNER JOIN order_items ON orders.order_id = order_items.order_id
                          WHERE orders.user_id = '$user_id'
                          ORDER BY orders.order_date DESC";

                $data = mysqli_query($db, $query);
                $total = mysqli_num_rows($data);

                if ($total != 0) {
                    $serialNumber = 1; // Initialize serial number counter
                    while ($result = mysqli_fetch_assoc($data)) {
                        echo
                        "<tr>
                                <td>" . $serialNumber++ . "</td> 
                                <td>" . $result['order_date'] . "</td>
                                <td>" . $result['product_name'] . "</td>
                                <td>" . $result['quantity'] . "</td>
                                <td>Rs." . $result['total_price'] . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No order history available.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Content End -->

    <!-- Include the necessary scripts here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
    function filterOrders() {
        var startDate = new Date($('#start_date').val());
        var endDate = new Date($('#end_date').val());

        // Loop through each row in the table
        $('#order_table tbody tr').each(function() {
            var orderDateStr = $(this).find('td:eq(1)').text(); // Assuming date is in the second column
            var orderDate = new Date(orderDateStr);

            // Check if the date is valid and within the selected range
            if (!isNaN(orderDate.getTime()) && orderDate >= startDate && orderDate <= endDate) {
                $(this).show(); // Show rows within the selected date range
            } else {
                $(this).hide(); // Hide rows outside the selected date range
            }
        });
    }
</script>


</body>

</html>