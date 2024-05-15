<?php
// Include the necessary files and start the session
include '../includes/connection.php';
session_start();

// Check if the user is logged in as an administrator
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

// Query to get the list of customers
$stmtCustomers = $pdo->query("SELECT * FROM customer");
$customers = $stmtCustomers->fetchAll(PDO::FETCH_ASSOC);

// Query to get the list of sellers
$stmtSellers = $pdo->query("SELECT * FROM store");
$sellers = $stmtSellers->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Accounts</title>
    <link rel="stylesheet" href="admin_view_accounts.css"> <!-- Include your CSS file here -->
</head>
<body>
    <div class="container">
        <h1>View Accounts</h1>
        <h2>Customers</h2>
        <a href="admin_dashboard.php" id=backtodashboard>Back to dashboard</a>
        <table>
            <tr>
                <th>Customer ID</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?php echo $customer['customerID']; ?></td>
                    <td><?php echo $customer['username']; ?></td>
                    <td><?php echo $customer['firstname']; ?></td>
                    <td><?php echo $customer['surname']; ?></td>
                    <td><?php echo $customer['emailAddress']; ?></td>
                    <td><a href="admin_edit_customer.php?id=<?php echo $customer['customerID']; ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <h2>Sellers</h2>
        <table>
            <tr>
                <th>Seller ID</th>
                <th>Username</th>
                <th>Store Name</th>
                <th>Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($sellers as $seller): ?>
                <tr>
                    <td><?php echo $seller['storeID']; ?></td>
                    <td><?php echo $seller['username']; ?></td>
                    <td><?php echo $seller['storeName']; ?></td>
                    <td><?php echo $seller['storeAddress']; ?></td>
                    <td><?php echo $seller['status']; ?></td>
                    <td><a href="admin_edit_seller.php?id=<?php echo $seller['storeID']; ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
