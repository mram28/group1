<?php
include "dbconfig.php";
include "footer.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data from the form
    $category = $_POST['category'];
    $medName = $_POST['medname'];
    $quantityToAdd = $_POST['quantityToAdd'];
    $expiration = $_POST['expiration'];  // Added this line

    // Check if the category exists in the 'categorytb' table
    $categorySql = "SELECT id FROM categorytb WHERE categoryname = '$category'";
    $categoryResult = $conn->query($categorySql);

    if ($categoryResult->num_rows == 1) {
        $categoryRow = $categoryResult->fetch_assoc();
        $categoryId = $categoryRow['id'];

        // Check if the medicine already exists in the 'medicinetb' table
        $medicineSql = "SELECT id, initialqty, qtygiventopatient FROM medicinetb WHERE medname = '$medName'";
        $medicineResult = $conn->query($medicineSql);

        if ($medicineResult->num_rows > 0) {
            $medicineRow = $medicineResult->fetch_assoc();
            $medicineId = $medicineRow['id'];
            $initialQty = $medicineRow['initialqty'];
            $qtyGiven = $medicineRow['qtygiventopatient'];

            // Update initial quantity and quantity left
            $newInitialQty = $initialQty + $quantityToAdd;
            $newQtyLeft = $newInitialQty - $qtyGiven;

            // Update the 'medicinetb' table with expiration
            $updateSql = "UPDATE medicinetb SET initialqty = $newInitialQty, qtyleft = $newQtyLeft, category_id = $categoryId, expiration = '$expiration' WHERE id = $medicineId";
            if ($conn->query($updateSql) === TRUE) {
                echo "Medicine updated successfully.";
                insertActivityLog($username, 'Medcine Update');
            } else {
                echo "Error updating medicine: " . $conn->error;
            }
        } else {
            // Add the new medicine to the 'medicinetb' table with expiration
            $insertSql = "INSERT INTO medicinetb (medname, initialqty, qtyleft, category_id, expiration) VALUES ('$medName', $quantityToAdd, $quantityToAdd, $categoryId, '$expiration')";
            if ($conn->query($insertSql) === TRUE) {
                echo "Medicine added successfully.";
                insertActivityLog($username, 'Medicine Added');
            } else {
                echo "Error adding medicine: " . $conn->error;
            }
        }
    } else {
        echo "Category not found. Please check the category name.";
    }
}

// Retrieve categories for the dropdown list
$categoryQuery = "SELECT id, categoryname FROM categorytb";
$categoryResult = $conn->query($categoryQuery);
$categoryOptions = "";
if ($categoryResult->num_rows > 0) {
    while ($row = $categoryResult->fetch_assoc()) {
        $categoryOptions .= "<option value='" . $row['categoryname'] . "'>" . $row['categoryname'] . "</option>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Add New Medicine</title>
</head>
<body>
    <h2>Add New Medicine</h2>
    <form method="post">
        <label for="category">Category:</label>
        <select name="category">
            <?php echo $categoryOptions; ?>
        </select>
        <br>
        <label for="medname">Medicine Name:</label>
        <input type="text" name="medname" required>
        <br>
        <label for="expiration">Expiration Date:</label>
        <input type="date" name="expiration" required>
        <br>
        <br>
        <label for="quantityToAdd">Quantity to Add:</label>
        <input type="number" name="quantityToAdd" required>
        <br>
        <input type="submit" value="Add Medicine">
        <button class="btn-info my-5"><a href="medicine.php" class="text-light">Back</a></button>
    </form>
    </body>
</html>
