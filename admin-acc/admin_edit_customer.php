<?php
// Include the necessary files and start the session
include '../includes/connection.php';
session_start();

// Check if the user is logged in as an administrator
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

// Check if a customer ID is provided in the URL
if (!isset($_GET['id'])) {
    header('Location: admin_view_accounts.php');
    exit();
}

$customerID = $_GET['id'];

// Query to get the customer details
$stmt = $pdo->prepare("SELECT * FROM customer WHERE customerID = ?");
$stmt->execute([$customerID]);
$customer = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$customer) {
    // Redirect if customer ID is not found
    header('Location: admin_view_accounts.php');
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];

    // Update the customer details
    $stmt = $pdo->prepare("UPDATE customer SET firstname = ?, email = ?, address = ?, phoneNumber = ? WHERE customerID = ?");
    $stmt->execute([$fullname, $email, $address, $phoneNumber, $customerID]);

    // Redirect to the customer list page
    header('Location: admin_view_accounts.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file here -->
</head>
<body>
    <div class="container">
        <h1>Edit Customer</h1>
        <form method="POST">
            <label for="firstname">First Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo $customer['firstname']; ?>" required><br><br>

            <label for="surname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo $customer['surname']; ?>" required><br><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $customer['emailAddress']; ?>" required><br><br>
            
            <label for="address">Address:</label>
            <textarea id="address" name="address" required><?php echo $customer['address']; ?></textarea><br><br>
            
            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" value="<?php echo $customer['age']; ?>" required><br><br>
            
            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
