<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css"> <!-- Link to your CSS file for styling -->
</head>
<body>
    <div class="cart-container">
        <h1>Shopping Cart</h1>
        <div class="cart-items">
            <?php
            session_start();
            include '../includes/connection.php';

            if (isset($_SESSION['customerID'])) {
                $customerID = $_SESSION['customerID'];
                $stmt = $pdo->prepare("SELECT * FROM cart WHERE customerID = ?");
                $stmt->execute([$customerID]);
                $cartItems = $stmt->fetchAll();

                if ($cartItems) {
                    foreach ($cartItems as $item) {
                        $productID = $item['productID'];
                        $stmt = $pdo->prepare("SELECT * FROM product WHERE productID = ?");
                        $stmt->execute([$productID]);
                        $product = $stmt->fetch();
                        ?>
                        <div class="cart-item">
                            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['productName']; ?>">
                            <div class="item-details">
                                <h3><?php echo $product['productName']; ?></h3>
                                <p>Price: $<?php echo $product['price']; ?></p>
                                <p>Quantity: <?php echo $item['quantity']; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Your cart is empty.</p>";
                }
            } else {
                echo "<p>Please log in to view your cart.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
