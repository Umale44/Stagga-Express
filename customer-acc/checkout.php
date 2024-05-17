<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagga Express | The Home of express delivery | Checkout</title>
    <link rel="icon" href="staggalogosmall.png"
		type="image/x-icon">
    <link rel="stylesheet" href="checkout.css"> <!-- Link to your CSS file for styling -->
</head>
<body>
    <div class="main-container">
        <h1>Checkout</h1>
        <?php
            include '../includes/Customer.php';
            session_start();
            include '../includes/connection.php';

            if (isset($_SESSION['customer']) && !empty($_SESSION['customer'])) {
                $serializedCustomer = $_SESSION['customer'];
                $customer = unserialize($serializedCustomer);
                $customerID = $customer->getCustomerID();

                $stmt = $pdo->prepare("SELECT * FROM cart WHERE customerID = ?");
                $stmt->execute([$customerID]);
                $cartItems = $stmt->fetchAll();

                if ($cartItems) {
                    $totalAmount = 0; // Initialize total amount
                    foreach ($cartItems as $item) {
                        $productID = $item['productID'];
                        $stmt = $pdo->prepare("SELECT * FROM product WHERE productID = ?");
                        $stmt->execute([$productID]);
                        $product = $stmt->fetch();

                        $subtotal = $product['price'] * $item['quantity'];
                        $totalAmount += $subtotal; // Add subtotal to total amount

                        // Display cart item
                        echo "<div class='cart-item'>";
                        echo "<img src='../{$product['image']}' alt='{$product['productName']}'>";
                        echo "<div class='item-details'>";
                        echo "<h3>{$product['productName']}</h3>";
                        echo "<p>Price: P" . number_format($product['price'], 2) . "</p>";
                        echo "<p>Quantity: {$item['quantity']}</p>";
                        echo "<p>Subtotal: P" . number_format($subtotal, 2) . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }

                    // Display total amount
                    echo "<h2>Total Amount: P" . number_format($totalAmount, 2) . "</h2>";
                } else {
                    echo "<p>Your cart is empty. Please add items to cart before proceeding</p>";
                }
            } else {
                echo "<p>Please log in to view your cart.</p>";
            }
        ?>
        <form action="../includes/process_order.php" method="post">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>
            <label for="cardnumber">Card Number:</label>
            <input type="text" id="cardnumber" name="cardnumber" required>
            <label for="expiry">Expiry Date:</label>
            <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>
            <label for="cc">CC (Card Code):</label>
            <input type="text" id="cc" name="cc" required>
            <button type="submit" class="submit-btn">Submit Order</button>
        </form>
    </div>
</body>
</html>
