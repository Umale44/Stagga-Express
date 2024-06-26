<?php
// Include the necessary files and start the session
include '../includes/connection.php';
include '../includes/Admin.php';
session_start();

// Check if the user is logged in as an administrator
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}



// Query to get the total number of customer and seller accounts
$stmt = $pdo->query("SELECT COUNT(*) AS totalCustomers FROM customer");
$totalCustomers = $stmt->fetch(PDO::FETCH_ASSOC)['totalCustomers'];

$stmt = $pdo->query("SELECT COUNT(*) AS totalSellers FROM store");
$totalSellers = $stmt->fetch(PDO::FETCH_ASSOC)['totalSellers'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dashboard.css"> 
    <link rel="icon" href="../staggalogosmall.png"
		type="image/x-icon">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="summary">
            <div class="summary-item">
                <h2>Total Customers</h2>
                <p><?php echo $totalCustomers; ?></p>
            </div>
            <div class="summary-item">
                <h2>Total Sellers</h2>
                <p><?php echo $totalSellers; ?></p>
            </div>
            
        </div>
        <div class="actions">
            <a href="admin_view_accounts.php">View All Accounts</a>
            <a href="orders.php">View Orders</a>
            <a href="requests.php">View Requests</a>
            <a href="viewproducts.php">View Products</a>
            <a href="newproducts.php">New Products</a>
            <a href="../includes/logout.php">Log out</a>
            
        </div>
    </div>
</body>
</html>
