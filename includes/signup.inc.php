<?php
// Check if the 'signup-submit' button is pressed
if (isset($_POST['signup-submit'])) {

    // Include necessary files for database connection and functions
    require 'dbh.inc.php';
    require 'functions.inc.php';

    // Get user input data from the signup form
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $username = $_POST['username'];
    $usrtype = $_POST['usrtype'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];

    // Check for empty fields; if true, redirect with an error message
    if (emptyInput($lname, $fname, $username, $usrtype, $email, $pwd1, $pwd2, $phone) !== false) {
        header("Location: ../admin/signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("Location: ../admin/signup.php?error=invalidusername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location: ../admin/signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd1, $pwd2) !== false) {
        header("Location: ../admin/signup.php?error=pwdnotmatched");
        exit();
    }
    if (usernameExists($conn, $username, $email) !== false) {
        header("Location: ../admin/signup.php?error=usernametaken");
        exit();
    } else {
        // Prepare an SQL statement to check if the username already exists
        $sql = "SELECT username FROM users WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // Handle SQL statement preparation error
            header("Location: ../admin/signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                // Redirect with an error message if the username is taken
                header("Location: ../admin/signup.php?error=usernametaken");
                exit();
            } else {
                // Prepare an SQL statement to insert a new user into the database
                $sql = "INSERT INTO users (lname, fname, username, usertype, email, phone, pwd) VALUES (?, ?, ?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    // Handle SQL statement preparation error
                    header("Location: ../admin/signup.php?error=sqlerror");
                    exit();
                } else {
                    // Hash the user's password for security
                    $hashedPass = password_hash($pwd1, PASSWORD_DEFAULT);

                    // Bind the parameters and execute the SQL statement
                    mysqli_stmt_bind_param($stmt, "sssssss", $lname, $fname, $username, $usrtype, $email, $phone, $hashedPass);
                    mysqli_stmt_execute($stmt);

                    // Redirect to the success page
                    header("Location: ../admin/signup.php?error=none");
                    exit();
                }
            }
        }
    }

} else {
    // Redirect with an error message if the button wasn't clicked
    header("Location: ../admin/signup.php?error=clkbtn");
    exit();
}
?>
