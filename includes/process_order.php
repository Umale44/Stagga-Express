<?php
session_start();
include 'connection.php'; // Include the database connection file
include 'Customer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['customer']) && !empty($_SESSION['customer'])) {
        $serializedCustomer = $_SESSION['customer'];
        $customer = unserialize($serializedCustomer);
        $customerID = $customer->getCustomerID();
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phonenumber = $_POST['phone'];
        $card_number = $_POST['cardnumber']; 
        $expiry_date = $_POST['expiry']; 
        $cc = $_POST['cc']; 
        $orderDate = date('Y-m-d H:i:s');
    
    // Insert order into the orders table
    $stmt = $pdo->prepare("INSERT INTO orders (customerID, fullname, email, address, phonenumber, orderDate, deliverystatus) 
                           VALUES (?, ?, ?, ?, ?, ?, 'Pending')");
    $stmt->execute([$customerID, $fullname, $email, $address, $phonenumber, $orderDate]);

    // Get the last inserted order ID
    $orderID = $pdo->lastInsertId();

    // Retrieve cart items and storeID from the product table
    $stmt = $pdo->prepare("SELECT c.productID, c.quantity, p.storeID
                           FROM cart c
                           INNER JOIN product p ON c.productID = p.productID
                           WHERE c.customerID = ?");
    $stmt->execute([$customerID]);
    $cartItems = $stmt->fetchAll();

    // Insert each cart item into the order_details table
    foreach ($cartItems as $item) {
        $productID = $item['productID'];
        $quantity = $item['quantity'];
    
        // Retrieve the price from the product table
        $stmt = $pdo->prepare("SELECT price FROM product WHERE productID = ?");
        $stmt->execute([$productID]);
        $product = $stmt->fetch();
    
        // Calculate the totalAmount for the current item
        $totalAmount = $product['price'] * $quantity;
    
        // Retrieve the storeID from the product table
        $stmt = $pdo->prepare("SELECT storeID FROM product WHERE productID = ?");
        $stmt->execute([$productID]);
        $product = $stmt->fetch();
        $storeID = $product['storeID'];
    
        // Insert the order details into the order_details table
        $stmt = $pdo->prepare("INSERT INTO order_details (orderID, productID, totalAmount, quantity, storeID) 
                               VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$orderID, $productID, $totalAmount, $quantity, $storeID]);

    }
    
    // Clear the cart for this customer
    $stmt = $pdo->prepare("DELETE FROM cart WHERE customerID = ?");
    $stmt->execute([$customerID]);

        echo '<script>alert("Order placed successfully. Your order is currently being processed"); window.location = "../customer-acc/home.php";</script>';
    exit(); // Prevent further execution
}
}
?>
