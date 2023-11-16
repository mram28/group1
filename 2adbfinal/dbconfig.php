<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imsdb";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function insertActivityLog($accountName, $kindOfActivity) {
    global $conn;

    // Get the current date and time
    $dateAndTime = date('Y-m-d H:i:s');

    // Insert the activity log
    $sql = "INSERT INTO activitylogstb (accountname, kindofactivity, dateandtime) VALUES ('$accountName', '$kindOfActivity', '$dateAndTime')";
    
    if ($conn->query($sql) !== TRUE) {
        echo "Error inserting activity log: " . $conn->error;
    }
}
?>


