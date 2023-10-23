<?php

// Check if the 'login-submit' button is pressed
if (isset($_POST['login-submit'])) {

    // Include necessary files for database connection and functions
    require 'dbh.inc.php';
    require 'functions.inc.php';

    // Get the username and password from the login form
    $username = $_POST['usname'];
    $pass = $_POST['pword'];

    // Check for empty input; if true, redirect with an error message
    if (emptyInputLogin($username, $pass) !== false) {
        header("Location: ../login.php?error=emptyinput");
        exit();
    } else {
        // Prepare an SQL statement to select a user by username or email
        $sql = "SELECT * FROM users WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // Handle SQL statement preparation error
            header("Location: ../login.php?error=sqlerrore");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if ($row = mysqli_fetch_assoc($result)) {
                // Password verification
                $passCheck = password_verify($pass, $row['pwd']);
                
                if ($passCheck == false) {
                    // Redirect with an error message for incorrect password
                    header("Location: ../login.php?error=wronglogin2");
                    exit();
                } elseif ($passCheck == true) {
                    // Start a session and set user data in session variables
                    session_start();
                    $_SESSION['usrId'] = $row['userid'];
                    $_SESSION['usernm'] = $row['username'];
                    $_SESSION['ustype'] = $row['usertype'];
                    $_SESSION['image'] = $row['img_url'];
                    
                    // Insert a log entry for the successful login
                    $userId = $row['userid'];
                    insertLoginLog($conn, $userId);

                    // Redirect to the success page after successful login
                    header("Location: ../admin/manage.php?login=success");
                    exit();
                } else {
                    // Redirect with an error message for unknown error
                    header("Location: ../login.php?error=wronglogin2");
                    exit();
                }
            } else {
                // Redirect with an error message for user not found
                header("Location: ../login.php?error=wronglogin1");
                exit();
            }
        }
    }
}

// Check if the 'login-tenant-submit' button is pressed
if (isset($_POST['login-tenant-submit'])) {

    // Include necessary files for database connection and functions
    require 'dbh.inc.php';
    require 'functions.inc.php';

    // Get the username and password from the tenant login form
    $username = $_POST['usname1'];
    $pass = $_POST['pword1'];

    // Check for empty input; if true, redirect with an error message
    if (emptyInputLogin($username, $pass) !== false) {
        header("Location: ../tenantlogin.php?error=emptyinput");
        exit();
    } else {
        // Prepare an SQL statement to select a tenant by ID
        $sql = "SELECT t.*, ts.tenant_status
                FROM tenants t
                INNER JOIN tenant_status ts ON t.tenantid = ts.tenant_id
                WHERE t.tenantid=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // Handle SQL statement preparation error
            header("Location: ../tenantlogin.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if ($row = mysqli_fetch_assoc($result)) {
                // Check tenant status
                if ($row['tenant_status'] == 0) {
                    // Redirect with an error message for inactive account
                    header("Location: ../tenantlogin.php?error=inactiveaccount");
                    exit();
                }

                // Password verification (Note: This appears to be a basic check using a phone number)
                $passCheck = false;
                
                if ($pass == $row['phoneno']) {
                    $passCheck = true;
                }

                if ($passCheck == false) {
                    // Redirect with an error message for incorrect password
                    header("Location: ../tenantlogin.php?error=wronglogin2");
                    exit();
                } elseif ($passCheck == true) {
                    // Start a session and set tenant data in session variables
                    session_start();
                    $_SESSION['tenantId'] = $row['tenantid'];
                    $_SESSION['tlname'] = $row['tenant_lname'];
                    
                    // Redirect to the tenant dashboard after successful login
                    header("Location: ../tenants/tdashboard.php?login=success");
                    exit();
                } else {
                    // Redirect with an error message for unknown error
                    header("Location: ../tenantlogin.php?error=wronglogin2");
                    exit();
                }
            } else {
                // Redirect with an error message for tenant not found
                header("Location: ../tenantlogin.php?error=wronglogin1");
                exit();
            }
        }
    }
}
