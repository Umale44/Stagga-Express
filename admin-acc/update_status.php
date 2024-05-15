<?php
    include '../includes/connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate the form data
        if (isset($_POST['orderID']) && isset($_POST['deliverystatus'])) {
            $orderDetailID = $_POST['orderID'];
            $deliverystatus = $_POST['deliverystatus'];

            // Update the delivery status in the database
            $sql = "UPDATE orders SET deliverystatus = :deliverystatus WHERE orderID = :orderID";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':deliverystatus', $deliverystatus, PDO::PARAM_STR);
            $stmt->bindParam(':orderID', $orderDetailID, PDO::PARAM_INT);

            if ($stmt->execute()) {
                // Redirect back to the orders page with a success message
                header("Location: orders.php?status=success");
                exit();
            } else {
                // Redirect back to the orders page with an error message
                header("Location: orders.php?status=error");
                exit();
            }
        }
    }

    // Redirect to the orders page if accessed directly without POST data
    header("Location: orders.php");
    exit();
?>
echo "<td>";
                