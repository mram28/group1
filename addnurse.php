<?php
include "dbconfig.php"; // Include your database connection configuration file
// Check if the nurse is logged in
include "footer.php";
session_start();
if (!isset($_SESSION["username"])) {
header("Location: login.php");
exit();
}

// Get the nurse's username from the session
$adminusername = $_SESSION["username"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $contactNo = $_POST["contact_no"];
    $address = $_POST["address"];

    // Query to insert a new nurse into 'nursetb'
    $insertSql = "INSERT INTO nursetb (username, password, name, contact_no, address) VALUES ('$username', '$password', '$name', '$contactNo', '$address')";

    if ($conn->query($insertSql) === TRUE) {
        echo "Nurse added successfully.";
        insertActivityLog($adminusername, 'Nurse Added');
    } else {
        echo "Error adding nurse: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Nurse</title>
</head>
<body>
    <h1>Add New Nurse</h1>
    <form action="addnurse.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="contact_no">Contact Number:</label>
        <input type="text" name="contact_no" required>
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" required>
        <br>
        <input type="submit" value="Add Nurse">
        <button class="btn-info my-5"><a href="admin_interface.php" class="text-light">Back</a></button>
    </form>
</body>
</html>
