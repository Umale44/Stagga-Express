<?php
    class User{
        private $username;
        private $password;
        private $passwordHash;
        private $userType;

        public function __construct($username = "", $password = "", $userType = "") {
            $this->username = $username;
            $this->password = $password;
            $this->userType = $userType;
        }
        
        public function getUsername() {
            return $this->username;
        }
        
        public function setUsername($username) {
             $this->username = $username;
        }

        public function setPassword($password) {
            // Hash the password before storing it
            $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
        }

        public function getUserType() {
            return $this->userType;
        }
        
        public function setUserType($userType) {
             $this->userType = $userType;
        }
   
        public function login($username, $password) {
            require_once "DatabaseHandler.php"; // Include the DatabaseHandler class
            require_once "connection.php"; // Include the connection file to access $pdo
            require_once "login.php";
        
            // Call the login method in the DatabaseHandler to verify credentials and retrieve customer data
            $db = new DatabaseHandler(); // Pass $pdo to the constructor
            return $db->login($username, $password);
        }      
    }
?>