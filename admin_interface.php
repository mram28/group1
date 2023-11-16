<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <h1>RHU Meds and Supply Inventory</h1>
            <button class="btn-info my-5"><a href="admin_interface.php" class="text-light">Admin Profile</a></button>
            <button class="btn-info my-5"><a href="nurselist.php" class="text-light">Nurse Lists</a></button>
            <button class="btn-info my-5"><a href="addnurse.php" class="text-light">Add Nurse</a></button>
            <button class="btn-info my-5"><a href="patient.php" class="text-light">Patient</a></button>
            <button class="btn-info my-5"><a href="medicine.php" class="text-light">Medicine</a></button>
            <button class="btn-info my-5"><a href="supplies.php" class="text-light">Supplies</a></button>
            <button class="btn-info my-5"><a href="expiration.php" class="text-light">View Expirations</a></button>
            <button class="btn-info my-5"><a href="printable_report.php" class="text-light">Report</a></button>
            <button class="btn-info my-5"><a href="activitylog.php" class="text-light">Logs</a></button>
            <button class="btn-info my-5" onclick="logOut()">Log out</button>
    <!-- Add, update, view stocks, etc. forms and functionality -->
    <!-- JavaScript function to send a request to logout.php when Log out is clicked -->
    <script>
        function logOut() {
            // Send a request to logout.php
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "logout.php", true);
            xhr.send();
            
            // Redirect to the login page
            window.location.href = "index.html";
        }
    </script>
    
</body>
</html>
<?php
session_start();
include "dbconfig.php";
include "footer.php";

// Check if the nurse is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];

// Query to retrieve nurse profile from 'nursetb'
$sql = "SELECT * FROM admintb WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $name = $row["name"];
    $contactNo = $row["contact_no"];
    $address = $row["address"];
} else {
    // Handle the case where the nurse profile is not found
    // You can redirect to an error page or display an error message
    echo "Error: Nurse profile not found.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
</head>
<body>
    <h1>Admin Profile</h1>
    <p>Welcome, <?php echo $name; ?>!</p>
    <ul>
        <li>ID: <?php echo $id; ?></li>
        <li>Name: <?php echo $name; ?></li>
        <li>Contact Number: <?php echo $contactNo; ?></li>
        <li>Address: <?php echo $address; ?></li>
    </ul>
    <button class="btn-info my-5"><a href="updateadmin.php?id=<?php echo $id; ?>" class="text-light">Update Admin</a></button>

    <!-- Add additional content as needed -->
</body>
</html>

