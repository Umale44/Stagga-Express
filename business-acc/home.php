<?php
    // Start the session
    session_start();

    // Include the database connection file
    include '../includes/connection.php';
    include '../includes/Seller.php';

    if (!isset($_SESSION['store'])) {
        header('Location: ../login.php');
        exit();
    }

    // Retrieve store logo path based on the storeID
    if (isset($_SESSION['store']) && !empty($_SESSION['store'])) {
        $serializedSeller = $_SESSION['store'];
        $seller = unserialize($serializedSeller);
        $storeID = $seller->getStoreID();

        $sql = "SELECT logo, status FROM store WHERE storeID = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$storeID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $logoPath = $row['logo'];
        $status = $row['status'];
    }

    // Function to check account status and redirect
    
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../stagga-style.css">
<link rel="icon" href="../staggalogosmall.png"
		type="image/x-icon">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
<title>Stagga Express For Business | Growing your business</title>

<style>

    
    #dropdownnav{
        margin-right:0px;
    }
    #staggamainlogo {
        margin-top:0;
        margin-right:44%;
    }

    #staggamainlogo img{
        border:2px solid white;
        border-radius:12px;
        width:150px;
    }
    .business-background{
    overflow: hidden;
    white-space: nowrap;
    position: relative;
    height: 600px;
}
.business-background img {
    width: 100%;
    height: 600px;
    object-fit: cover;
    filter:brightness(0.3);
}
    .website-description {
                position: absolute;
                top: 60%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 60px;
                color: white;
                text-align: center;
                background:none;
            }

            .website-description h1{
                font-size: 60px;
                background:none;
            }
            .website-description p{
                font-size:15px;
                margin-top: 5px;
                background:none;
            }
    p {
        line-height: 1.5;
    }
    .container-main {
        max-width: 1200px;
        margin: 20px auto;
        padding: 0 20px;
    }
    .products {
            max-width: 1200px; /* Set maximum width for the products container */
            margin: 0 auto; /* Center the products container */
            padding: 20px; /* Add some spacing around the products */
            color: white;
        }

        .container{
            max-width: 1500px;
            width:100%
        }

        .product-row {
            display: flex; /* Use flexbox for the product row */
            margin-bottom: 20px; /* Add some space between rows */
            overflow: hidden; /* Hide overflow to create the sliding effect */
        }          
        .sliderwrapper .product-row {
            display: grid; /* Use flexbox for the product row */
            margin-bottom: 20px; /* Add some space between rows */
            scrollbar-width: none;
            grid-template-columns: repeat(99, 1fr);
            overflow-x: auto; /* Hide overflow to create the sliding effect */
        } 
     
        .sliderwrapper .product-row::-webkit-scrollbar{
            display: none;
        }

        .container .slider-scrollbar{
            height: 24px;
            width: 100%;
            display: flex;
            align-items: center;
        }
        .slider-scrollbar .scrollbar-track{
            height: 2px;
            width: 100%;
            background: rgb(47, 46, 46);
            position: relative;
            border-radius: 4px;
        }
        .slider-scrollbar:hover .scrollbar-track{
            height: 4px;
        }
        .slider-scrollbar .scrollbar-thumb{
            position: absolute;
            height: 100%;
            width: 50%;
            background: #ccc;
            border-radius: inherit;
            cursor: grab;
        }
        .slider-scrollbar .scrollbar-thumb:active{
            cursor: grabbing;
            height: 8px;
            top:-2px;
        }
        .slider-scrollbar .scrollbar-thumb::after{
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: -10px;
            bottom: -10px;
        }
        .sliderwrapper{
            position: relative;
        }
        .sliderwrapper .slide-button{
            position:absolute;
            height: 50px;
            width: 50px;
            color: black; 
            background: #ccc;
            font-size: 2.2rem;
            cursor: pointer;
            border-radius: 50%;
            border: none;
            outline: none;
            transform: translateY(-50%);
        }
        .sliderwrapper .slide-button:hover{
            background: white;
        }

        .sliderwrapper .slide-button#prev-slide{
            margin-top:250px;
            z-index: 2;
            left:-100px;
        }
        .sliderwrapper .slide-button#next-slide{
            right: -100px;
            margin-top:-270px;
        }

        .product {
            position: relative; /* Set the position of the product container to relative */
            width: 220px;
            border: 1px solid #ccc; /* Add a border around the product */
            padding: 10px; /* Add spacing inside the product */
            margin: 10px; /* Add margin around each product */
            text-align: center; /* Center align text */
        }

        .add-to-cart {
            color: white; /* White text color */
            background-color: #007bff; /* Blue color for the button */
            padding: 5px 10px; /* Add padding */
            border: none; /* Remove border */
            cursor: pointer; /* Add pointer cursor on hover */
        }

        .product img {
            width: 100%; /* Make the image fill the width of the product */
            height:250px; /* Maintain aspect ratio */
        }

       .product h3{
            margin-bottom: 120px;
        }
        
        .price-addtoCartbutton{
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            margin: auto; /* Center the division horizontally */
            text-align: center; /* Center align text */
        }
        .quantity-selector select{
            color:black;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 1px;
            width: 50px; /* Adjust the width as needed */
            margin-bottom:15px;
        }
        option{
            background-color:white;
            color:black;
        }
        .inactive-message, .pending-message{
            text-align: center;
            padding: 10px;
            margin-top: 10px;
        }
        .inactive-message{
            color: #dc3545;
            background-color: #ffcccb;
        }
        .pending-message{
            color: rgb(3, 27, 2);
            background-color: rgb(58, 142, 54);
        }
    
