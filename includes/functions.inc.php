<?php

function emptyInput($lname, $fname, $username, $usrtyp, $email, $pwd1, $pwd2) {
    $result;
    if (empty($lname) || empty($fname) || empty($username) || empty($usrtyp) || empty($email) || empty($pwd1) || empty($pwd2)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd1, $pwd2){
    $result;
    
    if($pwd1 !== $pwd2){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function usernameExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function emptyInputLogin($username, $pass){
    $result;

    if(empty($username) || empty($pass)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function insertLoginLog($conn, $userId) {
    // Check if the user has a usertype of "staff" before inserting the login log
    $checkStaffSql = "SELECT usertype FROM users WHERE userid = ?";
    $checkStaffStmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($checkStaffStmt, $checkStaffSql)) {
        // Handle the error as needed
        return false;
    }

    mysqli_stmt_bind_param($checkStaffStmt, "i", $userId);
    mysqli_stmt_execute($checkStaffStmt);
    $checkStaffResult = mysqli_stmt_get_result($checkStaffStmt);

    if ($checkStaffRow = mysqli_fetch_assoc($checkStaffResult)) {
        // Check if the usertype is "staff"
        if ($checkStaffRow['usertype'] === 'Staff') {
            // Insert the login log
            $sql = "INSERT INTO login_log (user_id) VALUES (?)";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                // Handle the error as needed
                return false;
            }

            mysqli_stmt_bind_param($stmt, "i", $userId);

            if (mysqli_stmt_execute($stmt)) {
                return true;
            } else {
                // Handle the error as needed
                return false;
            }

            mysqli_stmt_close($stmt);
        }
    }

    return false; // Return false if usertype is not "staff"
}