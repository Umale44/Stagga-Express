<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        require_once "includes/connection.php";
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':username' => $username, ':password' => $password));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Start session and store user information
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: customer-acc/home.php");
            exit();
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
    <title>Stagga Express | The Home of express delivery | Log in to your account</title>
</head>
<body>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
                <img src="staggalogosmall.png" alt="logo">
                <h1>LOGIN</h1>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p>your username <sup>*</sup></p>
                    <input type="text" name="username" registered placeholder="enter your username" maxlength="50">
                </div>

                <div class="input-field">
                    <p>your password <sup>*</sup></p>
                    <input type="password" name="password" registered placeholder="enter your password" maxlength="50"
                    oninput="this.value = this.value.replace(/\s/g,'')">
                </div>
                <input type="submit" name="submit" value="LOGIN" class="btn">
                <p>Dont have an account? <a href="signup.php">Register now</a></p>
            </form>
        </section>
    </div>
</body>
</html>