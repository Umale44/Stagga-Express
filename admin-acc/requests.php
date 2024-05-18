<?php
    include '../includes/connection.php';
    if (isset($_POST['activate'])) {
        $storeID = $_POST['storeID'];

        // Update the status in the store table to "active"
        $sqlUpdate = "UPDATE store SET status = 'Active' WHERE storeID = :storeID";
        $stmtUpdate = $pdo->prepare($sqlUpdate);
        $stmtUpdate->execute(['storeID' => $storeID]);

        // Delete the record from the requests table
        $sqlDelete = "DELETE FROM requests WHERE storeID = :storeID";
        $stmtDelete = $pdo->prepare($sqlDelete);
        $stmtDelete->execute(['storeID' => $storeID]);

        // Redirect to the same page to avoid resubmission of form data
        header("Location: requests.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_view_accounts.css">
    <title>View Requests</title>
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
    </style>
</head>
<body>
    <div class="container">
    <h1>Requests</h1>
    <a href="admin_dashboard.php" id=backtodashboard>Back to dashboard</a>
    <table>
        <tr>
            <th>Request ID</th>
            <th>Store ID</th>
            <th>Store Name</th>
            <th>Selling Plan</th>
            <th>Status</th>
        </tr>
        <?php
            $sql = "SELECT r.requestID, r.storeID, r.storeName, r.sellingPlan, s.status 
                    FROM requests r
                    JOIN store s ON r.storeID = s.storeID";
            $stmt = $pdo->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['requestID']}</td>";
                echo "<td>{$row['storeID']}</td>";
                echo "<td>{$row['storeName']}</td>";
                echo "<td>{$row['sellingPlan']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='storeID' value='{$row['storeID']}'>";
                echo "<input type='submit' name='activate' value='Activate'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>
        </div>
</body>
</html>
