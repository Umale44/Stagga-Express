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
                <img src="staggalogosmall.png" alt="logo">
                <h1>SIGN UP</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique quae quia reprehenderit nobis porro omnis libero cumque dolorem deleniti veniam blanditiis nihil repellendus nisi assumenda quibusdam eligendi, ullam sit a!</p>

            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p>your name <sup>*</sup></p>
                    <input type="text" name="name" registered placeholder="enter your name" maxlength="50">
                </div>

                <div class="input-field">
                    <p>your email <sup>*</sup></p>
                    <input type="text" name="email" registered placeholder="enter your email address" maxlength="50"
                    oninput="this.value = this.value.replace(/\s/g,'')">
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