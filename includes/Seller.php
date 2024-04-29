<?php
include 'connection.php';
include 'User.php';
class Seller extends User {

    
    public function __construct($username) {
        parent::__construct($username, $password, 'seller');
    }

    public function getSellerByUsername($username, $pdo) {
        $query = "SELECT * FROM Seller WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':username' => $username));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function getStoreID() {
        // Assuming you have a username property in the Seller class
        $query = "SELECT storeID FROM Store WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':username' => $username));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['storeID'];
    }

    public function __toString() {
        return "Username: " . $this->getUsername() . "<br>";
               
    }
}

?>
