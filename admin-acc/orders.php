<?php
    include '../includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_view_accounts.css">
    <title>View Orders</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        #header{
            height: 100px; /* Adjust the height as needed */
        }
        #backtodashboard{
            margin-top: 10px;
        }
        
    </style>
</head>
<body>
<div class="container">
    <h1>Orders</h1>
    <a href="admin_dashboard.php" id=backtodashboard>Back to dashboard</a>
    <table>
        <tr>
            <th>Order Detail ID</th>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Total Amount</th>
            <th>Quantity</th>
            <th>Store Name</th>
            <th>Customer Name</th>
            <th>Delivery Status</th>
        </tr>
        <?php
            $currentOrderID = null;

            $sql = "SELECT od.orderDetailID, od.orderID, p.productName, od.totalAmount, od.quantity, s.storeName, o.fullname, o.deliverystatus
                    FROM order_details od
                    JOIN orders o ON od.orderID = o.orderID
                    JOIN product p ON od.productID = p.productID
                    JOIN store s ON od.storeID = s.storeID
                    ORDER BY od.orderID"; // Ensure results are ordered by orderID

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($currentOrderID !== $row['orderID']) {
                    // If orderID changes, start a new group
                    $currentOrderID = $row['orderID'];
                    
                    echo "<tr id='header'>";
                echo "<td colspan='8' style='vertical-align: bottom;'><strong>Order ID: {$currentOrderID}</strong>";

                echo "<form method='post' action='update_status.php'>";
                echo "<input type='hidden' name='orderID' value='{$row['orderID']}'>";
                echo "<select name='deliverystatus'>";
                echo "<option value='Pending' " . ($row['deliverystatus'] == 'pending' ? 'selected' : '') . ">Pending</option>";        
                echo "<option value='Delivered' " . ($row['deliverystatus'] == 'delivered' ? 'selected' : '') . ">Delivered</option>";
                echo "<option value='Not Delivered' " . ($row['deliverystatus'] == 'notdelivered' ? 'selected' : '') . ">Not Delivered</option>";
                echo "</select>";
                echo "<input type='submit' value='Update'>";
                echo "</form>";

                echo "</td>";
                echo "</tr>";
                    
                }

                echo "<tr>";
                echo "<td>{$row['orderDetailID']}</td>";
                echo "<td>{$row['orderID']}</td>";
                echo "<td>{$row['productName']}</td>";
                echo "<td>{$row['totalAmount']}</td>";
                echo "<td>{$row['quantity']}</td>";
                echo "<td>{$row['storeName']}</td>";
                echo "<td>{$row['fullname']}</td>";
                echo "<td>{$row['deliverystatus']}</td>";
                echo "</tr>";                
            }
            
        ?>
    </table>
        </div>
</body>

</html>
