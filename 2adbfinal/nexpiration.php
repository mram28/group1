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
    <button class="btn-info my-5"><a href="nurse_interface.php" class="text-light">Nurse Profile</a></button>
            <button class="btn-info my-5"><a href="npatient.php" class="text-light">Patient</a></button>
            <button class="btn-info my-5"><a href="nmedicine.php" class="text-light">Medicine</a></button>
            <button class="btn-info my-5"><a href="nsupplies.php" class="text-light">Supplies</a></button>
            <button class="btn-info my-5"><a href="ncategory.php" class="text-light">Category</a></button>
            <button class="btn-info my-5"><a href="nexpiration.php" class="text-light">View Expirations</a></button>
            <button class="btn-info my-5"><a href="nprintable_report.php" class="text-light">Report</a></button>
            <button class="btn-info my-5"><a href="nactivitylog.php" class="text-light">Logs</a></button>
            
    
    <table>
        <tr>
            <th>Medicine/Supply Name</th>
            <th>Expire Date</th>
        </tr>
<?php
include "dbconfig.php";
include "footer.php";
// Query to retrieve medicine and supply data with earliest expiration date first
$sql = "SELECT 'Medicine' AS type, medname AS name, expiration FROM medicinetb 
        UNION 
        SELECT 'Supply' AS type, supplyname AS name, expiration FROM suppliestb 
        ORDER BY expiration ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["expiration"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No expiring medicines or supplies found.";
}

$conn->close();
?>
</body>
</html>