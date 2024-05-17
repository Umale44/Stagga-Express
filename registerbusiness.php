<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $description = $_POST["description"];
    $storeAddress = $_POST["storeaddress"];
    $storeName = $_POST["storename"];
    $openingHours = $_POST["opening-hours"];

    // Image handling
    if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == UPLOAD_ERR_OK) {
        $targetDir = "business-acc/"; // Directory where images will be saved
        $fileName = basename($_FILES["logo"]["name"]);
        $targetFile = $targetDir . $fileName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["logo"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit();
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ["jpg", "webp", "png", "jpeg", "gif"])) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFile)) {
            echo "The file ". basename( $_FILES["logo"]["name"]). " has been uploaded.";

            // Check if any field is empty
            if (empty($username) || empty($password) || empty($storeAddress) || empty($description) || empty($openingHours) || empty($targetFile) || empty($storeName)) {
                echo '<script>alert("Please fill in all fields."); window.history.back();</script>';
                exit(); // Prevent further execution
            }

            try {
                require_once "includes/connection.php";

                // Insert user into users table
                $query = "INSERT INTO users (username, password, usertype) VALUES (:username, :password, 'business')";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $password);
                $stmt->execute();

                // Insert store details into store table
                $query = "INSERT INTO store (username, storeName, storeAddress, description, status, openingHours, logo) VALUES (:username, :storeName, :storeAddress, :description, 'Inactive', :openingHours, :logo)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":storeName", $storeName);
                $stmt->bindParam(":storeAddress", $storeAddress);
                $stmt->bindParam(":description", $description);
                $stmt->bindParam(":openingHours", $openingHours);
                $stmt->bindParam(":logo", $fileName);
                $stmt->execute();

                echo '<script>alert("Sign up successful. Click OK to proceed to login."); window.location = "login.php";</script>';
                exit(); // Prevent further execution
            } catch (PDOException $e) {
                die("Query failed: " . $e->getMessage());
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file uploaded or an error occurred.";
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
    <title>Stagga Express | The Home of express delivery | Register your Business</title>
</head>
<body>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
                <!--<img src="staggalogosmall.png" alt="logo">-->
                <h1>Register Business</h1>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <p>Store Name</p>
                    <input type="text" name="storename" registered placeholder="store name" maxlength="50">
                </div>

                <div class="input-field">
                    <p>Store Address</p>
                    <input type="text" name="storeaddress" registered placeholder="store address" maxlength="50">
                </div>
                <div class="input-field">
                    <p>Description</p>
                    <input type="text" name="description" registered placeholder="description" maxlength="255">
                </div>

                <div class="input-field">
                    <p>Opening Hours</p>
                    <input type="number" name="opening-hours" registered placeholder="opening hours" maxlength="2">
                </div>
                <div class="input-field">
                    <p>Logo</p>
                    <input type="file" name="logo">
                </div>

                <div class="input-field">
                    <p>Username</p>
                    <input type="text" name="username" registered placeholder="username" maxlength="50">
                </div>

                <div class="input-field">
                    <p>Password</p>
                    <input type="password" name="password" registered placeholder="password" maxlength="50"
                    oninput="this.value = this.value.replace(/\s/g,'')">
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


