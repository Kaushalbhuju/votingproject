<?php
// update.php

// Database connection code
$conn = mysqli_connect("localhost","root","","voting");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Receive the JSON data
$data = json_decode(file_get_contents('php://input'), true);

// Loop through the data and update the records
foreach ($data as $id => $fields) {
    foreach ($fields as $fieldName => $value) {
        // Perform the update query
        $query = "UPDATE `user` SET `$fieldName` = '$value' WHERE `id` = $id";
        mysqli_query($conn, $query);
    }
}

// Return the updated data as a response
$response = array();
foreach ($data as $id => $fields) {
    $response[$id] = array();
    foreach ($fields as $fieldName => $value) {
        $response[$id][$fieldName] = $value;
    }
}

mysqli_close($conn);

// Send the updated data as a response
echo json_encode($response);
?>
