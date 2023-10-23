<?php
session_start();
require '../includes/dbh.inc.php';

if (isset($_POST['tenantId'])) {
    $tenantId = $_POST['tenantId'];

    // Check the function parameter
    if (isset($_POST['function']) && $_POST['function'] === 'dueDate') {
        // Update the reminder to 2 for the specified tenant
        $updateQuery = "UPDATE tenants SET reminder = 2 WHERE tenantid = $tenantId";
    } else {
        // Update the reminder to 1 for the specified tenant
        $updateQuery = "UPDATE tenants SET reminder = 1 WHERE tenantid = $tenantId";
    }

    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request.";
}
?>
