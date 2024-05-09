<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagga Express | The Home of express delivery | My Shopping Cart</title>
    <link rel="icon" href="staggalogosmall.png"
		type="image/x-icon">
    <link rel="stylesheet" href="cart.css"> <!-- Link to your CSS file for styling -->
    
</head>
<body>
    <div class="cart-container">
        <h1>Shopping Cart</h1>
        <div class="cart-items">
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
                    <p>Price: P<?php echo $product['price']; ?></p>
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
