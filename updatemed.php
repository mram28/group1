<?php
include "dbconfig.php";
include "footer.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data from the form
    $medName = $_POST['medname'];
    $quantityToAdd = $_POST['quantityToAdd'];
    $expirationDate = $_POST['expiration'];

    // Check if the medicine already exists in the table
    $sql = "SELECT id, initialqty, qtygiventopatient FROM medicinetb WHERE medname = '$medName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $medicineId = $row['id'];
        $initialQty = $row['initialqty'];
        $qtyGiven = $row['qtygiventopatient'];

        // Update initial quantity and quantity left
        $newInitialQty = $initialQty + $quantityToAdd;
        $newQtyLeft = $newInitialQty - $qtyGiven;

        // Update the medicinetb table
        $updateSql = "UPDATE medicinetb SET initialqty = $newInitialQty, qtyleft = $newQtyLeft, expiration = '$expirationDate' WHERE id = $medicineId";
        if ($conn->query($updateSql) === TRUE) {
            echo "Medicine Updated successfully.";
            insertActivityLog($username, 'Medicine Updated');
        } else {
            echo "Error updating medicine: " . $conn->error;
        }
    } else {
        echo "Medicine not found. Please check the medicine name.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Medicine</title>
</head>
<body>
    <h2>Update Medicine</h2>
    <form method="post">
        <label for="medname">Medicine Name:</label>
        <input type="text" name="medname" required>
        <br>
        <label for="expiration">Expiration Date:</label>
        <input type="date" name="expiration" required>
        <br>
        <label for="quantityToAdd">Quantity:</label>
        <input type="number" name="quantityToAdd" required>
        <br>
        <input type="submit" value="Add Medicine">
        <button class="btn-info my-5"><a href="medicine.php" class="text-light">Back</a></button>
    </form>
</body>
</html>
