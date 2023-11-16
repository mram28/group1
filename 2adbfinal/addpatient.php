<?php
// Initialize variables
$patient_name = "";
$medname = "";
$qty = "";
$remarks = "";
$error = false;

// Connect to the database
include("dbconfig.php");
include "footer.php";

// Check if the nurse is logged in
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Get the nurse's username from the session
$username = $_SESSION["username"];

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = trim($_POST["patient_name"]);
    $medname = trim($_POST["medname"]);
    $qty = trim($_POST["qty"]);
    $remarks = trim($_POST["remarks"]);

    // Check if the input is empty
    if (empty($patient_name) || empty($medname) || empty($qty) || empty($remarks)) {
        $error = true;
    } else {
        // Start a transaction for data consistency
        $conn->begin_transaction();

        try {
            // Prepare the SQL statement for patienttb
            $sqlPatient = "INSERT INTO patienttb (patient_name, medgiven, qty, remarks) VALUES (?, ?, ?, ?)";
            $stmtPatient = $conn->prepare($sqlPatient);

            // Bind the parameters for patienttb
            $stmtPatient->bind_param("ssss", $patient_name, $medname, $qty, $remarks);

            // Execute the statement for patienttb
            if (!$stmtPatient->execute()) {
                throw new Exception("Error adding patient: " . $conn->error);
            }

            // Close the statement for patienttb
            $stmtPatient->close();

            // Prepare the SQL statement for updating medicinetb
            $sqlMedicine = "UPDATE medicinetb SET qtyleft = qtyleft - ?, qtygiventopatient = qtygiventopatient + ? WHERE medname = ?";
            $stmtMedicine = $conn->prepare($sqlMedicine);

            // Bind the parameters for updating medicinetb
            $stmtMedicine->bind_param("iis", $qty, $qty, $medname);

            // Execute the statement for updating medicinetb
            if (!$stmtMedicine->execute()) {
                throw new Exception("Error updating medicine quantity: " . $conn->error);
            }

            // Close the statement for updating medicinetb
            $stmtMedicine->close();

            // Prepare the SQL statement for updating suppliestb
            $sqlSupplies = "UPDATE suppliestb SET qtygiventopatient = qtygiventopatient + ?, qtyleft = initialqty - qtygiventopatient WHERE supplyname = ?";
            $stmtSupplies = $conn->prepare($sqlSupplies);

            // Bind the parameters for updating suppliestb
            $stmtSupplies->bind_param("is", $qty, $medname);

            // Execute the statement for updating suppliestb
            if (!$stmtSupplies->execute()) {
                throw new Exception("Error updating supplies quantity: " . $conn->error);
            }

            // Close the statement for updating suppliestb
            $stmtSupplies->close();

            // Commit the transaction
            $conn->commit();

            echo "Patient and inventory updated successfully.";
            insertActivityLog($username, 'Patient Added');
        } catch (Exception $e) {
            // Rollback the transaction on error
            $conn->rollback();
            echo "Transaction failed: " . $e->getMessage();
        }
    }

    // Close the connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
</head>
<body>
    <h2>Add Patient</h2>
    <form method="post">
        <label for="patient_name">Patient Name:</label>
        <input type="text" name="patient_name" value="<?php echo $patient_name; ?>" required>
        <br>
        <label for="medname">Medicine Name:</label>
        <input type="text" name="medname" value="<?php echo $medname; ?>" required>
        <br>
        <label for="qty">Quantity:</label>
        <input type="text" name="qty" value="<?php echo $qty; ?>" required>
        <br>
        <label for="remarks">Remarks:</label>
        <input type="text" name="remarks" value="<?php echo $remarks; ?>" required>
        <br>
        <input type="submit" value="Add Patient">
        <button class="btn-info my-5"><a href="patient.php" class="text-light">Back</a></button>
    </form>
    <?php
        if ($error) {
            echo "<p style='color:red;'>Please fill in all required fields.</p>";
        }
    ?>
</body>
</html>