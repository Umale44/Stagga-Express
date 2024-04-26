<?php
    include '../includes/Customer.php';
    // Start session
    session_start();

    // Check if the customer object is stored in the session
    if (isset($_SESSION['customer'])) {
        // Retrieve the customer object
        $customer = $_SESSION['customer'];

        // Output the customer object using echo
        echo $customer;
    } else {
        echo "Customer data not found.";
    }
?>
