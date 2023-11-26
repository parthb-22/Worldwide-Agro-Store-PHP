    <?php
    include("./connection/connect.php");
    // error_reporting(0);
    // Start the session
    session_start();

    // Include your database connection code

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            // Retrieve user information from the form
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $payment = $_POST['payment'];

            // Get user ID from your session or user authentication process
            $user_id = $_SESSION['user_id'];

            // Calculate the total price of the items in the cart
            $totalPrice = 0;
            foreach ($_SESSION['cart'] as $product) {
                $totalPrice += $product['product_price'] * $product['quantity'];
            }

            // Prepare the INSERT query using prepared statements
            $insertOrderQuery = "INSERT INTO orders (user_id, name, address, phone, email,total_price) VALUES (?, ?, ?, ?, ?, ?)";

            // Create a prepared statement
            $stmt = $db->prepare($insertOrderQuery);

            // Bind parameters and execute the query
            $stmt->bind_param("issssd", $user_id, $name, $address, $phone, $email, $totalPrice);

            if ($stmt->execute()) {
                // Get the auto-generated order ID
                $order_id = $stmt->insert_id;

                // Insert each item into the "order_items" table
                foreach ($_SESSION['cart'] as $product) {
                    $product_id = $product['product_id'];
                    $product_name = $product['product_name'];
                    $quantity = $product['quantity'];

                    // Prepare the INSERT query for order items
                    $insertOrderItemsQuery = "INSERT INTO order_items (order_id, product_id, product_name, quantity) VALUES (?, ?, ?, ?)";

                    // Create a new prepared statement for order items
                    $stmt2 = $db->prepare($insertOrderItemsQuery);

                    // Check if the statement was prepared successfully
                    if ($stmt2) {
                        // Bind parameters and execute the query for order items
                        $stmt2->bind_param("iisi", $order_id, $product_id, $product_name, $quantity);
                        $stmt2->execute();
                        $stmt2->close();
                    } else {
                        echo "Error preparing the statement for order items.";
                    }
                }

                // Clear the shopping cart (remove items from the session)
                unset($_SESSION['cart']);

                // Redirect the user to a thank you or order confirmation page
                header('Location: your_orders.php');
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            echo "Your cart is empty.";
        }
    }

    // Close the database connection
    $db->close();
    ?>
