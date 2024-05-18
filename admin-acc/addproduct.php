<?php
session_start();
include '../includes/connection.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newProductID = $_POST['newProductID'];
    $quantity = $_POST['quantity'];
    
    // Fetch the product details from the newProduct table
    $sql = "SELECT * FROM newproduct WHERE newProductID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$newProductID]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Insert the product into the Product table
        $sql = "INSERT INTO product (productName, price, image, productDetail, category, storeID) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $product['productName'], 
            $product['price'], 
            $product['image'], 
            $product['productDetail'], 
            $product['category'], 
            $product['storeID']
        ]);

        // Insert into stock table
        $productID = $pdo->lastInsertId();
        $sql = "INSERT INTO stock (storeID, productID, quantity) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$product['storeID'], $productID, $quantity]);

        // Delete the product from the newProduct table
        $sql = "DELETE FROM newproduct WHERE newProductID = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$newProductID]);

        echo '<script>alert("Product added successfully."); window.location.href="newproducts.php";</script>';
    } else {
        echo '<script>alert("Product not found."); window.location.href="addproduct.php";</script>';
    }
}
?>