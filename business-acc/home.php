<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    YAY
    <?php
    include '../includes/Seller.php';
    // Start session
    session_start();

    // Check if the customer object is stored in the session
    if (isset($_SESSION['store'])) {
        // Retrieve the customer object
        $seller = $_SESSION['store'];

        // Output the customer object using echo
        echo $seller;
    } else {
        echo "Seller data not found.";
    }
?>
<a href="addproducts.php" class=""><button>addproducts</button></a>
</body>
</html>