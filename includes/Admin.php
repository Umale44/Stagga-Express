<?php
include 'connection.php';
include 'User.php';
class Admin extends User {

    public function __construct($username, $password) {
        parent::__construct($username, $password, 'admin');
        $this->adminID = $adminID;
    }   

    public function __toString() {
        return "Username: " . $this->getUsername() . "<br>" .
        "Username: " . $this->adimnID . "<br>";
    }
}

?>
