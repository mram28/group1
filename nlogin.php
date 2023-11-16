<?php
session_start();
include "dbconfig.php"; // Include your database connection configuration file
include "footer.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check if the username and password match in the 'nursetb' table
    $query = "SELECT * FROM nursetb WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION["username"] = $username;
        header("Location: nurse_interface.php"); // Redirect to the nurse interface
        insertActivityLog($username, 'Nurse Login');
        exit();
    } else {
        // Login failed
        $error = "Invalid username or password. Please try again.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nurse Login</title>
</head>
<body>
    <h1>Nurse Login</h1>
    <?php if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    } ?>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Login">
        <button class="btn-info my-5"><a href="index.html" class="text-light">Back</a></button>
    </form>
</body>
</html>
