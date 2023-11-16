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
            <button class="btn-info my-5"><a href="medicine.php" class="text-light">Medicine</a></button>
            <button class="btn-info my-5"><a href="insertmed.php" class="text-light">Add Medicine</a></button>
            <button class="btn-info my-5"><a href="supplies.php" class="text-light">Supplies</a></button>
            <button class="btn-info my-5"><a href="category.php" class="text-light">Category</a></button>
            <button class="btn-info my-5"><a href="expiration.php" class="text-light">View Expirations</a></button>
            <button class="btn-info my-5"><a href="printable_report.php" class="text-light">Report</a></button>
            <button class="btn-info my-5"><a href="activitylog.php" class="text-light">Logs</a></button>
            
<table>
    <tr>
        <th>ID</th>
        <th>Medicine Name</th>
        <th>Expiration</th>
        <th>Initial Quantity</th>
        <th>Quantity Released</th>
        <th>Quantity Left</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php
    include "dbconfig.php";
    include "footer.php";
    // Query to retrieve medicine data
    $sql = "SELECT * FROM medicinetb";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"]; // Get the medicine ID

            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $row["medname"] . "</td>";
            echo "<td>" . $row["expiration"] . "</td>";
            echo "<td>" . $row["initialqty"] . "</td>";
            echo "<td>" . $row["qtygiventopatient"] . "</td>";
            echo "<td>" . $row["qtyleft"] . "</td>";
            echo "<td>
                <button class='btn btn-primary'><a href='updatemed.php?updateid=$id' class='text-light'>Update</a></button>
                </td>";
            echo "<td>
                <button class='btn btn-danger'><a href='deletedialog.php?deleteid=$id' class='text-light'>Delete</a></button>
                </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No records found</td></tr>";
    }
    ?>
</table>
    <!-- Add, update, or perform other actions here -->
</body>
</html>
