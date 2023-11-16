<?php
include "dbconfig.php";
include "footer.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data from the form
    $supplyName = $_POST['supplyname'];
    $quantityToAdd = $_POST['quantityToAdd'];

    // Check if the supply already exists in the 'suppliestb' table
    $sql = "SELECT id, initialqty, qtygiventopatient FROM suppliestb WHERE supplyname = '$supplyName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $supplyId = $row['id'];
        $initialQty = $row['initialqty'];
        $qtyGiven = $row['qtygiventopatient'];

        // Update initial quantity and quantity left
        $newInitialQty = $initialQty + $quantityToAdd;
        $newQtyLeft = $newInitialQty - $qtyGiven;

        // Update the 'suppliestb' table
        $updateSql = "UPDATE suppliestb SET initialqty = $newInitialQty, qtyleft = $newQtyLeft WHERE id = $supplyId";
        if ($conn->query($updateSql) === TRUE) {
            echo "Supply added successfully.";
            insertActivityLog($username, 'Supply Updated');
        } else {
            echo "Error updating supply: " . $conn->error;
        }
    } else {
        echo "Supply not found. Please check the supply name.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Supply</title>
</head>
<body>
    <h2>Add Supply</h2>
    <form action="insertsupp.php" method="post">
        <label for="supplyname">Supply Name:</label>
        <input type="text" name="supplyname" required>
        <br>
        <label for="quantityToAdd">Quantity to Add:</label>
        <input type="number" name="quantityToAdd" required>
        <br>
        <input type="submit" value="Add Supply">
        <button class="btn-info my-5"><a href="supplies.php" class="text-light">Back</a></button>
    </form>
</body>
</html>
