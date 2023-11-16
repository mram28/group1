<?php
include "dbconfig.php"; // Include your database connection configuration file

// Function to insert log out activity
function logOutActivity($accountName) {
    insertActivityLog($accountName, 'Log Out');
}

// Check if the user is logged in
session_start();
if (isset($_SESSION["username"])) {
    // Get the username from the session
    $username = $_SESSION["username"];
    
    // Log out activity
    logOutActivity($username);
    
    // Clear the session
    session_unset();
    session_destroy();
}

// Redirect to the login page
header("Location: index.html");
exit();
?>
