<?php
// Start the session
session_start();

// Include the database connection file
include '../includes/connection.php';
include '../includes/Seller.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $productDetail = $_POST['productDetail'];

    // Image handling
    $targetDir = ""; // Directory where images will be saved
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                
                // Retrieve the storeID using the username
                if (isset($_SESSION['store']) && !empty($_SESSION['store'])) {
                    $serializedSeller = $_SESSION['store'];
                    $seller = unserialize($serializedSeller);
                    $storeID = $seller->getStoreID();

                    // SQL query to insert the product into the database
                    $sql = "INSERT INTO Product (productName, price, image, productDetail, storeID) 
                            VALUES (?, ?, ?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$productName, $price, $targetFile, $productDetail, $storeID]);
                    
                    echo "Product added successfully";
                } else {
                    echo "Session variable 'store' is not set or empty.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "File is not an image.";
    }
} else {
    echo "Invalid request method.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" min="0" step="0.01" required><br><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required><br><br>

        <label for="productDetail">Product Detail:</label><br>
        <textarea id="productDetail" name="productDetail" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>

