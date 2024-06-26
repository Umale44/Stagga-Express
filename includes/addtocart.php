<?php
session_start();
include 'connection.php';
include '../customer-acc/markham.php';
include 'Customer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['customer']) && !empty($_SESSION['customer'])) {
        $serializedCustomer = $_SESSION['customer'];
        $customer = unserialize($serializedCustomer);
        $customerID = $customer->getCustomerID();

        $productID = $_POST['productID'];
        $productImage = $_POST['productImage'];
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productQuantity = $_POST['quantity'];

        // Add the product to the cart
        $stmt = $pdo->prepare("INSERT INTO cart (customerID, productID, price, quantity, totalAmount) VALUES (?, ?, ?, ?, 1.00)");
        $stmt->execute([$customerID, $productID, $productPrice, $productQuantity]);

        //Reduce number in stock
        $stmt = $pdo->prepare("UPDATE stock SET quantity = quantity - ? WHERE productID = ?");
        $stmt->execute([$productQuantity, $productID]);
        

        echo '<script>alert("Product added to cart."); window.history.back();</script>';
    } else {
        echo '<script>alert("Please login to add product into cart."); window.history.back();</script>';
    }
    
}
?>

