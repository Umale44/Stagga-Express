<?php 
    //register user
    include 'includes/signuphandler.inc.php'
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-screen.css">
    <link rel="icon" href="staggalogosmall.png"
		type="image/x-icon">
    <title>Stagga Express | The Home of express delivery | Create your account</title>
    <style>
        .main-container .form-container .input-field input[type]{
            margin-top:0px;
        }
        
    </style>
</head>
<body>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
                <h1>SIGN UP</h1>
                <p>Don't have an account?. Sign up here</p>

            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p>First name</p>
                    <input type="text" name="name" registered placeholder="enter your name" maxlength="50" required>
                </div>

                <div class="input-field">
                    <p>Surname</p>
                    <input type="text" name="surname" registered placeholder="enter your surname" maxlength="50" required>
                </div>

                <div class="input-field">
                    <p>Address</p>
                    <input type="text" name="address" registered placeholder="enter your address" maxlength="50" required>
                </div>

                <div class="input-field">
                    <p>Age</p>
                    <input type="number" name="age" registered placeholder="enter your age" maxlength="50" required>
                </div>

                <div class="input-field">
                    <p>Email Address</p>
                    <input type="text" name="email" registered placeholder="enter your email address" maxlength="50" required>
                </div>

                <div class="input-field">
                    <p>Username</p>
                    <input type="text" name="username" registered placeholder="enter your username" maxlength="50" required>
                </div>

                <div class="input-field">
                    <p>Password</p>
                    <input type="password" name="password" registered placeholder="enter your password" maxlength="50" required>
                </div>

                <div class="input-field">
                    <p>Confirm Password</p>
                    <input type="password" name="password" registered placeholder="confirm password" maxlength="50" required>
                </div>
                <div class="input-field">
                    <input type="submit" name="submit" value="REGISTER" class="btn">
                </div>
                <p>Already have an account? <a href="login.php">Login now</a></p>
            </form>
        </section>
    </div>
</body>
</html>