
<?php
// Prevent caching
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Redirect to the index page
header("Location: ../index.php");


// Destroy the session
session_destroy();
exit();

?>
<script>
    // Prevent going back to previous page after logout
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>

