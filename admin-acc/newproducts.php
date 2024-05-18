<?php
session_start();
include '../includes/connection.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

// Fetch new products from the newproduct table
$sql = "SELECT p.newProductID, p.productName, p.price, p.image, p.productDetail, p.quantity, p.category, s.storeName
        FROM newproduct p
        JOIN store s ON p.storeID = s.storeID";
$stmt = $pdo->query($sql);
$newProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Products</title>
    <link rel="stylesheet" href="admin_view_accounts.css"> <!-- Add your CSS file here -->
</head>
<body>
    <div class="container">
    <h1>New Products</h1>
    <a href="admin_dashboard.php" id=backtodashboard>Back to dashboard</a>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Product Detail</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Store Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newProducts as $product) : ?>
                <tr>
                    <form action="addproduct.php" method="post">
                        <input type="hidden" name="newProductID" value="<?php echo htmlspecialchars($product['newProductID']); ?>">
                        <td><?php echo htmlspecialchars($product['productName']); ?></td>
                        <td><?php echo htmlspecialchars($product['price']); ?></td>
                        <td><img src="../<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['productName']); ?>" width="100"></td>
                        <td><?php echo htmlspecialchars($product['productDetail']); ?></td>
                        <td>
                            <input type="number" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" min="0">
                        </td>
                        <td><?php echo htmlspecialchars($product['category']); ?></td>
                        <td><?php echo htmlspecialchars($product['storeName']); ?></td>
                        <td><button type="submit" name="addProduct" class="submit-btn">Add Product</button></td>
                    </form>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>
</html>
