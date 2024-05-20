<?php
session_start();
include '../includes/connection.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

// Fetch products along with their quantity from the stock table
$sql = "SELECT p.productID, p.productName, p.price, p.image, p.productDetail, p.category, s.quantity, st.storeName 
        FROM product p
        JOIN stock s ON p.productID = s.productID
        JOIN store st ON p.storeID = st.storeID";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="admin_view_accounts.css"> <!-- Add your CSS file here -->
</head>
<body>
    <div class="container">
    <h1>View Products</h1>
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <form action="" method="post">
                        <input type="hidden" name="productID" value="<?php echo htmlspecialchars($product['productID']); ?>">
                        <td><?php echo htmlspecialchars($product['productName']); ?></td>
                        <td><?php echo htmlspecialchars($product['price']); ?></td>
                        <td><img src="../<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['productName']); ?>" width="100"></td>
                        <td><?php echo htmlspecialchars($product['productDetail']); ?></td>
                        <td>
                            <input type="number" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" min="0">
                        </td>
                        <td><?php echo htmlspecialchars($product['category']); ?></td>
                        <td><?php echo htmlspecialchars($product['storeName']); ?></td>
                        <td><button type="submit" name="updateProduct" class="submit-btn">Update</button></td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = $_POST['productID'];
    $quantity = $_POST['quantity'];

    // Update the quantity in the stock table
    $sql = "UPDATE stock SET quantity = ? WHERE productID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$quantity, $productID]);

    echo '<script>alert("Product updated successfully."); window.location.href="ViewProducts.php";</script>';
}
?>

