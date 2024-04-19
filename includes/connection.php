<?php
    $dsn = "mysql:host=localhost;dbname=staggaexpress";
    $db_user = "root";
    $db_password = "";

    try{
        $pdo = new PDO($dsn, $db_user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
