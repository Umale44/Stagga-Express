<?php
// Start session
session_start();

// Include the database connection file
include '../includes/connection.php';
include '../includes/Seller.php';

// Check if the seller is logged in
if (!isset($_SESSION['store'])) {
    header('Location: ../login.php');
    exit();
}

// Retrieve store ID from session
$serializedSeller = $_SESSION['store'];
$seller = unserialize($serializedSeller);
$storeID = $seller->getStoreID();

// Retrieve product details
if (isset($_POST['productID'])) {
    $productID = $_POST['productID'];
    $sql = "SELECT * FROM product WHERE productID = ? AND storeID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$productID, $storeID]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo "Product not found.";
        exit();
    }
} else {
    echo "No product ID provided.";
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_product'])) {
    $newPrice = $_POST['price'];
    $imagePath = $product['image']; // Keep the old image path as default

    // Check if a new image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imagePath = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], '../' . $imagePath);
    }

    // Update product details in the database
    $sql = "UPDATE product SET price = ?, image = ? WHERE productID = ? AND storeID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$newPrice, $imagePath, $productID, $storeID]);

    echo '<script>alert("Product updated successfully"); window.location = "home.php";</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="../customer-acc/checkout.css">
    <style>
        .main-container img{
            height:300px;
            width: auto;
            margin-bottom:30px;
        }
        .main-container .submit-btn{
            margin-top:15px;
        }
    </style>
</head>
<body>
    <div class="main-container">
    <h1>Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="productID" value="<?php echo $productID; ?>">
        <div>
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" value="<?php echo $product['productName']; ?>" disabled>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>" required>
        </div>
        <div>
            <label for="image">Current Product Image:</label>
            <input type="file" id="image" name="image" accept="image/*">
            <img src="../<?php echo $product['image']; ?>" alt="Product Image" width="100">
        </div>
        <div>
            <button type="submit" name="update_product" class="submit-btn">Update Product</button>
        </div>
    </form>
    </div>
</body>
</html>
