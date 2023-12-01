<?php
// Initialize variables with default values
$patient_name = isset($_POST['patient_name']) ? htmlspecialchars($_POST['patient_name']) : '';
$medname = isset($_POST['medname']) ? htmlspecialchars($_POST['medname']) : '';
$qty = isset($_POST['qty']) ? htmlspecialchars($_POST['qty']) : '';
$remarks = isset($_POST['remarks']) ? htmlspecialchars($_POST['remarks']) : '';
$error = false;

// Include necessary files
include("dbconfig.php");


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

            // Rest of your logic for updating tables goes here...

            // Commit the transaction
            $conn->commit();

            echo "Patient and inventory updated successfully.";
            insertActivityLog($username, 'Patient Added');
        } catch (Exception $e) {
            // Rollback the transaction on error
            $conn->rollback();
            echo "Transaction failed: " . $e->getMessage();
        }

        // Close the connection
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
   
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-msg {
            color: red;
            margin-top: 10px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #17a2b8;
            padding: 8px 15px;
            border-radius: 3px;
        }

        .back-btn:hover {
            background-color: #117a8b;
        }
    </style>
</head>
<body>
<?php include("admin_dashboard.php"); ?>
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
        <a href="patient.php" class="back-btn">Back</a>
    </form>
    <?php
    if ($error) {
        echo "<p class='error-msg'>Please fill in all required fields.</p>";
    }
    ?>
</body>
</html>


<?php  
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
include "footer.php"; ?>
