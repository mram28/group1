<?php
include "dbconfig.php"; // Include your database connection configuration file
include "footer.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $contactNo = $_POST["contact_no"];
    $address = $_POST["address"];

    // Query to update admin information in 'admintb'
    $updateSql = "UPDATE admintb SET username = '$username', password = '$password', name = '$name', contact_no = '$contactNo', address = '$address' WHERE id = $id";

    if ($conn->query($updateSql) === TRUE) {
        echo "Admin updated successfully.";

        // Log the activity
        insertActivityLog($username, 'Admin Updated');
        header("location:admin_interface.php");
        
    } else {
        echo "Error updating admin: " . $conn->error;
    }
}

// Check if an ID is provided in the query parameter
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Query to retrieve admin information by ID
    $selectSql = "SELECT * FROM admintb WHERE id = $id";
    $result = $conn->query($selectSql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $username = $row["username"];
        $password = $row["password"];
        $name = $row["name"];
        $contactNo = $row["contact_no"];
        $address = $row["address"];
    } else {
        // Handle the case where the admin is not found
        // You can redirect to an error page or display an error message
        echo "Error: Admin not found.";
        exit();
    }
} 

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin</title>
</head>
<body>
    <h1>Update Admin</h1>
    <form action="updateadmin.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $username; ?>" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" value="<?php echo $password; ?>" required>
        <br>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" required>
        <br>
        <label for="contact_no">Contact Number:</label>
        <input type="text" name="contact_no" value="<?php echo $contactNo; ?>" required>
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $address; ?>" required>
        <br>
        <input type="submit" value="Update Admin">
        <button class="btn-info my-5"><a href="admin_interface.php" class="text-light">Back</a></button>
    </form>
</body>
</html>
