<?php
session_start();
include 'connection.php';
include 'Customer.php';

if (isset($_SESSION['customer']) && !empty($_SESSION['customer'])) {
    $serializedCustomer = $_SESSION['customer'];
    $customer = unserialize($serializedCustomer);
    $customerID = $customer->getCustomerID();

    if (isset($_POST['productID'])) {
        $productID = $_POST['productID'];

        // Remove the product from the cart
        $stmt = $pdo->prepare("DELETE FROM cart WHERE customerID = ? AND productID = ?");
        $stmt->execute([$customerID, $productID]);

        // Redirect back to the cart page
        header("Location: ../customer-acc/cart.php");
        exit();
    } else {
        // Redirect to the cart page if productID is not set
        header("Location: ../customer-acc/cart.php");
        exit();
    }
} else {
    // Redirect to login page if customer is not logged in
    header("Location: ../login.php");
    exit();
}
?>
