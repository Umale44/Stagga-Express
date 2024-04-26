<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagga Express | The Home of express delivery | Register your Business</title>
    <link rel="icon" href="staggalogosmall.png"
		type="image/x-icon">
    <link rel="stylesheet" href="stagga-style.css">
    <style>
        h1{
            margin-left:7%;
            margin-top:50px;
        }
        .container{
            position:relative;  
            align-items:center;
            height: auto;
            width:80%;
            margin:5% auto 0;
            border-radius:20px;
            border:solid 2px white;
            padding: 50px;
        }
        .plans {
            margin-bottom: 30px;
            display:flex;
        }
        .plan{
            margin:0 auto;
        }
        .plan p{
            font-size:50px;
        }
        button{
            margin:0 auto;
        }
        .overview{
            margin-bottom: 30px;
            display:flex;
        }
        .plan-details{
            margin:0 auto;
        }
        .selling-plan-features{
            margin-bottom: 30px;
            display:flex;
            
        }
        .selling-plan-features li{
            margin-bottom:40px;
        }
        .selling-plan-features .professional-details{
            margin-left:50%;
        }
        .selling-plan-details ul{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding:0;
            margin-bottom: auto;
        }
        .selling-plan-details li{
            margin-bottom:34%
        }

        .professional-button .individual-button{
            margin-bottom:0px;
        }
        .selling-plan-details-container{
            margin-left: 30%;
            display:flex;
            width:65%;
            
        }
        .selling-plan-details-container #professional-details{
            margin-left:auto;
            margin-right:0px;
        }
        .selling-plan-details-container li{
            list-style-type:none ;
        }
    </style>
</head>
<body>
    <h1>Selling Plans</h1>
<div class="container">
<h2>Select a Plan</h2>
        <div class="plans">
            <div class="plan">
                <h3>Individual Plan</h3>
                <p>P14.99 per item sold</p>
                
            </div>
            <div class="plan">
                <h3>Professional Plan</h3>
                <p>P499.99 per month</p>
                
            </div>
        </div>
        <hr>
        <h2>Overview</h2>
        <div class="overview">
            <div class="plan-details" id="individual-details">
                <h3>Individual Plan</h3>
                <ul>
                    <li>You sell fewer than 40 units per month</li>
                    <li>You're still deciding what to sell</li>
                    <li>You don't plan to advertise or use advanced selling tools</li>
                </ul>
            </div>
            <div class="plan-details" id="professional-details">
                <h3>Professional Plan</h3>
                <ul>
                    <li>You sell more than 40 units per month</li>
                    <li>You want to advertise your products</li>
                    <li>You want to qualify for top placement on product detail pages</li>
                    <li>You want to use advanced selling tools, like APIs and reports</li>
                    <li>You want to sell products in restricted categories</li>
                    <!-- Add more features -->
                </ul>
            </div>
        </div>
        <hr>
        <h2>Selling Plan Features</h2>
        <div class="selling-plan-features">
        <div class="selling-plan-feature" id="individual-details">
        <h3>Feature</h3>
                <ul>
                    <li>Add new products to the Stagga Express catalog</li>
                    <li>Grow your business with Fulfillment by Stagga Express</li>
                    <li>Apply to sell in additional categories</li>
                    <li>Access brand owner tools like A+ content and stores</li>
                    <li>Attract shoppers with on-site advertising tools</li>
                    <li>Run promotions including free shipping</li>
                    <li>Qualify for top placement on product detail pages</li>
                </ul>
            </div>
        <div class="selling-plan-details-container">
            <div class="selling-plan-details" id="individual-details">
                <h3>Individual Plan</h3>
                <ul>
                    <li>&check;</li>
                    <li>&check;</li>
                </ul>
                <button class="individual-button">Individual</button>
            </div>
            <div class="selling-plan-details" id="professional-details">
                <h3>Professional Plan</h3>
                <ul>
                <li>&check;</li>
                <li>&check;</li>
                <li>&check;</li>
                <li>&check;</li>
                <li>&check;</li>
                <li>&check;</li>
                <li>&check;</li>
                    <!-- Add more features -->
                </ul>
                <button class="professional-button">Professional</button>
            </div>
            </div>
        </div>
    </div>
</body>
</body>
</html>