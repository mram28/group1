<?php
include "dbconfig.php";
include "footer.php";

// Function to delete a supply record by ID
function deleteSupply($conn, $supplyId) {
    $deleteSql = "DELETE FROM suppliestb WHERE id = $supplyId";
    if ($conn->query($deleteSql) === TRUE) {
        // Display JavaScript alert and redirect
        echo '<script>
                alert("Supply deleted successfully!");
                window.location.href = "supplies.php";
              </script>';
        exit(); // Ensure that subsequent code doesn't execute after redirection
    } else {
        echo "Error deleting supply: " . $conn->error;
    }
}

// Check if the delete request was sent via GET method and has 'deleteid' parameter
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['deleteid'])) {
    $deleteId = $_GET['deleteid'];
    deleteSupply($conn, $deleteId);
}

// Rest of your existing code (HTML, modals, tables, etc.)
// ...
?>
