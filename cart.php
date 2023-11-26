<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Include Bootstrap and other stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Include any other CSS files you need -->

    <style>
        /* Add custom styles here */
        .product-item {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        body {
            background-image: url("./img/bg.png");
        }

        h1 {
            font-size: 36px;
            margin-bottom: 30px;
        }

        .card-title {
            font-size: 24px;
        }

        .card-text {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <br><br>
        <?php
        include("connection/connect.php");

        // Initialize the shopping cart as an array in the session
        session_start();
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            // User is not logged in, redirect to the login page with a message
            header('Location: login.php?message=Please log in to use the cart');
            exit; // Stop further execution
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Display the user's name
        if (isset($_SESSION['user_id'])) {
            // Retrieve the user's name from the database based on user_id
            $user_id = $_SESSION['user_id'];
            $query = "SELECT f_name, l_name FROM users WHERE u_id = $user_id";
            $result = mysqli_query($db, $query);
            if ($result) {
                $user = mysqli_fetch_assoc($result);
                $firstname = $user['f_name'];
                $lastname = $user['l_name'];
            } else {
                // Handle the case where the user's name could not be retrieved
                $firstname = "User"; // Provide a default name
                $lastname = "User"; // Provide a default last name
            }
        }

        echo '<h4>Welcome, ' . $firstname . ' ' . $lastname . '!</h4>';
        ?>

        <h2 class="mb-4"><i class="fas fa-shopping-cart"></i> Your Shopping Cart</h2>

        <?php
        // Check if a product was added
        if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price'])) {
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];

            // Check if this product is already in the cart
            $item_key = array_search($product_id, array_column($_SESSION['cart'], 'product_id'));

            if ($item_key !== false) {
                // If the product is already in the cart, increase its quantity
                $_SESSION['cart'][$item_key]['quantity'] += 1;
            } else {
                // If the product is not in the cart, add it
                $product = array(
                    'product_id' => $product_id,
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'quantity' => 1
                );
                $_SESSION['cart'][] = $product;
            }
        }

        // Display the shopping cart
        if (count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $key => $product) {
                echo '<div class="card product-item">';
                echo '<div class="card-body">';
                echo '<h2 class="card-title">' . $product['product_name'] . '</h2>';
                echo '<p class="card-text">Price: Rs.' . $product['product_price'] . '</p>';
                echo '<p class="card-text">Quantity: ' . $product['quantity'] . '</p>';
                // Add a delete button for each product
                echo '<form method="post" action="remove_from_cart.php">';
                echo '<input type="hidden" name="product_id" value="' . $product['product_id'] . '">';
                echo '<button type="submit" class="btn btn-danger">Remove</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No products added to the cart.</p>';
        }
        ?>

        <!-- "Continue Shopping" link -->
        <div class="text-center mt-4 mt-4 mb-4">
            <a href="product.php" class="btn btn-primary mx-2">Continue Shopping</a>
            <a href="checkout.php" class="btn btn-success mx-2" style="background-color: #4CAF50; color: white;">Checkout</a>
        </div>
    </div>

    <!-- Include Bootstrap and other scripts -->
    <script src="https://ajax.googleapis.com/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include any other JavaScript files you need -->
</body>

</html>