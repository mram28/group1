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
            <button class="btn-info my-5"><a href="patient.php" class="text-light">Patient</a></button>
            <button class="btn-info my-5"><a href="addpatient.php" class="text-light">Add Patient</a></button>
            <button class="btn-info my-5"><a href="medicine.php" class="text-light">Medicine</a></button>
            <button class="btn-info my-5"><a href="supplies.php" class="text-light">Supplies</a></button>
            <button class="btn-info my-5"><a href="category.php" class="text-light">Category</a></button>
            <button class="btn-info my-5"><a href="expiration.php" class="text-light">View Expirations</a></button>
            <button class="btn-info my-5"><a href="printable_report.php" class="text-light">Report</a></button>
            <button class="btn-info my-5"><a href="activitylog.php" class="text-light">Logs</a></button>
           
    
    <table>
        <tr>
            <th>ID</th>
            <th>Patient Name</th>
            <th>Medicine Given</th>
            <th>Quantity Given</th>
            <th>Remarks</th>
        </tr>
<?php
include "dbconfig.php";
include "footer.php";
// Query to retrieve patient data from the 'patienttb' table
$sql = "SELECT * FROM patienttb ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["patient_name"] . "</td>";
        echo "<td>" . $row["medgiven"] . "</td>";
        echo "<td>" . $row["qty"] . "</td>";
        echo "<td>" . $row["remarks"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No patient records found.";
}
$conn->close();
?>
</table>
</body>
</html>