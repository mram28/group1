<?php
include "dbconfig.php";


// Query to retrieve categories for the dropdown list
$categoryQuery = "SELECT id, categoryname FROM categorytb";
$categoryResult = $conn->query($categoryQuery);
$categoryOptions = "";
if ($categoryResult->num_rows > 0) {
    while ($row = $categoryResult->fetch_assoc()) {
        $categoryOptions .= "<option value='" . $row['categoryname'] . "'>" . $row['categoryname'] . "</option>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data from the form
    $category = $_POST['category'];
    $supplyName = $_POST['supplyname'];
    $quantityToAdd = $_POST['quantityToAdd'];
    $expiration = $_POST['expiration']; // Added this line for expiration

    // Check if the category exists in the 'categorytb' table
    $categorySql = "SELECT id FROM categorytb WHERE categoryname = '$category'";
    $categoryResult = $conn->query($categorySql);

    if ($categoryResult->num_rows == 1) {
        $categoryRow = $categoryResult->fetch_assoc();
        $categoryId = $categoryRow['id'];

        // Check if the supply already exists in the 'suppliestb' table
        $supplySql = "SELECT id, initialqty, qtygiventopatient FROM suppliestb WHERE supplyname = '$supplyName'";
        $supplyResult = $conn->query($supplySql);

        if ($supplyResult->num_rows > 0) {
            $supplyRow = $supplyResult->fetch_assoc();
            $supplyId = $supplyRow['id'];
            $initialQty = $supplyRow['initialqty'];
            $qtyGiven = $supplyRow['qtygiventopatient'];

            // Update initial quantity and quantity left
            $newInitialQty = $initialQty + $quantityToAdd;
            $newQtyLeft = $newInitialQty - $qtyGiven;

            // Update the 'suppliestb' table with expiration
            $updateSql = "UPDATE suppliestb SET initialqty = $newInitialQty, qtyleft = $newQtyLeft, category_id = $categoryId, expiration = '$expiration' WHERE id = $supplyId";
            if ($conn->query($updateSql) === TRUE) {
                echo "Supply updated successfully.";
                insertActivityLog($username, 'Supply Updated');
            } else {
                echo "Error updating supply: " . $conn->error;
            }
        } else {
            // Add the new supply to the 'suppliestb' table with expiration
            $insertSql = "INSERT INTO suppliestb (supplyname, initialqty, qtyleft, category_id, expiration) VALUES ('$supplyName', $quantityToAdd, $quantityToAdd, $categoryId, '$expiration')";
            if ($conn->query($insertSql) === TRUE) {
                echo "Supply added successfully.";
                insertActivityLog($username, 'Supply Added');
            } else {
                echo "Error adding supply: " . $conn->error;
            }
        }
    } else {
        echo "Category not found. Please check the category name.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add New Supplies</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <?php include("admin_dashboard.php"); ?>
    <style>
        /* Inline CSS for demonstration purposes */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select,
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
       
        .btn-info:hover {
            background-color: #0056b3;
        }
    </style>
       
</head>
<body>
<h2>Add New Supplies</h2>
    <form method="post">
        <label for="category">Category:</label>
        <select name="category">
            <?php echo $categoryOptions; ?>
        </select>
        <br>
        <label for="supplyname">Supply Name:</label>
        <input type="text" name="supplyname" required>
        <br>
        <label for="expiration">Expiration Date:</label>
        <input type="date" name="expiration" required>
        <br>
        <label for="quantityToAdd">Quantity to Add:</label>
        <input type="number" name="quantityToAdd" required>
        <br>
        <input type="submit" value="Add Supply">
        <button class="btn-info my-5"><a href="supplies.php" class="text-light">Back</a></button>
    </form>
</body>
</html>
