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


        try {
            // Retrieve the quantity of the product in the cart
            $stmt = $pdo->prepare("SELECT quantity FROM cart WHERE customerID = ? AND productID = ?");
            $stmt->execute([$customerID, $productID]);
            $cartItem = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($cartItem) {
                $quantity = $cartItem['quantity'];

                // Remove the product from the cart
                $stmt = $pdo->prepare("DELETE FROM cart WHERE customerID = ? AND productID = ?");
                $stmt->execute([$customerID, $productID]);

                // Restore quantity in stock
                $stmt = $pdo->prepare("UPDATE stock SET quantity = quantity + ? WHERE productID = ?");
                $stmt->execute([$quantity, $productID]);

                

                // Redirect back to the cart page
                header("Location: ../customer-acc/cart.php");
                exit();
            } else {
                throw new Exception("Cart item not found.");
            }
        } catch (Exception $e) {
            // Roll back the transaction if something failed
            echo '<script>alert("Failed to remove product from cart."); window.history.back();</script>';
        }
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
