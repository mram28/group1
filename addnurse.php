<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Nurse</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
        /* ... */
    </style>
</head>
<body>
    <!-- Include necessary PHP files and start session -->
    <?php
    session_start();
    include "admin_dashboard.php";
    include "dbconfig.php";

    // Check if the nurse is logged in
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }

    $adminusername = $_SESSION["username"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $contactNo = $_POST["contact_no"];
        $address = $_POST["address"];

        // Query to insert a new nurse into 'nursetb'
        $insertSql = "INSERT INTO nursetb (username, password, name, contact_no, address) VALUES ('$username', '$password', '$name', '$contactNo', '$address')";

        if ($conn->query($insertSql) === TRUE) {
            echo "Nurse added successfully.";
            // insertActivityLog($adminusername, 'Nurse Added');
        } else {
            echo "Error adding nurse: " . $conn->error;
        }
    }
    $conn->close();
    ?>

    <!-- Button to trigger the modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNurseModal">
        Add Nurse
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addNurseModal" tabindex="-1" aria-labelledby="addNurseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addNurseModalLabel">Add New Nurse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding a new nurse -->
                    <form action="addnurse.php" method="post">
                        <label for="username">Username:</label>
                        <input type="text" name="username" required><br>

                        <label for="password">Password:</label>
                        <input type="password" name="password" required><br>

                        <label for="name">Name:</label>
                        <input type="text" name="name" required><br>

                        <label for="contact_no">Contact Number:</label>
                        <input type="text" name="contact_no" required><br>

                        <label for="address">Address:</label>
                        <input type="text" name="address" required><br>

                        <input type="submit" value="Add Nurse" class="btn btn-primary mt-3">
                        <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Footer -->
    <?php include "footer.php"; ?>
</body>
</html>
