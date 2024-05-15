<?php
// Start the session
session_start(); 
include 'connection.php';
include 'Seller.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plan = $_POST["plan"];
    
    //Retrieve storeID and storeName
    if (isset($_SESSION['store']) && !empty($_SESSION['store'])) {
        $serializedSeller = $_SESSION['store'];
        $seller = unserialize($serializedSeller);
        $storeID = $seller->getStoreID();
        
        $stmt = $pdo->prepare("SELECT storeName FROM store WHERE storeID = ?");
        $stmt->execute([$storeID]);
        // Assume $stmt is your PDOStatement object
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the next row as an associative array
        $storeName = $row['storeName']; // Access the 'storeName' column from the fetched row

    // Insert into Requests table
    $stmt = $pdo->prepare("INSERT INTO Requests (storeID, storeName, sellingPlan) VALUES (?, ?, ?)");
    $stmt->execute([$storeID, $storeName, $plan]);

    // Update status in Store table
    $stmt = $pdo->prepare("UPDATE store SET status = 'Pending' WHERE storeID = ?");
    $stmt->execute([$storeID]);

    // Return success response
    echo '<script>alert("Your request is currently being processed."); window.location = "../business-acc/home.php";</script>';
    exit();
    }
} else {
    echo "Invalid request.";
}
?>
