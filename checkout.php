<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Include Bootstrap and other stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Include any other CSS files you need -->

    <style>
        /* Add custom styles here */
        .order-summary {
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
    </style>
</head>

<body>
    <div class="container">
        <br><br>
        <h2 class="mb-4"><i class="fas fa-shopping-cart"></i> Checkout</h2>

        <!-- Shipping Information Form -->
        <form method="POST" action="place_order.php" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Shipping Address</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <!-- Payment Method Radio Buttons -->
            <div class="mb-3">
                <label for="payment" class="form-label">Payment Method :</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="cashOnDelivery" value="Cash on Delivery" checked>
                    <label class="form-check-label" for="cashOnDelivery">Cash On Delivery</label>
                </div>
                <div class="text-center mt-3">
                    <p class="alert alert-success" style="font-weight: bold; font-size: 24px;">Free Home Delivery!!!</p>
                </div>


            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Place Order</button>
            </div>
        </form>
        <br>
        <!-- Order Summary -->
        <div class="order-summary">
            <h3>Order Summary</h3>
            <?php
            // Start the session to access the cart data
            session_start();

            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                // Calculate the total price of the items in the cart
                $totalPrice = 0;
                echo '<ol>';
                foreach ($_SESSION['cart'] as $product) {
                    echo '<li>' . $product['product_name'] . ' - Rs.' . $product['product_price'] . ' x ' . $product['quantity'] . '</li>';
                    $totalPrice += $product['product_price'] * $product['quantity'];
                }
                echo '</ol>';
                echo '<p>Total Price: Rs.' . $totalPrice . '</p>';
            } else {
                echo '<p>Your cart is empty.</p>';
            }
            ?>
        </div>
        <div class="text-center mt-4" style="padding-bottom: 20px;">
            <a href="cart.php" class="btn btn-primary">View Cart</a>
        </div>


    </div>
    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var address = document.getElementById('address').value;
            var phone = document.getElementById('phone').value;
            var email = document.getElementById('email').value;

            // Validate Name (should not be empty)
            if (name.trim() === '') {
                alert('Please enter your name.');
                return false;
            }

            // Validate Address (should not be empty)
            if (address.trim() === '') {
                alert('Please enter your shipping address.');
                return false;
            }

            // Validate Phone Number (should be numeric and 10 digits)
            if (phone.trim() === '' || isNaN(phone) || phone.length !== 10) {
                alert('Please enter a valid 10-digit phone number.');
                return false;
            }

            // Validate Email (should be in a valid email format)
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email.trim() === '' || !emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }
            alert('Your order is placed!! Thank you!');
            return true; // Form is valid, allow submission
        }
    </script>
    <!-- Include Bootstrap and other scripts -->
    <script src="https://ajax.googleapis.com/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include any other JavaScript files you need -->
</body>

</html>