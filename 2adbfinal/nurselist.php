<?php
include "dbconfig.php"; // Include your database connection configuration file
include "footer.php";
// Query to retrieve all nurses' information from 'nursetb'
$sql = "SELECT * FROM nursetb";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse List</title>
</head>
            <button class="btn-info my-5"><a href="admin_interface.php" class="text-light">Admin Profile</a></button>
            <button class="btn-info my-5"><a href="nurselist.php" class="text-light">Nurse Lists</a></button>
            <button class="btn-info my-5"><a href="addnurse.php" class="text-light">Add Nurse</a></button>
            <button class="btn-info my-5"><a href="patient.php" class="text-light">Patient</a></button>
            <button class="btn-info my-5"><a href="medicine.php" class="text-light">Medicine</a></button>
            <button class="btn-info my-5"><a href="supplies.php" class="text-light">Supplies</a></button>
            <button class="btn-info my-5"><a href="expiration.php" class="text-light">View Expirations</a></button>
            <button class="btn-info my-5"><a href="printable_report.php" class="text-light">Report</a></button>
            <button class="btn-info my-5"><a href="activitylog.php" class="text-light">Logs</a></button>
           
<body>
    <h1>Nurse List</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["contact_no"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>
                <button class='btn btn-primary'><a href='updatenurse.php?id=" . $row["id"] . "' class='text-light'>Update</a></button>
                </td>";
            echo "<td>
                <button class='btn btn-danger'><a href='deletedialog.php?deleteid=" . $row["id"] . "' class='text-light'>Delete</a></button>
                </td>";
            echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No nurses found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
