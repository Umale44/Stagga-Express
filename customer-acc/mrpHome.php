<?php
    include '../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagga Express | The Home of express delivery | Stores | Mrp Home</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="stores.css">
    <link rel="icon" href="staggalogosmall.png"
		type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <style>
        .stores-background video {
            width: 100%;
            height: 600px;
            object-fit: cover;
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
            margin-top:-320px;
        }

        .product {
            position: relative; /* Set the position of the product container to relative */
            width: 200px;
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
            transition: filter 0.4s ease;
        }
        .add-to-cart:hover{
            background-color: white;
            color:#007bff;
            font-weight:bold;
        }

        .product img {
            width: 100%; /* Make the image fill the width of the product */
            height:250px; /* Maintain aspect ratio */
        }

       .product .productName{
            margin-bottom: 180px;
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
        

    </style>
    <script src="script.js" defer></script>
</head>
<body>
<header id="theheader">
        <div id="dropdownnav" class="dropdown">
            <div class="hamburger-icon"></div>
            <div class="dropdown-content">
                <a href="store.html">Stores</a>
                <a href="fashion.html">Fashion</a>
                <a href="electronics.html">Electronics</a>
                <a href="home-office.html">Home & Office</a>
                <a href="outdoor.html">Outdoor</a>
                <a href="orders.php">My Orders</a>
                <a href="../includes/logout.php">Log out</a>

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
    
    <div class="stores-background">
        <video autoplay muted loop poster="">
            <source src="../mrp home banner video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    
    <?php
// Include the database connection file
include '../includes/connection.php';

// Fetch all products from the database
$sql = "SELECT * FROM product WHERE storeID = 8";
$stmt = $pdo->query($sql);
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
        // Fetch stock quantity for the product
        $productID = $product['productID'];
        $sqlStock = "SELECT quantity FROM stock WHERE productID = ?";
        $stmtStock = $pdo->prepare($sqlStock);
        $stmtStock->execute([$productID]);
        $stock = $stmtStock->fetch(PDO::FETCH_ASSOC);
        $quantityInStock = $stock['quantity'];

        echo "<div class='product'>";
        echo "<img src='../{$product['image']}' alt='{$product['productName']}'>";
        echo "<div class='productName'><h3>{$product['productName']}</h3></div>";
        echo "<div class='price-addtoCartbutton'>";
        echo "<p id='number-in-stock'>In Stock: {$quantityInStock}</p>";
        echo "<p>P" . number_format($product['price'], 2) . "</p>";
        echo "<form action='../includes/addtocart.php' method='post'>";
        echo "<input type='hidden' name='productID' value='{$product['productID']}'>";
        echo "<input type='hidden' name='productImage' value='{$product['image']}'>";
        echo "<input type='hidden' name='productName' value='{$product['productName']}'>";
        echo "<input type='hidden' name='productPrice' value='{$product['price']}'>";
        echo "<div class='quantity-selector'>";
        echo "<select id='quantity' name='quantity'>";
        for ($i = 1; $i <= $quantityInStock; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        echo "</select>";
        echo "</div>";
        echo "<button type='submit' class='add-to-cart'>Add to Cart</button>";
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
?>

    <br>
    
    

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
                    <li><a href="store.html" style="text-decoration: none;">Stores</a></li>
                    <li><a href="fashion.html" style="text-decoration: none;">Fashion</a></li>
                    <li><a href="electronics.html" style="text-decoration: none;">Electronics</a></li>
                    <li><a href="home-office.html" style="text-decoration: none;">Home and Office</a></li>
                    <li><a href="orders.php" style="text-decoration: none;">My Orders</a></li>
                    <li><a href="Form.html" style="text-decoration: none;">Join Us</a></li>
                </ul>
            </nav>
            <img src="staggalogosmall.png" alt="WarnerBrosPicture">
        </div>

       
        <div class="socials">
            <a href="https://www.facebook.com"><i class="fab fa-facebook grow"></i></a>
            <a href="https://twitter.com"><i class="fab fa-twitter-square grow"></i></a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram grow"></i></a>
            <span style="margin-right: 10px;"></span>TM & © 2024 Stagga Express. All rights reserved.
        </div>
    </footer>  
</body>
</html>
        


