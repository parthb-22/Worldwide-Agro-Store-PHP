<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Find the product in the cart and update its quantity or remove it
    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['product_id'] === $product_id) {
            if ($product['quantity'] > 1) {
                // If the quantity is greater than 1, decrement it
                $_SESSION['cart'][$key]['quantity'] -= 1;
            } else {
                // If the quantity is 1, remove the product from the cart
                unset($_SESSION['cart'][$key]);
            }
            break; // Stop searching after finding the product
        }
    }
}

header('Location: cart.php'); // Redirect back to the cart page
?>
