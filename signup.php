<?php 
    //register user
    include 'includes/signuphandler.inc.php'
    
?>

<style>
    <?php include 'stagga-style.css';?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <link rel="icon" href="staggalogosmall.png"
		type="image/x-icon">
    <title>Stagga Express | The Home of express delivery | Create your account</title>
</head>
<body>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
            <a href="index.php"><img src="staggalogosmall.png" alt="staggalogo"></a>
                <h1>SIGN UP</h1>
                <p>Don't have an account?. Sign up here</p>

            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p>your name <sup>*</sup></p>
                    <input type="text" name="name" registered placeholder="enter your name" maxlength="50">
                </div>

                <div class="input-field">
                    <p>your surname <sup>*</sup></p>
                    <input type="text" name="surname" registered placeholder="enter your surname" maxlength="50">
                </div>

                <div class="input-field">
                    <p>your address <sup>*</sup></p>
                    <input type="text" name="address" registered placeholder="enter your address" maxlength="50"
                    oninput="this.value = this.value.replace(/\s/g,'')">
                </div>

                <div class="input-field">
                    <p>age <sup>*</sup></p>
                    <input type="number" name="age" registered placeholder="enter your age" maxlength="50"
                    oninput="this.value = this.value.replace(/\s/g,'')">
                </div>

                <div class="input-field">
                    <p>your email <sup>*</sup></p>
                    <input type="text" name="email" registered placeholder="enter your email address" maxlength="50"
                    oninput="this.value = this.value.replace(/\s/g,'')">
                </div>

                <div class="input-field">
                    <p>your username <sup>*</sup></p>
                    <input type="text" name="username" registered placeholder="enter your username" maxlength="50">
                </div>

                <div class="input-field">
                    <p>your password <sup>*</sup></p>
                    <input type="password" name="password" registered placeholder="enter your password" maxlength="50"
                    oninput="this.value = this.value.replace(/\s/g,'')">
                </div>

                <div class="input-field">
                    <p>confirm password <sup>*</sup></p>
                    <input type="password" name="password" registered placeholder="confirm password" maxlength="50"
                    oninput="this.value = this.value.replace(/\s/g,'')">
                </div>
                <input type="submit" name="submit" value="register now" class="btn">
                <p>Already have an account? <a href="login.php">Login now</a></p>
            </form>
        </section>
    </div>
</body>
</html>