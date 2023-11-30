<?php
include "dbconfig.php";

// Query to retrieve categories
$sql = "SELECT id, categoryname FROM categorytb";
$result = $conn->query($sql);

$categoryTable = "<table class='table table-striped'>";
$categoryTable .= "<thead><tr><th>Category ID</th><th>Category Name</th></tr></thead><tbody>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categoryTable .= "<tr>";
        $categoryTable .= "<td>" . $row['id'] . "</td>";
        $categoryTable .= "<td>" . $row['categoryname'] . "</td>";
        $categoryTable .= "</tr>";
    }
}

$categoryTable .= "</tbody></table>";

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
            echo "<div class='alert alert-success'>Category added successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding category: " . $conn->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Category already exists. Please choose a different category name.</div>";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category Management</title>
    <!-- Bootstrap CSS -->
    <?php
include("admin_dashboard.php"); ?>
   </head>
<body>
    <div class="container mt-4">
        <h2>Categories</h2>
        <div class="row">
            <div class="col-md-6">
                <h3>Existing Categories:</h3>
                <?php echo $categoryTable; ?>
            </div>
            <div class="col-md-6">
                <h3>Add a New Category:</h3>
                <form method="post">
                    <div class="mb-3">
                        <label for="newcategory" class="form-label">Category Name:</label>
                        <input type="text" class="form-control" name="newcategory" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
