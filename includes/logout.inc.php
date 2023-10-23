<?php
session_start();

// Include your database connection script (update the path as needed)
require 'dbh.inc.php';

// Get the user's ID (you may need to modify this based on your session structure)
$userId = $_SESSION['usrId'];

// Set the logout time to the current date and time
$logoutTime = date("Y-m-d H:i:s");

// Update the logout_time in the login_log table
updateLogoutTime($conn, $userId, $logoutTime);

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired page
header("Location: ../index.php");
exit();

// ...

function updateLogoutTime($conn, $userId, $logoutTime) {
    $sql = "UPDATE login_log SET logout_time = ? WHERE user_id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Handle the error as needed
        return;
    }

    mysqli_stmt_bind_param($stmt, "si", $logoutTime, $userId);

    if (mysqli_stmt_execute($stmt)) {
        // Logout time updated successfully
    } else {
        // Handle the error as needed
    }

    mysqli_stmt_close($stmt);
}
?>
