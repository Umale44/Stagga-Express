<?php
include 'connection.php';
include 'User.php';
class Seller extends User {

    private $storeID;
    public function __construct($username, $password, $storeID) {
        parent::__construct($username, $password, 'seller');
        $this->storeID = $storeID;
    }

    public function getSellerByUsername($username, $pdo) {
        $query = "SELECT * FROM Seller WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':username' => $username));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function getStoreID() {
        return $this->storeID;
    }

    public function setStoreID() {
        $this->storeID = $storeID;
    }


    public function __toString() {
        return "Username: " . $this->getUsername() . "<br>" .
        "Username: " . $this->storeID . "<br>";
    }
}

?>
