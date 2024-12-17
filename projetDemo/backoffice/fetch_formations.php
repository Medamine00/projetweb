<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearning";  // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the formation table
$sql = "SELECT * FROM formation";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Initialize an array to store the data
    $formations = array();

    // Fetch the rows and add them to the array
    while($row = $result->fetch_assoc()) {
        $formations[] = $row;
    }

    // Return the data as JSON
    echo json_encode($formations);
} else {
    echo json_encode(array());  // Return an empty array if no data is found
}

$conn->close();
?>
