<?php
include "dbconfig.php";
include "footer.php";
// Query to retrieve categories
$sql = "SELECT id, categoryname FROM categorytb";
$result = $conn->query($sql);

$categoryTable = "<table>";
$categoryTable .= "<tr><th>Category ID</th><th>Category Name</th></tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categoryTable .= "<tr>";
        $categoryTable .= "<td>" . $row['id'] . "</td>";
        $categoryTable .= "<td>" . $row['categoryname'] . "</td>";
        $categoryTable .= "</tr>";
    }
}

$categoryTable .= "</table";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data from the form
    $newCategory = $_POST['newcategory'];

    // Check if the category already exists
    $checkSql = "SELECT id FROM categorytb WHERE categoryname = '$newCategory'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows == 0) {
        // Add the new category to the 'categorytb' table
        $insertSql = "INSERT INTO categorytb (categoryname) VALUES ('$newCategory')";
        if ($conn->query($insertSql) === TRUE) {
            echo "Category added successfully.";
            insertActivityLog($username, 'Category Added');
        } else {
            echo "Error adding category: " . $conn->error;
        }
    } else {
        echo "Category already exists. Please choose a different category name.";
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
    <title></title>
</head>
<body>
    <h1>RHU Meds and Supply Inventory</h1>
    <button class="btn-info my-5"><a href="admin_interface.php" class="text-light">Admin Profile</a></button>
    <button class="btn-info my-5"><a href="patient.php" class="text-light">Patient</a></button>
            <button class="btn-info my-5"><a href="medicine.php" class="text-light">Medicine</a></button>
            <button class="btn-info my-5"><a href="supplies.php" class="text-light">Supplies</a></button>
            <button class="btn-info my-5"><a href="category.php" class="text-light">Category</a></button>
            <button class="btn-info my-5"><a href="expiration.php" class="text-light">View Expirations</a></button>
            <button class="btn-info my-5"><a href="printable_report.php" class="text-light">Report</a></button>
            <button class="btn-info my-5"><a href="activitylog.php" class="text-light">Logs</a></button>
            
<body>
    <h2>Categories</h2>
    <h3>Existing Categories:</h3>
    <?php echo $categoryTable; ?>

    <h3>Add a New Category:</h3>
    <form method="post">
        <label for="newcategory">Category Name:</label>
        <input type="text" name="newcategory" required>
        <input type="submit" value="Add Category">
    </form>
</body>
</html>
