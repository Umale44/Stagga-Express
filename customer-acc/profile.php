<?php
include '../includes/Customer.php';
// Start session
session_start();

// Check if the customer object is stored in the session
if (isset($_SESSION['customer'])) {
    // Retrieve the customer object
    $customer = unserialize($_SESSION['customer']);
} else {
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="cart.css">
<link rel="icon" href="../staggalogosmall.png" type="image/x-icon">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
<title>Customer Profile</title>
<style>
    .profile-container {
        max-width: 800px;
        margin: 40px auto 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        margin-bottom:100px;
    }
    .profile-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .profile-container .profile-item {
        margin-bottom: 15px;
    }
    .profile-container .profile-item label {
        font-weight: bold;
    }

</style>
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
<div class="profile-container">
    <h2>Customer Profile</h2>
    <div class="profile-item">
        <label>Customer ID:</label>
        <span><?php echo $customer->getCustomerID(); ?></span>
    </div>
    <div class="profile-item">
        <label>Username:</label>
        <span><?php echo $customer->getUsername(); ?></span>
    </div>
    <div class="profile-item">
        <label>First Name:</label>
        <span><?php echo $customer->getFirstName(); ?></span>
    </div>
    <div class="profile-item">
        <label>Surname:</label>
        <span><?php echo $customer->getLastName(); ?></span>
    </div>
    <div class="profile-item">
        <label>Email:</label>
        <span><?php echo $customer->getEmailAddress(); ?></span>
    </div>
    <div class="profile-item">
        <label>Address:</label>
        <span><?php echo $customer->getAddress(); ?></span>
    </div>
    <div class="profile-item">
        <label>Age:</label>
        <span><?php echo $customer->getAge(); ?></span>
    </div>
    <!-- Add more profile fields as needed -->
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