</style>
<script>
    function checkAccountStatusAddProducts(event, status, url) {
        event.preventDefault();
        if (status != 'Active') {
            alert('Can only add products with an active account.');
        } else {
            window.location.href = url;
        }
    }
    function checkAccountStatusViewOrders(event, status, url) {
        event.preventDefault();
        if (status != 'Active') {
            alert('Can only view orders with an active account.');
        } else {
            window.location.href = url;
        }
    }
</script>
</head>
<body>
<header id="theheader">
        <div id="dropdownnav" class="dropdown">
            <div class="hamburger-icon"></div>
            <div class="dropdown-content">
                <a href="#" onclick="checkAccountStatusAddProducts(event, '<?php echo $status; ?>', 'addproducts.php');" class="products">Add Products</a>
                <a href="#" onclick="checkAccountStatusViewOrders(event, '<?php echo $status; ?>', 'orders.php');" class="orders">Orders</a>
                <a href="accountSettings.php" class="account-settings">Account Settings</a>
                <a href="../includes/logout.php">Log Out</a>
            </div>
        </div>
        
        <div id="staggamainlogo">
            <a href="home.php"><img src="<?php echo $logoPath; ?>" alt="Store Logo"></a>
        </div>
 
    </header>
    <div class="business-background">
        <img src="businessbanner.jpg" alt="Background Image">
    </div>
    <div class="website-description">
        <h1>STAGGA EXPRESS FOR BUSINESS</h1>
        <p class="centered-paragraph">Stagga Express is your premier delivery service, tailored for sellers like you. With Stagga Express, you can effortlessly manage and fulfill orders, ensuring prompt and reliable delivery to your customers. Our platform offers seamless integration with your store, providing real-time tracking and updates every step of the way. Trust Stagga Express to handle your deliveries with care and efficiency, allowing you to focus on what you do best – growing your business.</p>
    </div>
    <div class="container-main">
         
    <h2>Your Store Information</h2>
    <?php echo "Store ID: " . $storeID; // Output the store ID?>
    <h2>Your Products</h2>
    <?php
    include '../includes/connection.php';

    if ($status == 'Inactive') {
        echo "<div class='inactive-message'>Your Seller account is currently inactive. Request activation <a href='sellingplans.php' style='background: none; color: red;'>here</a>.</div>";

    }elseif ($status == 'Pending') {
        echo "<div class='pending-message'>Your Seller account is currently being Processed.</div>";

    }elseif ($status == 'Active') {
    $sql = "SELECT * FROM product WHERE storeID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$storeID]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Organize products by category
    $organizedProducts = [];
    foreach ($products as $product) {
    $category = $product['category'];
    if (!isset($organizedProducts[$category])) {
        $organizedProducts[$category] = [];
    }
    $organizedProducts[$category][] = $product;
}

// Display products by category
foreach ($organizedProducts as $category => $products) {
    echo "<div class='products'>";
    echo "<h2>$category</h2>";
    echo "<div class='container'>";
    echo "<div class='sliderwrapper'>";
    echo "<button id='prev-slide' class='slide-button material-symbols-rounded'>chevron_left</button>";
    echo "<div class='product-row'>";
    
    foreach ($products as $product) {
        echo "<div class='product'>";
        echo "<img src='../{$product['image']}' alt='{$product['productName']}'>";
        echo "<h3>{$product['productName']}</h3>";
        echo "<div class='price-addtoCartbutton'>";
        echo "<p>P" . number_format($product['price'], 2) . "</p>";
        echo "<form action='editproduct.php' method='post'>";
        echo "<input type='hidden' name='productID' value='{$product['productID']}'>";
        echo "<input type='hidden' name='productImage' value='{$product['image']}'>";
        echo "<input type='hidden' name='productName' value='{$product['productName']}'>";
        echo "<input type='hidden' name='productPrice' value='{$product['price']}'>";
        echo "<button type='submit' class='add-to-cart'>Edit Product</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }
    
    echo "</div>"; // Close product-row
    echo "<button id='next-slide' class='slide-button material-symbols-rounded'>chevron_right</button>";
    echo "</div>"; // Close sliderwrapper
    echo "<div class='slider-scrollbar'>";
    echo "<div class='scrollbar-track'>";
    echo "<div class='scrollbar-thumb'>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>"; // Close container
    echo "</div>"; // Close products
}


    echo "<h2>Your Orders</h2>";
    echo "<p>You have received 5 new orders in the last week.</p>";
    
}
?>
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
                    <li><a href="home.php" style="text-decoration: none;">Home</a></li>
                    <li><a href="addproducts.php" style="text-decoration: none;">Add Products</a></li>
                    <li><a href="Fashion.html" style="text-decoration: none;">Orders</a></li>
                    <li><a href="electronics.html" style="text-decoration: none;">Account Settings</a></li>
                    <li><a href="Form.html" style="text-decoration: none;">Join Us</a></li>
                </ul>
            </nav>
            <img src="../staggalogosmall.png" alt="WarnerBrosPicture">
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
<script>"../customer-acc/script.js"</script>