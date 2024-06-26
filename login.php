<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        require_once "includes/connection.php";

        // Select the hashed password from the database
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':username' => $username));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Start session and store user information
            session_start();
            $_SESSION['username'] = $user['username'];

            if ($user['usertype'] === 'customer') {
                // Include Customer class file
                require_once "includes/Customer.php";
                
                // Fetch customer data
                $queryCustomer = "SELECT * FROM customer WHERE username = :username";
                $stmtCustomer = $pdo->prepare($queryCustomer);
                $stmtCustomer->execute(array(':username' => $username));
                $customerData = $stmtCustomer->fetch(PDO::FETCH_ASSOC);

                // Create Customer object
                $customer = new Customer(
                    $customerData['username'],
                    "",
                    $customerData['customerID'],
                    $customerData['firstname'],
                    $customerData['surname'],
                    $customerData['address'],
                    $customerData['emailAddress'],
                    $customerData['age']
                );

                // Store Customer object in session
                // Serialize the Customer object
                $serializedCustomer = serialize($customer);

                // Store the serialized Customer object in the session
                $_SESSION['customer'] = $serializedCustomer;

                // Redirect to customer-acc/home.php
                header("Location: customer-acc/home.php");
                exit();
            } elseif ($user['usertype'] === 'business') {
                // Include Seller class file
                require_once "includes/Seller.php";
                
                // Fetch business data
                $queryBusiness = "SELECT * FROM store WHERE username = :username";
                $stmtBusiness = $pdo->prepare($queryBusiness);
                $stmtBusiness->execute(array(':username' => $username));
                $businessData = $stmtBusiness->fetch(PDO::FETCH_ASSOC);

                // Create Seller object
                $seller = new Seller(
                    $businessData['username'],
                    "",
                    $businessData['storeID']
                );

                $serializedSeller = serialize($seller);

                // Store the serialized Seller object in the session
                $_SESSION['store'] = $serializedSeller;

                // Redirect to business-acc/home.php
                header("Location: business-acc/home.php");
                exit();
                
            } elseif ($user['usertype'] === 'administrator') {
                // Include Admin class file
                require_once "includes/Admin.php";
                
                // Create Admin object
                $admin = new Admin(
                    $user['username'],
                    ""
                );
            
                $serializedAdmin = serialize($admin);
            
                // Store the serialized Admin object in the session
                $_SESSION['admin'] = $serializedAdmin;
            
                // Redirect to admin dashboard
                header("Location: admin-acc/admin_dashboard.php");
                exit();
            } else {
                // Handle other user types as needed
                echo "Invalid user type.";
            }
        } else {
            echo "Invalid username or password.";
        }

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-screen.css">
    <link rel="icon" href="staggalogosmall.png"
		type="image/x-icon">
    <title>Stagga Express | The Home of express delivery | Log in to your account</title>
    <style>
        body img{
            height:100px;
            margin-left:47%;
            margin-top:130px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
                <!--<img src="staggalogosmall.png" alt="logo">-->
                <h1>LOGIN</h1>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p>Username</p>
                    <input type="text" name="username" registered placeholder="username" maxlength="50" required>
                </div>

                <div class="input-field">
                    <p>Password</p>
                    <input type="password" name="password" registered placeholder="password" maxlength="50" required>
                </div>
                <div class="input-field">
                    <input type="submit" name="submit" value="LOGIN" class="btn">
                </div>
                
                <p>Dont have an account? <a href="signupcusorbus.html">Register now</a></p>
                <p><a href="index.html">Back to home page</a></p>
            </form>
        </section>
    </div>
</body>
</html>


