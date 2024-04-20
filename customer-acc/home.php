
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagga Express | The Home of express delivery | Home</title>
    <style>
        #theheader {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    
}

#dropdownnav {
    /*order: -1; /* Move to the beginning */
    margin-right: auto; /* Push to the left */
    margin-left: 3.5%;
}

#staggamainlogo {
    margin:0 auto; /* Center align */
}
#staggamainlogo img{
    height: 500px;
}

#searchbar {
    margin-left: auto; /* Push to the right */
    margin-right:20%;
    margin-bottom: 10px; /* Space between search bar and buttons */
    height:30px;
    width: 200px;
    color: white;
    border-color: white;
    border-top: none;
    border-left: none;
    border-right: none;
    outline:none;
    
}
    </style>
</head>
<body>
    <header>
    <div id="dropdownnav" class="dropdown">
            <div class="hamburger-icon"></div>
            <div class="dropdown-content">
                <a href="store.html">Stores</a>
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
    </header>
    <?php
// Define constant to indicate that index.php is being included in home.php
define('INCLUDED_IN_HOME', true);

// Include index.php
require '../index.php';
?>
</body>
</html>

<!-- home.php -->


