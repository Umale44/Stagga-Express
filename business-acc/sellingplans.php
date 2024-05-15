<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Selling Plans</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: black;
    }
    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
    }
    form {
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        cursor: pointer;
    }
    input[type="radio"] {
        margin-right: 10px;
    }
    .features {
        border-top: 1px solid #ccc;
        padding-top: 20px;
    }
    .features h2 {
        margin-bottom: 10px;
    }
    .feature, .features p{
        margin-bottom: 10px;
    }
    .features p{
        font-size:35px;
        font-weight:bold;
        margin-top:0;
    }
    input[type="submit"] {
        display: block;
        margin: 0 auto;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

</style>
</head>
<body>
<div class="container">
    <h1>Choose a Selling Plan</h1>
    <form action="../includes/process_request.php" method="post" enctype="multipart/form-data">
        <label>
            <input type="radio" name="plan" value="individual"> Individual Plan
        </label>
        <label>
            <input type="radio" name="plan" value="professional"> Professional Plan
        </label>
        <input type="submit" name="next-button" value="Next">
    </form>
    <div class="features">
        <h2>Individual Plan</h2>
        <p>P14.99 per item sold</p>
        <h2>Professional Plan</h2>
        <p>P599.99 per Month</p>
    </div>
    <div class="features">
        <h2>Individual Plan Overview</h2>
        <div class="feature">- You sell fewer than 40 units a month</div>
        <div class="feature">- You're still deciding what to sell</div>
        <div class="feature">- You don't plan to advertise or use advanced selling tools</div>

        <h2>Professional Plan Overview</h2>
        <div class="feature">- You sell more than 40 units a month</div>
        <div class="feature">- You to advertise your products</div>
        <div class="feature">- You want to qualify for top placement on product detail pages</div>
        <div class="feature">- You want to use advanced selling tools, like APIs and reports</div>
        <div class="feature">- You want to sell products in restricted categories</div>
    </div>
    <div class="features">
        <h2>Individual Plan Features</h2>
        <div class="feature">- Add new products to catalog</div>
        <div class="feature">- Grow your products with fulfillment by Stagga Express</div>

        <h2>Professional Plan Features</h2>
        <div class="feature">- Add new products to catalog</div>
        <div class="feature">- Grow your products with fulfillment by Stagga Express</div>
        <div class="feature">- Apply to sell in additional categories</div>
        <div class="feature">- Access brand owner tools</div>
        <div class="feature">- Save time creating listing in bulk</div>
        <div class="feature">- Manage inventory with feeds, spreadsheets and reports</div>
        <div class="feature">- Qualify for top placement on product detail pages</div>
        <div class="feature">- Increase selling efficiency with API integration</div>
        <div class="feature">- Set your own shipping fees for non-media products</div>
        <div class="feature">- Attract shoppers with on-site advertising tools</div>
        <div class="feature">- Run promotions including free shipping</div>
    </div>
    
</div>
</body>
</html>
