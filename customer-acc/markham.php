<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagga Express | The Home of express delivery | Stores | Markham</title>
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
            margin-top:-270px;
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


    </style>
    <script src="script.js" defer></script>
</head>
<body>
    <header id="theheader">
        <div id="dropdownnav" class="dropdown">
            <div class="hamburger-icon"></div>
            <div class="dropdown-content">
                <a href="store.html" class="stores">Stores</a>
                <a href="#">Fashion</a>
                <a href="#">Electronics</a>
                <a href="#">Home & Office</a>
                <a href="outdoor.html">Outdoor</a>
            </div>
        </div>
        
        <div id="staggamainlogo">
            <a href="index.php"><img src="staggalogosmall.png" alt="staggalogo" id="staggalogonav"></a>
        </div>

        <div id="searchbar">
            <input type="text" placeholder="Search" id="searchbar">
        </div>
        <div id="cart">
            <a href="cart.php"><button class="cart">Cart</button></a>
        </div>

        <div id="profile">
            <a href="profile.php"><button class="profile">Profile</button></a>
        </div>  
    </header> 
    
    <div class="stores-background">
        <video autoplay muted loop poster="">
            <source src="markham banner video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    
    <div class="products">
        <h2>Tops</h2>
        <div class="container">
            <div class="sliderwrapper">
                <button id="prev-slide" class="slide-button material-symbols-rounded">chevron_left</button>
                <div class="product-row">
                    <div class="product">
                        <img src="top1.webp" alt="Top 1">
                        <h3>G-Star Men's Skeleton Dog Chest GR Slim RT Black T-Shirt</h3>
                        <div class="price-addtoCartbutton">
                            <p>P799.00</p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <img src="top2.webp" alt="Top 1">
                        <h3>G-Star Men's Slim Base RT Blue T-Shirt</h3>
                        <div class="price-addtoCartbutton">
                            <p>P699.00</p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <img src="top3.webp" alt="Top 1">
                        <h3>Men's Relay Jeans Abstract Block Petrol Blue Graphic T-Shirt</h3>
                        <div class="price-addtoCartbutton">
                            <p>P159.00</p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <img src="top4.webp" alt="Top 1">
                        <h3>Men's Relay Jeans Outline Signature Navy Graphic T-Shirt</h3>
                        <div class="price-addtoCartbutton">
                            <p>P159.00</p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <img src="top5.webp" alt="Top 1">
                        <h3>Men's Markham Long Sleeve Contrast Collar Navy/Milk Golfer</h3>
                        <div class="price-addtoCartbutton">
                            <p>P499.00</p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <img src="top1.webp" alt="Top 1">
                        <h3>G-Star Men's Skeleton Dog Chest GR Slim RT Black T-Shirt</h3>
                        <div class="price-addtoCartbutton">
                            <p>P799.00</p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <img src="top1.webp" alt="Top 1">
                        <h3>G-Star Men's Skeleton Dog Chest GR Slim RT Black T-Shirt</h3>
                        <div class="price-addtoCartbutton">
                            <p>P799.00</p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <img src="top1.webp" alt="Top 1">
                        <h3>G-Star Men's Skeleton Dog Chest GR Slim RT Black T-Shirt</h3>
                        <div class="price-addtoCartbutton">
                            <p>P799.00</p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <img src="top1.webp" alt="Top 1">
                        <h3>G-Star Men's Skeleton Dog Chest GR Slim RT Black T-Shirt</h3>
                        <div class="price-addtoCartbutton">
                            <p>P799.00</p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <img src="top3.webp" alt="Top 1">
                        <h3>Men's Relay Jeans Abstract Block Petrol Blue Graphic T-Shirt</h3>
                        <div class="price-addtoCartbutton">
                            <p>P159.00</p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <img src="top3.webp" alt="Top 1">
                        <h3>Men's Relay Jeans Abstract Block Petrol Blue Graphic T-Shirt</h3>
                        <div class="price-addtoCartbutton">
                            <p>P159.00</p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <img src="top3.webp" alt="Top 1">
                        <h3>Men's Relay Jeans Abstract Block Petrol Blue Graphic T-Shirt</h3>
                        <div class="price-addtoCartbutton">
                            <p>P159.00</p>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <button id="next-slide" class="slide-button material-symbols-rounded">chevron_right</button>
            </div>
            <div class="slider-scrollbar">
                <div class="scrollbar-track">
                    <div class="scrollbar-thumb">
                    </div>
                </div>
            </div>
        </div>
        <hr> 
        <h2>Pants</h2>
        <div class="product-row">
            <div class="product">
                <img src="pants2.webp" alt="Men's Markham Core Knit Mocha Jogger">
                <h3>Men's Markham Core Knit Mocha Jogger</h3>
                <div class="price-addtoCartbutton">
                    <p>P399.00</p>
                    <button class="add-to-cart" data-product-id="2">Add to Cart</button>
                </div>
            </div>
            <div class="product">
                <img src="pants3.webp" alt="Men's Relay Jeans Utility Stone Cargo Pants">
                <h3>Men's Relay Jeans Utility Stone Cargo Pants</h3>
                <div class="price-addtoCartbutton">
                    <p>P899.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product">
                <img src="pants4.webp" alt="Men's Markham Multi Fabric Natural Utility Pants">
                <h3>Men's Markham Multi Fabric Natural Utility Pants</h3>
                <div class="price-addtoCartbutton">
                    <p>P699.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product">
                <img src="pants1.webp" alt="Men's Union-DNM Light Grey Cargo Pants">
                <h3>Men's Union-DNM Light Grey Cargo Pants</h3>
                <div class="price-addtoCartbutton">
                    <p>P1,119.20</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product">
                <img src="pants5.webp" alt="Men's Markham Smart Slim Tapered Flannel Grey Trouser">
                <h3>Men's Markham Smart Slim Tapered Flannel Grey Trouser</h3>
                <div class="price-addtoCartbutton">
                    <p>P699.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div>
        <hr>
        <h2>Jackets</h2>
        <div class="product-row">
            <div class="product">
                <img src="jacket1.webp" alt="Men's Markham Core Knit Mocha Jogger">
                <h3>Men's Relay Jeans Black Gilet</h3>
                <div class="price-addtoCartbutton">
                    <p>P799.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product">
                <img src="jacket2.webp" alt="Men's Relay Jeans Utility Stone Cargo Pants">
                <h3>Men's Relay Jeans Hooded Grey Puffer Jacket</h3>
                <div class="price-addtoCartbutton">
                    <p>P999.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product">
                <img src="jacket3.webp" alt="Men's Relay Jeans Hooded Black Puffer Jacket">
                <h3>Men's Relay Jeans Hooded Black Puffer Jacket</h3>
                <div class="price-addtoCartbutton">
                    <p>P999.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product">
                <img src="jacket4.webp" alt="Men's Union-DNM Light Grey Cargo Pants">
                <h3>Men's Markham Borg Utility Fatigue Sherpa Shacket</h3>
                <div class="price-addtoCartbutton">
                    <p>P799.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product">
                <img src="jacket5.webp" alt="Men's Markham Functional Black Jacket">
                <h3>Men's Markham Functional Black Jacket</h3>
                <div class="price-addtoCartbutton">
                    <p>P799.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div>
        <hr>
        <h2>Shoes</h2>
        <div class="product-row">
            <div class="product">
                <img src="shoe1.webp" alt="Men's Jonathan D Landon Camel Derby Shoe">
                <h3>Men's Jonathan D Landon Camel Derby Shoe</h3>
                <div class="price-addtoCartbutton">
                    <p>P1,099.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product">
                <img src="shoe2.webp" alt="Men's Relay Jeans Leather Suede Black Court">
                <h3>Men's Relay Jeans Leather Suede Black Court</h3>
                <div class="price-addtoCartbutton">
                    <p>P1,399.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product">
                <img src="shoe3.webp" alt="G-Star Men's Noxer Nub Black Boot">
                <h3>G-Star Men's Noxer Nub Black Boot</h3>
                <div class="price-addtoCartbutton">
                    <p>P3,499.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product">
                <img src="shoe4.webp" alt="Men's Markham Premium Lace Up Tan Boot">
                <h3>Men's Markham Premium Lace Up Tan Boot</h3>
                <div class="price-addtoCartbutton">
                    <p>P1,499.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <div class="product">
                <img src="shoe5.webp" alt="Men's Jonathan D Penny Moc Burgundy Loafer">
                <h3>Men's Jonathan D Penny Moc Burgundy Loafer</h3>
                <div class="price-addtoCartbutton">
                    <p>P999.00</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    
    <h1>ELEVATE YOUR STYLE THROUGH MARKHAM</h1>

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
                    <li><a href="index.php" style="text-decoration: none;">Home</a></li>
                    <li><a href="store.html" style="text-decoration: none;">Stores</a></li>
                    <li><a href="fashion.html" style="text-decoration: none;">Fashion</a></li>
                    <li><a href="electronics.html" style="text-decoration: none;">Electronics</a></li>
                    <li><a href="homeandoffice.html" style="text-decoration: none;">Home and Office</a></li>
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
        


