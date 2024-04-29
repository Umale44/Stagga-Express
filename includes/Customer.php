<?php
    include 'User.php';
    class Customer extends User {
        private $customerID;
        private $firstname;
        private $lastname;
        private $address;
        private $emailAddress;
        private $age;
    
        public function __construct($username, $password, $customerID, $firstname, $lastname, $address, $emailAddress, $age) {
            parent::__construct($username, $password, 'customer');
            $this->customerID = $customerID;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->address = $address;
            $this->emailAddress = $emailAddress;
            $this->age = $age;
        }
    
        // Getters and setters for the additional attributes
        public function getCustomerID() {
            return $this->CustomerID;
        }
    
        public function setCustomerID($customerID) {
            $this->customerID = $customerID;
        }

        public function getFirstname() {
            return $this->firstname;
        }
    
        public function setFirstname($firstname) {
            $this->firstname = $firstname;
        }
    
        public function getLastname() {
            return $this->lastname;
        }
    
        public function setLastname($lastname) {
            $this->lastname = $lastname;
        }
    
        public function getAddress() {
            return $this->address;
        }
    
        public function setAddress($address) {
            $this->address = $address;
        }
    
        public function getEmailAddress() {
            return $this->emailAddress;
        }
    
        public function setEmailAddress($emailAddress) {
            $this->emailAddress = $emailAddress;
        }
    
        public function getAge() {
            return $this->age;
        }
    
        public function setAge($age) {
            $this->age = $age;
        }
        public function __toString() {
            return 
                   "CustomerID: " . $this->customerID . "<br>" .
                   "Username: " . $this->getUsername() . "<br>" .
                   "Name: " . $this->firstname . "<br>" .
                   "Surname: " . $this->lastname . "<br>" .
                   "Address: " . $this->address . "<br>" .
                   "Email: " . $this->emailAddress . "<br>" .
                   "Age: " . $this->age . "<br>";
        }
        
    }
    
?>