<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['customerID'])) {
        $customerID = $_SESSION['customerID'];
        $productID = $_POST['productId'];

        // Check if the product is already in the cart
        $stmt = $pdo->prepare("SELECT * FROM cart WHERE customerID = ? AND productID = ?");
        $stmt->execute([$customerID, $productID]);
        $existingItem = $stmt->fetch();

        if (!$existingItem) {
            // Add the product to the cart
            $stmt = $pdo->prepare("INSERT INTO cart (customerID, productID, quantity) VALUES (?, ?, 1)");
            $stmt->execute([$customerID, $productID]);
            echo '<script>alert("success."); window.history.back();</script>';
        } else {
            echo '<script>alert("Product already in cart."); window.history.back();</script>';
        }
    } else {
        echo '<script>alert("Please login to add product into cart."); window.history.back();</script>';
    }
}
?>
