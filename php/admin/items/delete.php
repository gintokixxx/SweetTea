<?php

include_once '../../../classes/dbh.classes.php';

// get itemId from POST request
$itemId = $_POST["itemId"];

if (mysqli_query($conn, "DELETE  FROM items WHERE pr_id = '$itemId';")) {
$response["success"] = true;
    $response["message"] = "Item deleted successfully.";
} else {
    $response["success"] = false;
    $response["message"] = "Error deleting item: " . mysqli_error($conn);
}

// send response as JSON
header("Content-Type: application/json");
echo json_encode($response);

// close database connection
mysqli_close($conn);