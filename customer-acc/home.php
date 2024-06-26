<?php
include '../includes/connection.php';
session_start();

if (!isset($_SESSION['customer'])) {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagga Express | The Home of express delivery</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="staggalogosmall.png"
		type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-...your-sha384-hash-here..." crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <style>
            h3, .go-to-store-button p{
                white-space:normal;
            }
            .products {
                max-width: 1200px; /* Set maximum width for the products container */
                margin: 0 auto; /* Center the products container */
                padding: 20px; /* Add some spacing around the products */
                color: white;
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
            .store-info {
                color: white;
                margin-right:5%;
            }

            .store-info img {
                width: 250px; 
                height: 275px;
                border-radius: 12%; /* Makes the image edges round */
                border: 2px solid white; /* Add a white border */
                transition: filter 0.4s ease;
                filter: brightness(50%);
            }

            .store-info h2 {
                font-size: 24px;
                margin-bottom: 5px;
                font-family: Arial, Helvetica, sans-serif;
            }

            .store-details{
                width: 75%; /* Specify a width */
                margin: 0 auto;
            }

            .rating {
                font-size: 16px;
                color: #ffc107; /* Yellow color for rating */
                margin-bottom: 5px;
            }

            .store-info p{
                font-size: 14px;
            }

            .store-info img:hover {
                filter: brightness(100%);
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

    <div class="sectionImg">
        <div class="image-scroller-container">
            <img src="Tech.png">
            <img src="clothes.png">
            <img src="stoves.png">    
        </div>
        <div class="image-scroller-container">
            <img src="Tech.png">
            <img src="clothes.png">
            <img src="stoves.png">    
        </div>
    </div>
    <div class="website-description">
        <h1>THE HOME OF EXPRESS DELIVERY</h1>
        <p class="centered-paragraph">Welcome to Stagga Express, where your deliveries are not just journeys, but commitments. We specialize in rapid and reliable delivery services, ensuring your parcels reach their destination with unparalleled speed and precision. Whether it's across the city or beyond, our dedicated team and advanced logistics solutions guarantee that your packages are in safe hands from pick-up to drop-off. Experience the convenience of seamless deliveries with Stagga Express, where every delivery is a promise kept</p>
    </div>
    <div class="products">
    <h2>Win Big With This Weeks Deals</h2>
    <section id="section2">
        <div class= "deals-of-the-week-container">
            <div class="product">
                <img src="../LG.png" alt="deal 1">
                <h3>LG OLED etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P 9,599 from P 12,500</p>
                    <a href="homeandoffice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../defy.png" alt="deal 2">
                <h3>Defy 555L Fridge etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P 10,599 from P 11,999</p>
                    <a href="homeandoffice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../hp.png" alt="deal 1">
                <h3>HP 15s etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P6,500 from P 9,999</p>
                    <a href="electronics.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../iphone.webp" alt="deal 1">
                <h3>Apple iPhone 15 Pro 512GB Black Titanium etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P31 999 from P34 199</p>
                    <a href="homeandoffice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../macbook.webp" alt="deal 1">
                <h3>Apple MacBook Air 13-Inch With M1 Processor 7 Core GPU 256GB Space Grey etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P15,999 from P18,999</p>
                    <a href="homeandoffice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
        </div>

        <div class= "deals-of-the-week-container">
            <div class="product">
                <img src="../LG.png" alt="deal 1">
                <h3>LG OLED etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P 9,599 from P 12,500</p>
                    <a href="homeandoffice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../defy.png" alt="deal 2">
                <h3>Defy 555L Fridge etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P 10,599 from P 11,999</p>
                    <a href="homeandoffice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../hp.png" alt="deal 1">
                <h3>HP 15s etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P6,500 from P 9,999</p>
                    <a href="electronics.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../iphone.webp" alt="deal 1">
                <h3>Apple iPhone 15 Pro 512GB Black Titanium etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P31 999 from P34 199</p>
                    <a href="homeandoffice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../macbook.webp" alt="deal 1">
                <h3>Apple MacBook Air 13-Inch With M1 Processor 7 Core GPU 256GB Space Grey etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P15,999 from P18,999</p>
                    <a href="electronics.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
        </div>
        <div class= "deals-of-the-week-container">
            <div class="product">
                <img src="../LG.png" alt="deal 1">
                <h3>LG OLED etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P 9,599 from P 12,500</p>
                    <a href="homeandoffice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../defy.png" alt="deal 2">
                <h3>Defy 555L Fridge etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P 10,599 from P 11,999</p>
                    <a href="homeandoffice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../hp.png" alt="deal 1">
                <h3>HP 15s etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P6,500 from P 9,999</p>
                    <a href="electronics.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../iphone.webp" alt="deal 1">
                <h3>Apple iPhone 15 Pro 512GB Black Titanium etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P31 999 from P34 199</p>
                    <a href="homeandoffice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../macbook.webp" alt="deal 1">
                <h3>Apple MacBook Air 13-Inch With M1 Processor 7 Core GPU 256GB Space Grey etc.....</h3>
                <div class="go-to-store-button">
                    <p>Now P15,999 from P18,999</p>
                    <a href="electronics.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
        </div> 
    </section>
    
    <h2>Trending</h2>
    <section id="section3">
        <div class= "deals-of-the-week-container">
            <div class="product">
                <img src="../Foschini jacket 1.webp" alt="deal 1">
                <h3>Melton Kimono Sleeve Coat</h3>
                <div class="go-to-store-button">
                    <p>P999.00</p>
                    <a href="foschini.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../acc 2.webp" alt="deal 2">
                <h3>Playstation 5 DualSense EDGE Wireless Controller</h3>
                <div class="go-to-store-button">
                    <p>P4,599.00</p>
                    <a href="incredible-connections.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../tv 2.jpeg" alt="deal 1">
                <h3>SAMSUNG 85" UHD SMART TV 85CU7000</h3>
                <div class="go-to-store-button">
                    <p>P14,499.00</p>
                    <a href="homecorp.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../Jewellery item 5 foschini.webp" alt="deal 1">
                <h3>Luella Diamante Catseye Sunglasses</h3>
                <div class="go-to-store-button">
                    <p>P359.00</p>
                    <a href="foschini.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../jacket3.webp" alt="deal 1">
                <h3>Men's Relay Jeans Hooded Black Puffer Jacket</h3>
                <div class="go-to-store-button">
                    <p>P999.00</p>
                    <a href="markham.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../lawnchair.png" alt="deal 1">
                <h3>Cape Union Lawn Chair</h3>
                <div class="go-to-store-button">
                    <p>P399.00</p>
                    <a href="outdoor.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../Mr Price 7-14 girls jacket 2.webp"alt="deal 1">
                <h3>Hooded Puffer Jacket</h3>
                <div class="go-to-store-button">
                    <p>P279.99</p>
                    <a href="MrPrice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
        </div>

        <div class= "deals-of-the-week-container" id="deals-container2">
            <div class="product">
                <img src="../Foschini jacket 1.webp" alt="deal 1">
                <h3>Melton Kimono Sleeve Coat</h3>
                <div class="go-to-store-button">
                    <p>P999.00</p>
                    <a href="foschini.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../acc 2.webp" alt="deal 2">
                <h3>Playstation 5 DualSense EDGE Wireless Controller</h3>
                <div class="go-to-store-button">
                    <p>P4,599.00</p>
                    <a href="incredible-connections.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../tv 2.jpeg" alt="deal 1">
                <h3>SAMSUNG 85" UHD SMART TV 85CU7000</h3>
                <div class="go-to-store-button">
                    <p>P14,499.00</p>
                    <a href="homecorp.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../Jewellery item 5 foschini.webp" alt="deal 1">
                <h3>Luella Diamante Catseye Sunglasses</h3>
                <div class="go-to-store-button">
                    <p>P359.00</p>
                    <a href="foschini.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../jacket3.webp" alt="deal 1">
                <h3>Men's Relay Jeans Hooded Black Puffer Jacket</h3>
                <div class="go-to-store-button">
                    <p>P999.00</p>
                    <a href="markham.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../lawnchair.png" alt="deal 1">
                <h3>Cape Union Lawn Chair</h3>
                <div class="go-to-store-button">
                    <p>P399.00</p>
                    <a href="outdoor.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../Mr Price 7-14 girls jacket 2.webp"alt="deal 1">
                <h3>Hooded Puffer Jacket</h3>
                <div class="go-to-store-button">
                    <p>P279.99</p>
                    <a href="MrPrice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
        </div>
        <div class= "deals-of-the-week-container" id="deals-container3">
            <div class="product">
                <img src="../Foschini jacket 1.webp" alt="deal 1">
                <h3>Melton Kimono Sleeve Coat</h3>
                <div class="go-to-store-button">
                    <p>P999.00</p>
                    <a href="foschini.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../acc 2.webp" alt="deal 2">
                <h3>Playstation 5 DualSense EDGE Wireless Controller</h3>
                <div class="go-to-store-button">
                    <p>P4,599.00</p>
                    <a href="incredible-connections.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../tv 2.jpeg" alt="deal 1">
                <h3>SAMSUNG 85" UHD SMART TV 85CU7000</h3>
                <div class="go-to-store-button">
                    <p>P14,499.00</p>
                    <a href="homecorp.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../Jewellery item 5 foschini.webp" alt="deal 1">
                <h3>Luella Diamante Catseye Sunglasses</h3>
                <div class="go-to-store-button">
                    <p>P359.00</p>
                    <a href="foschini.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../jacket3.webp" alt="deal 1">
                <h3>Men's Relay Jeans Hooded Black Puffer Jacket</h3>
                <div class="go-to-store-button">
                    <p>P999.00</p>
                    <a href="markham.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../lawnchair.png" alt="deal 1">
                <h3>Cape Union Lawn Chair</h3>
                <div class="go-to-store-button">
                    <p>P399.00</p>
                    <a href="outdoor.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
            <div class="product">
                <img src="../Mr Price 7-14 girls jacket 2.webp"alt="deal 1">
                <h3>Hooded Puffer Jacket</h3>
                <div class="go-to-store-button">
                    <p>P279.99</p>
                    <a href="MrPrice.html"><button class="go-to-store">Go To Store</button></a>
                </div>
            </div>
        </div> 
    </section>
    <h2>Stores we recommend</h2>
    <section id="section4">
        <div class="store-info">
            <a href="mrpHome.html"><img src="mrp-home.png"class="Store Image"></a>
            <div class="store-details">
                <a href="mrpHome.html" style="text-decoration: none; color: inherit;"><h2>MRP Home</h2></a>
                <div class="rating">Rating: 4.5</div>
            </div>
        </div>
    
        <div class="store-info">
            <a href="foschini.php"><img src="../Foschini logo.png"class="Store Image"></a>
            <div class="store-details">
                <h2>Foschini</h2>
                <div class="rating">Rating: 4.2</div>
            </div>
        </div>
        <div class="store-info">
            <a href="incredible-connections.php"><img src="Incredibleconec.png"class="Store Image"></a>
            <div class="store-details">
                <h2>Incredible Connections</h2>
                <div class="rating">Rating: 4.2</div>
            </div>
        </div>
        <div class="store-info">
            <a href="markham.php"><img src="markham.png"class="Store Image"></a>
            <div class="store-details">
                <a href="markham.html" style="text-decoration: none; color: inherit;"><h2>Markham</h2></a>
                <div class="rating">Rating: 4.2</div>
            </div>
        </div>
    </section>

    <h2>Places we deliver to</h2>
    <ul>
    <li>Gaborone</li>
        <li>Francistown</li>
        <li>Molepolole</li>
        <li>Maun</li>
        <li>Serowe</li>
        <li>Selebi-Phikwe</li>
        <li>Palapye</li>
        <li>Kanye</li>
        <li>Mochudi</li>
        <li>Mogoditshane</li>
        <li>Lobatse</li>
        <li>Orapa</li>
        <li>Letlhakane</li>
        <li>Jwaneng</li>
        <li>Thamaga</li>
        <li>Bobonong</li>
        <li>Ramotswa</li>
        <li>Tlokweng</li>        
    </ul>
        </div>
        
    <script> 
    </script>

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
                    <li><a href="Fashion.html" style="text-decoration: none;">Fashion</a></li>
                    <li><a href="electronics.html" style="text-decoration: none;">Electronics</a></li>
                    <li><a href="homeandoffice.html" style="text-decoration: none;">Home and Office</a></li>
                    <li><a href="outdoor.html" style="text-decoration: none;">Outdoor</a></li>
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

    <script src="script.js"></script>
</body>
</html>