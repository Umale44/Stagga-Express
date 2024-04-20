<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];

    try {
        require_once "connection.php";
        $query = "INSERT INTO users (username, name, surname, email, address, usertype, password) VALUES
            (:username, :name, :surname, :email, :address, 'customer', :password);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":surname", $surname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        $pdo = null;
        $stmt = null;
        header("Location: signup.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} 
