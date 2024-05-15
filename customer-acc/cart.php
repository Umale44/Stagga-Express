<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagga Express | The Home of express delivery | My Shopping Cart</title>
    <link rel="icon" href="staggalogosmall.png"
		type="image/x-icon">
    <link rel="stylesheet" href="cart.css"> <!-- Link to your CSS file for styling -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
</head>
<body>
<header id="theheader">
        <div id="dropdownnav" class="dropdown">
            <div class="hamburger-icon"></div>
            <div class="dropdown-content">
                <a href="store.html">Stores</a>
                <a href="fashion.html">Fashion</a>
                <a href="#">Electronics</a>
                <a href="#">Home & Office</a>
                <a href="outdoor.html">Outdoor</a>
                <a href="orders.php">My Orders</a>
                <a href="logout.php">Log out</a>

            </div>
        </div>
        
        <div id="staggamainlogo">
            <a href="home.php"><img src="staggalogosmall.png" alt="staggalogo" id="staggalogonav"></a>
        </div>

        <div id="searchbar">
            <input type="text" placeholder="Search" id="searchbar">
        </div>
        <div id="cart">
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
        </div>
        <div id="profile">
            <a href="profile.php"><i class="fas fa-user"></i></a>
        </div>       

    </header>
    <div class="main-container">
        <h1>Shopping Cart</h1>
        <div class="cart-items">
        <?php
            include '../includes/Customer.php';
            session_start();
            include '../includes/connection.php';

            if (isset($_SESSION['customer']) && !empty($_SESSION['customer'])) {
                $serializedCustomer = $_SESSION['customer'];
                $customer = unserialize($serializedCustomer);
                $customerID = $customer->getCustomerID();

                $stmt = $pdo->prepare("SELECT * FROM cart WHERE customerID = ?");
                $stmt->execute([$customerID]);
                $cartItems = $stmt->fetchAll();

                if ($cartItems) {
                    foreach ($cartItems as $item) {
                    $productID = $item['productID'];
                    $stmt = $pdo->prepare("SELECT * FROM product WHERE productID = ?");
                    $stmt->execute([$productID]);
                    $product = $stmt->fetch();
                    ?>
            <div class="cart-item">
                <img src="../<?php echo $product['image']; ?>" alt="<?php echo $product['productName']; ?>">
                <div class="item-details">
        <h3><?php echo $product['productName']; ?></h3>
        <p>Price: P<?php echo number_format($product['price'], 2); ?></p>
        <p>Quantity: <?php echo $item['quantity']; ?></p>
        <form method="post" action="../includes/remove_from_cart.php">
            <input type="hidden" name="productID" value="<?php echo $product['productID']; ?>">
            <button type="submit" class="remove-btn">Remove from Cart</button>
        </form>
    </div>
</div>
            <?php
        }
    } else {
        echo "<p>Your cart is empty.</p>";
    }
} else {
    echo "<p>Please log in to view your cart.</p>";
}
?>


        </div>
        <button onclick="window.location.href='checkout.php'" class="place-order-btn">Place Order</button>
    </div>
    <footer class="navbar">
        <div class="container2 flex2">
            <ul>
                <li><h3>Contact Us</h3></li>
                <li>Plot 50661, Fairgrounds Office Park</li>
                <li>Gaborone, Botswana</li>
                <li>+267 301 2345</li>
            </ul>
           
            <nav>
                <ul>
                    <li><h3>Site Links</h3></li>
                    <li><a href="index.html" style="text-decoration: none;">Home</a></li>
                    <li><a href="store.html" style="text-decoration: none;">Stores</a></li>
                    <li><a href="Fashion.html" style="text-decoration: none;">Fashion</a></li>
                    <li><a href="electronics.html" style="text-decoration: none;">Electronics</a></li>
                    <li><a href="homeandoffice.html" style="text-decoration: none;">Home and Office</a></li>
                    <li><a href="outdoor.html" style="text-decoration: none;">Outdoor</a></li>
                    <li><a href="Form.html" style="text-decoration: none;">Join Us</a></li>
                </ul>
            </nav>
            <img src="staggalogosmall.png" alt="WarnerBrosPicture">
        </div>

       
        <div class="socials">
            <a href="https://www.facebook.com/WarnerBrosPictures/"><i class="fab fa-facebook grow"></i></a>
            <a href="https://twitter.com/warnerbros?lang=en"><i class="fab fa-twitter-square grow"></i></a>
            <a href="https://www.instagram.com/wbpictures/?hl=en"><i class="fab fa-instagram grow"></i></a>
            <span style="margin-right: 10px;"></span>TM & © 2024 Stagga Express. All rights reserved.
        </div>
    </footer>
</body>
</html>
