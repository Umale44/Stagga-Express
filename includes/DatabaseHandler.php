<?php

class DatabaseHandler {
    
    public function login($username, $password) {
        try {
            require_once "connection.php";
            require_once "login.php";
            require_once "User.php";
            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Username exists, verify password
                if ($user['password'] === $password) {
                    // Password is correct
                    if ($user['usertype'] === 'customer') {
                        // Fetch customer data
                        $stmt = $this->pdo->prepare("SELECT * FROM customer WHERE username = :username");
                        $stmt->bindParam(':username', $username);
                        $stmt->execute();
                        $customerData = $stmt->fetch(PDO::FETCH_ASSOC);

                        // Create and return a Customer object
                        return new Customer(
                            $customerData[$username],
                            $customerData[$password],
                            $customerData['name'],
                            $customerData['surname'],
                            $customerData['address'],
                            $customerData['email'],
                            $customerData['age']
                        );
                    } else {
                        // For other user types (e.g., seller, admin), return the user data
                        return $user;
                    }
                } else {
                    // Password is incorrect
                    return false;
                }
            } else {
                // Username does not exist
                return false;
            }
        } catch (PDOException $e) {
            // Handle database errors (e.g., throw an exception or log the error)
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // Add other methods for handling database queries as needed
}
?>
