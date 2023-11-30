<?php
include "dbconfig.php";
include "footer.php";

// Function to delete a medicine record by ID
function deleteMedicine($conn, $medicineId) {
    $deleteSql = "DELETE FROM medicinetb WHERE id = $medicineId";
    if ($conn->query($deleteSql) === TRUE) {
        // Display JavaScript alert and redirect
        echo '<script>
                alert("Medicine deleted successfully!");
                window.location.href = "medicine.php";
              </script>';
        exit(); // Ensure that subsequent code doesn't execute after redirection
    } else {
        echo "Error deleting medicine: " . $conn->error;
    }
}

// Check if the delete request was sent via GET method
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['deleteid'])) {
    $deleteId = $_GET['deleteid'];
    deleteMedicine($conn, $deleteId);
}

// Rest of your existing code (HTML, modals, tables, etc.)
// ...
?>
