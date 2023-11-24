<?php
session_start();
include "dbconfig.php"; // Include your database connection configuration file
include "footer.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check if the username and password match in the 'admintb'
    $query = "SELECT * FROM admintb WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION["username"] = $username;
        
        // insert into activitylogtb
        insertActivityLog($username, 'Admin Login');

        // Redirect to the admin interface
        header("Location: admin_interface.php");
        exit();
    } else {
        // Login failed
        $error = "Invalid username or password. Please try again.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        text-align: center;
        margin: 50px;
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    form {
        width: 300px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        padding: 12px;
        border: none;
        border-radius: 4px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    p.error {
        color: red;
        margin-top: 10px;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 8px 16px;
        border: none;
        text-decoration: none;
        cursor: pointer;
        border-radius: 4px;
    }

    button:hover {
        background-color: #0056b3;
    }

    a {
        text-decoration: none;
        color: #007bff;
        margin-top: 10px;
        display: inline-block;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

</head>
<body>
    <h1>Admin Login</h1>
    <?php if (isset($error)) {
        echo "<p class='error'>$error</p>";
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
