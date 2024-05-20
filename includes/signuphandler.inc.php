<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $emailAddress = $_POST["email"];
    $address = $_POST["address"];
    $firstname = $_POST["name"];
    $surname = $_POST["surname"];
    $age = $_POST["age"];

    try {
        require_once "connection.php";

        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert user into users table
        $query = "INSERT INTO users (username, password, usertype) VALUES (:username, :password, 'customer')";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashedPassword);
        $stmt->execute();

        // Insert customer details into customer table
        $query = "INSERT INTO customer (username, firstname, surname, address, emailAddress, age) VALUES (:username, :firstname, :surname, :address, :emailAddress, :age)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":surname", $surname);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":emailAddress", $emailAddress);
        $stmt->bindParam(":age", $age);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        echo '<script>alert("Sign up successful. Click OK to proceed to login."); window.location = "login.php";</script>';
        exit(); // Prevent further execution
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
?>
