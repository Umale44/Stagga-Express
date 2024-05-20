<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagga Express | Store Orders</title>
    <link rel="stylesheet" href="../customer-acc/cart.css"> 
</head>
<body>
    <div class="main-container">
        <h1>Store Orders</h1>
        <div class="cart-items">
            <?php
            session_start();
            include '../includes/connection.php';
            include '../includes/Seller.php';
            if (isset($_SESSION['store']) && !empty($_SESSION['store'])) {
                $serializedSeller = $_SESSION['store'];
                $seller = unserialize($serializedSeller);
                $storeID = $seller->getStoreID();

                $stmt = $pdo->prepare("SELECT o.orderID, o.orderDate, SUM(od.totalAmount) AS totalAmount, o.fullname, 
                        o.address, o.phonenumber, o.email, GROUP_CONCAT(CONCAT(p.productName, ' (Quantity: ', od.quantity, ')') SEPARATOR ' | ') AS products,
                        o.deliverystatus
                        FROM orders o
                        JOIN order_details od ON o.orderID = od.orderID
                        JOIN product p ON od.productID = p.productID
                        WHERE od.storeID = ?
                        GROUP BY o.orderID, o.orderDate, o.fullname, o.address, o.phonenumber, o.email");
$stmt->execute([$storeID]);
$orders = $stmt->fetchAll();

if ($orders) {
    foreach ($orders as $order) {
        echo "<div class='cart-item'>";
        echo "<div class='item-details'>";
        echo "<p>Order ID: {$order['orderID']}</p>";
        echo "<p>Date: {$order['orderDate']}</p>";
        echo "<p>Customer Name: {$order['fullname']}</p>";
        echo "<p>Address: {$order['address']}</p>";
        echo "<p>Phone Number: {$order['phonenumber']}</p>";
        echo "<p>Email: {$order['email']}</p>";
        echo "<p>Products: {$order['products']}</p>";
        echo "<p>Total Amount: P" . number_format($order['totalAmount'], 2) . "</p>";
        echo "<p>Delivery Status: {$order['deliverystatus']}</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p>No orders have been placed to your store yet.</p>";
}


            } else {
                echo "<p>Please log in to view store orders.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
