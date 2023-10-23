<?php
    require 'dbh.inc.php';
    /* admin and staff */
    $userid = '';
    $lname = '';
    $fname  = '';
    $username = '';
    $usrtyp = '';
    $usemail = '';
    $usphone = '';
    
    
    /* stalls */
    $stallname = '';
    $stall  = '';
    $monthly_fee = '';
    $status = '';
    $image='';
    $description='';
    $size = '';
    
    /* market section */
    $bmarket_section = '';
    $pmarket_section_id = '';


    $ornumber = '';
    $amount = '';
    $pdate = '';
    $month_first = '';
    $month_second = '';
    $renterid = '';


    /* tenants */
    $tenantid = '';
    $tlname = '';
    $tfname = '';
    $tmname = '';
    $tgender = '';
    $tbdate = '';
    $tphone = '';
    $taddress = '';
    $tstallname = '';
    $tcivilstatus = ''; // Adding civil status field
    $bname = '';
    $tAdmit = date("Y-m-d");
    $tStart = date("Y-m-d");
    $msgtenant = '';
    $tstatus = '';
    $scategory = '';

/* Market Sections - For Adding a New Section */
if (isset($_POST['section-submit'])) {
    $bmarket_section = $_POST['section_name'];

    if (empty($bmarket_section)) {
        header("Location: ../admin/add_marketsection.php?error=emptyinput");
        exit();
    } else {
        // Check if an image file was uploaded
        if (isset($_FILES['img_url']) && $_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $targetDirectory = "../img/maps/section_img/"; // Specify the directory where you want to save the uploaded images
            $targetFile = $targetDirectory . basename($_FILES['img_url']['name']);
            
            // Extract the image file name
            $imgFileName = basename($_FILES['img_url']['name']);

            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $targetFile)) {
                // Image upload successful, now insert the new record with the image file name
                $img_url = $imgFileName; // Store just the image file name
            } else {
                header("Location: ../admin/add_marketsection.php?error=imageuploadfailed");
                exit();
            }
        } else {
            // If no image was uploaded, set $img_url to a default value or leave it empty
            $img_url = ''; // This will be an empty string, you can also set a default image if needed
        }

        $sql = "INSERT INTO market_section (section_name, img_url) VALUES ('$bmarket_section', '$img_url');";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: ../admin/add_marketsection.php?error=none");
            exit();
        } else {
            header("Location: ../admin/add_marketsection.php?error=sqlerror");
            exit();
        }
    }
}



if (isset($_GET['editMarketsection'])) {
    $market_section_id = $_GET['editMarketsection'];

    $sql = "SELECT * FROM market_section WHERE market_section_id = $market_section_id;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $bmarket_section = $row['section_name'];
            $img_url = $row['img_url']; // Add this line to retrieve the current img_url
        }
    }
}

if (isset($_POST['section-update'])) {
    $market_section_id = $_POST['market_section_id'];
    $bmarket_section = $_POST['section_name'];

    if (empty($bmarket_section)) {
        header("Location: ../admin/market_section.php?error=emptyinput&editMarketsection=" . $market_section_id);
        exit();
    } else {
        // Check if an image file was uploaded
        if (isset($_FILES['img_url']) && $_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $target_path = "../img/maps/section_img/"; // Update the path where you want to store the images
            $target_path = $target_path . basename($_FILES['img_url']['name']);

            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $target_path)) {
                $img_url = basename($_FILES['img_url']['name']); // Use the correct variable name
            } else {
                header("Location: ../admin/add_marketsection.php?error=fileuploaderror");
                exit();
            }
        } else {
            // If no image was uploaded, you can choose to keep the existing image or set it to a default value
            // Here, we're using the existing image if available
            $img_url = ''; // Initialize $img_url
            if (isset($_POST['existing_img_url'])) {
                $img_url = $_POST['existing_img_url'];
            } else {
                $img_url = 'no_image.png'; // Replace with the actual default image filename
            }
        }

        $sql1 = "UPDATE market_section SET section_name='$bmarket_section', img_url='$img_url' WHERE market_section_id=$market_section_id;";
        $result1 = mysqli_query($conn, $sql1);

        if ($result1) {
            header("Location: ../admin/market_section.php?action=warning");
            exit();
        }
    }
}


if (isset($_GET['deleteMarketsection'])) {
    $market_section = $_GET['deleteMarketsection'];

    // Perform a DELETE query to remove the market with the specified ID from the 'market' table
    $sql_delete = "DELETE FROM market_section WHERE market_section_id = $market_section";
    $result_delete = mysqli_query($conn, $sql_delete);

    // Check if the deletion was successful and redirect with appropriate action parameter
    if ($result_delete) {
        // If the deletion was successful, redirect with action=danger to indicate a successful deletion
        header("Location: ../market_section.php?action=danger&section_name=" . urlencode($row['section_name']));
        exit();
    } else {
        // If there was an error during the deletion, redirect with action=error to indicate an error occurred
        header("Location: ../market_section.php?action=error");
        exit();
    }
}


/* stalls - Adding a new stall */
if (isset($_POST['rental-submit'])) {
    $section_id = $_POST['section_id'];
    $stall = $_POST['stallnum'];
    $monthly_fee = $_POST['monthly_fee'];

    $status = 'Maintenance'; // Default to 'Available'

    $description = $_POST['stall_description'];
    $stall_size = $_POST['stall_size'];

    // You can remove the check for pmarket_id here

    // Check if an image file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_path = "../img/stalls/";
        $target_path = $target_path . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            $image = basename($_FILES['image']['name']);
        } else {
            header("Location: ../admin/add_rental.php?error=fileuploaderror");
            exit();
        }
    } else {
        // If no image was uploaded, set $image to a default image
        $image = 'no_image.png'; // Replace 'no_image.png' with the actual filename you want to use
    }

    if (empty($section_id) || empty($stall) || empty($monthly_fee)) {
        header("Location: ../admin/add_rental.php?error=emptyinput");
        exit();
    } else {
        // Check if the section_id and stallno already exist in the database
        $sql = "SELECT * FROM rental_tbl WHERE section_id = '$section_id' AND stallno = '$stall'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: ../admin/add_rental.php?error=alreadyexists");
            exit();
        } else {
            // Insert the new record into the rental_tbl table
            $sql = "INSERT INTO rental_tbl (section_id, stallno, monthly_fee, status, image, size, description)
                    VALUES ('$section_id','$stall','$monthly_fee','$status', '$image', '$stall_size', '$description');";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: ../admin/add_rental.php?error=none");
                exit();
            } else {
                header("Location: ../admin/add_rental.php?error=databaseerror");
                exit();
            }
        }
    }
}


/* rental-update - Updating a rental */
if (isset($_POST['rental-update'])) {
    // Check if the 'stall_id' key is present in $_POST
    if (isset($_POST['stall_id'])) {
        $stall_id = $_POST['stall_id'];
    } else {
        // Handle the case where 'stall_id' is not provided
        header("Location: ../admin/rental.php?error=missingstallid");
        exit();
    }

    $section_id = $_POST['section_id'];
    $stall = $_POST['stallnum'];
    $monthly_fee = $_POST['monthly_fee'];
    $description = $_POST['stall_description'];
    $stall_size = $_POST['stall_size'];

    $imageUpdated = false;
    if (!empty($_FILES['image']['tmp_name'])) {
        $target_path = "../img/stalls/";
        $target_path = $target_path . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            $image = basename($_FILES['image']['name']);
            $imageUpdated = true;
        }
    } else {
        // Check if the 'current_image' key is present in $_POST
        if (isset($_POST['current_image'])) {
            $image = $_POST['current_image']; // Update $image with the new image filename
        } else {
            // Handle the case where 'current_image' is not provided
            header("Location: ../admin/rental.php?error=missingcurrentimage&editRental=" . $stall_id);
            exit();
        }
    }

    if (empty($monthly_fee) || empty($stall_size)) {
        header("Location: ../admin/rental.php?error=emptyinput&editRental=" . $stall_id);
        exit();
    } else {
        if ($imageUpdated) {
            $sql = "UPDATE rental_tbl SET  monthly_fee='$monthly_fee', size='$stall_size', description='$description', image='$image' WHERE stall_id=$stall_id;";
        } else {
            $sql = "UPDATE rental_tbl SET  monthly_fee='$monthly_fee', size='$stall_size', description='$description' WHERE stall_id=$stall_id;";
        }

        $result1 = mysqli_query($conn, $sql);
        if ($result1) {
            header("Location: ../admin/rental.php?action=warning");
            exit();
        }
    }
}


/* Retrieve Rental Information for Editing */
if (isset($_GET['editRental'])) {
    $stall_id = $_GET['editRental'];

    $sql = "SELECT * FROM rental_tbl WHERE stall_id=$stall_id;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $section_id = $row['section_id'];
            $stall = $row['stallno'];
            $monthly_fee = $row['monthly_fee'];
            $size = $row['size'];
            $status = $row['status'];
            $description = $row['description'];
            $image = $row['image'];
        }
    }
}



if(isset($_GET['deleteRental'])){
    $stall_id  = $_GET['deleteRental'];
    $rentstallname = $_GET['deleterentstallname'];
    $rentstall = $_GET['deleterentstallno'];

    // Check if rent_started is already set, if not, set it to the current date
    $sql_check_rent_started = "SELECT rent_started FROM rental_tbl WHERE stall_id = '$stall_id'";
    $result_check_rent_started = mysqli_query($conn, $sql_check_rent_started);
    $row = mysqli_fetch_assoc($result_check_rent_started);
    
    if (empty($row['rent_started'])) {
        $rent_started = date("Y-m-d");
        $sql_update_rent_started = "UPDATE rental_tbl SET rent_started='$rent_started' WHERE stall_id='$stall_id'";
        mysqli_query($conn, $sql_update_rent_started);
    }

    $sql = "DELETE FROM rental_tbl WHERE stall_id='$stall_id';";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../rental.php?action=danger&stallname=".$rentstallname."&stallno=".$rentstall);
        exit();
    }
}

if (isset($_GET['renewDate']) && isset($_GET['tenantId'])) {
    $tenantid = $_GET['tenantId'];
    $newRenewalDate = $_GET['renewDate'];

    // Calculate the end date as December 31 of the selected year
    $newEndDate = date('Y', strtotime($newRenewalDate)) . '-12-31';

    // SQL query to update the previous contract's status to 0
    $updatePreviousContractSQL = "UPDATE contracts SET contract_status = 0 WHERE tenant_id = $tenantid AND contract_status = 1";

    // Execute the SQL query to update the previous contract's status
    $updatePreviousContractResult = mysqli_query($conn, $updatePreviousContractSQL);

    if ($updatePreviousContractResult) {
        // SQL query to insert a new contract with the selected start_date and calculated end_date
        $insertNewContractSQL = "INSERT INTO contracts (tenant_id, start_date, end_date, contract_status) VALUES ($tenantid, '$newRenewalDate', '$newEndDate', 1)";

        // Execute the SQL query to insert the new contract
        $insertNewContractResult = mysqli_query($conn, $insertNewContractSQL);

        if ($insertNewContractResult) {
            // Redirect to the desired page or display a success message
            header("Location: ../admin/contract_details.php");
            exit();
        } else {
            // Handle the case where the new contract insertion fails
            header("Location: your_error_page.php?error=newcontractinsertionerror");
            exit();
        }
    } else {
        // Handle the case where updating the previous contract fails
        header("Location: your_error_page.php?error=updatepreviouscontracterror");
        exit();
    }
}

/* tenants - Adding a new tenant */
if (isset($_POST['tenant-submit'])) {
    $tlname = strtoupper($_POST['lname']);
    $tfname = strtoupper($_POST['fname']);
    $tmname = strtoupper($_POST['mname']);
    $tgender = strtoupper($_POST['gender']);
    $tbdate = $_POST['bday'];
    $tphone = $_POST['phone'];
    $stall_id = $_POST['stall_id'];
    $taddress = strtoupper($_POST['address']);
    $tAdmit = $_POST['dateAdmit'];
    $tcivilstatus = $_POST['civilstatus'];
    $bname = $_POST['busname'];
    $scategory = $_POST['category'];

    if (empty($tlname) || empty($tfname) || empty($tmname) || empty($tgender) || empty($tbdate) || empty($tphone) || empty($taddress) || empty($tAdmit) || empty($scategory)) {
        header("Location: ../admin/tenantsignup.php?error=emptyinput");
        exit();
    }

    // Calculate the end of the current year
    $currentYear = date('Y');
    $rentEndedDate = $currentYear . '-12-31';

// SQL query to insert tenant information into the tenants table with the 'reminder' attribute set to 0
$sql = "INSERT INTO tenants (tenant_lname, tenant_fname, tenant_midname, tenant_gender, civil_status, birthdate, phoneno, address, date_registered, stall_id, business_name, stall_category, reminder) 
        VALUES ('$tlname', '$tfname', '$tmname', '$tgender', '$tcivilstatus', '$tbdate', '$tphone', '$taddress', '$tAdmit', '$stall_id', '$bname', '$scategory', 0);";


    // Execute the SQL query for inserting into the tenants table
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Get the ID of the newly inserted tenant
        $tenant_id = mysqli_insert_id($conn);

        // Create a contract for the tenant in the contracts table
        $contract_sql = "INSERT INTO contracts (tenant_id, start_date, end_date, contract_status) 
                        VALUES ('$tenant_id', '$tAdmit', '$rentEndedDate', 1);";

        // Execute the SQL query for inserting into the contracts table
        $contract_result = mysqli_query($conn, $contract_sql);

        if ($contract_result) {
            // Check if the contract has expired
            $today = date('Y-m-d');
            if ($today > $rentEndedDate) {
                // If the contract has expired, update the contract status to 0
                $update_contract_status_sql = "UPDATE contracts SET contract_status = 0 WHERE tenant_id = '$tenant_id';";
                $update_contract_status_result = mysqli_query($conn, $update_contract_status_sql);

                if ($update_contract_status_result) {
                    // The contract has expired, and the status has been updated to 0.
                    // You can handle further actions or notifications here.
                } else {
                    // Handle an error if the contract status update fails
                }
            }
        }
        if ($contract_result) {
            // SQL query to insert tenant status into the tenant_status table
            $status_sql = "INSERT INTO tenant_status (tenant_id, date_started, tenant_status) 
                          VALUES ('$tenant_id', NOW(), 1);"; // Assuming 1 represents currently renting

            // Execute the SQL query for inserting into the tenant_status table
            $status_result = mysqli_query($conn, $status_sql);

            if ($status_result) {
                // SQL query to insert tenant information into the rent table
                $rent_sql = "INSERT INTO rent (tenant_id, stall_id, rent_status) 
                             VALUES ('$tenant_id', '$stall_id', 1);"; // Assuming 1 represents current

                // Execute the SQL query for inserting into the rent table
                $rent_result = mysqli_query($conn, $rent_sql);

                if ($rent_result) {
                    // Update the rental_tbl to set the status to "occupied" for the corresponding stall_id
                    $update_rental_sql = "UPDATE rental_tbl SET status = 'Occupied' WHERE stall_id = '$stall_id';";

                    // Execute the SQL query for updating the rental_tbl
                    $update_rental_result = mysqli_query($conn, $update_rental_sql);

                    if ($update_rental_result) {
                        // Redirect with a success message
                        header("Location: ../admin/tenantsignup.php?error=none");
                        exit();
                    } else {
                        // Redirect with an error message if rental_tbl update failed
                        header("Location: ../admin/tenantsignup.php?error=rentalupdateerror");
                        exit();
                    }
                } else {
                    // Redirect with an error message if rent insertion failed
                    header("Location: ../admin/tenantsignup.php?error=rentinsertionerror");
                    exit();
                }
            } else {
                // Redirect with an error message if tenant status insertion failed
                header("Location: ../admin/tenantsignup.php?error=statusinsertionerror");
                exit();
            }
        } else {
            // Redirect with an error message if contract insertion failed
            header("Location: ../admin/tenantsignup.php?error=contractinsertionerror");
            exit();
        }
    } else {
        // Redirect with an error message if tenant insertion failed
        header("Location: ../admin/tenantsignup.php?error=tenantinsertionerror");
        exit();
    }
}

if (isset($_GET['editTenant'])) {
    $tenantid = $_GET['editTenant'];

    $sql = "SELECT * FROM tenants WHERE tenantid = '$tenantid';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $stall_id = $row['stall_id'];
            $tlname = $row['tenant_lname'];
            $tfname = $row['tenant_fname'];
            $tmname = $row['tenant_midname'];
            $tgender = $row['tenant_gender'];
            $tbdate = $row['birthdate'];
            $tphone = $row['phoneno'];
            $taddress = $row['address'];
            $tAdmit = $row['date_registered'];
            $scategory = $row['stall_category'];
            $tcivilstatus = $row['civil_status'];
            $bname = $row['business_name'];
        }
    }
}
/* tenants - Updating a tenant */
if (isset($_POST['tenant-update'])) {
    $tenantid = $_POST['tenantid'];
    $tlname = strtoupper($_POST['lname']);
    $tfname = strtoupper($_POST['fname']);
    $tmname = strtoupper($_POST['mname']);
    $tgender = strtoupper($_POST['gender']);
    $tbdate = $_POST['bday'];
    $tphone = $_POST['phone'];
    $taddress = strtoupper($_POST['address']);
    $tAdmit = $_POST['dateAdmit'];
    $tcivilstatus = $_POST['civilstatus'];
    $tstatus = $_POST['status'];
    $bname = $_POST['busname'];
    $scategory = $_POST['category'];
    $sql = "SELECT * FROM tenants WHERE tenantid = '$tenantid';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $temptlname = $row['tenant_lname'];
        }
    }

    if (empty($tlname) || empty($tfname) || empty($tmname) || empty($tgender) || empty($tbdate) || empty($tphone) || empty($taddress) || empty($tAdmit)) {
        header("Location: ../admin/tenantsignup.php?error=emptyinput&editTenant=" . $tenantid);
        exit();
    } else {
        // Update tenant's information
        $sql2 = "UPDATE tenants SET tenant_lname='$tlname', tenant_fname='$tfname', tenant_midname='$tmname', tenant_gender='$tgender', civil_status='$tcivilstatus', birthdate='$tbdate', phoneno='$tphone', address='$taddress', date_registered='$tAdmit', business_name = '$bname', stall_category = '$scategory' WHERE tenantid = $tenantid;";

        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            header("Location: ../admin/tenants.php?action=warning&lname=" . $tlname);
            exit();
        }
    }
}

/* tenants - Deleting a tenant */
if (isset($_GET['deleteTenant'])) {
    $tenantid = $_GET['deleteTenant'];
    $tlname = strtoupper($_POST['lname']);

    // Get the stall_id associated with the tenant
    $get_stall_id_sql = "SELECT stall_id FROM tenants WHERE tenantid = '$tenantid';";
    $get_stall_id_result = mysqli_query($conn, $get_stall_id_sql);

    if ($get_stall_id_row = mysqli_fetch_assoc($get_stall_id_result)) {
        $stall_id = $get_stall_id_row['stall_id'];

        // Update the contracts table to set contract_status to 0
        $update_contracts_sql = "UPDATE contracts SET contract_status = 0 WHERE tenant_id = '$tenantid';";

        // Execute the SQL query to update contract_status
        $update_contracts_result = mysqli_query($conn, $update_contracts_sql);

        if ($update_contracts_result) {
            // Update the tenant_status table to set tenant_status to 0 (not renting) and date_ended to the current date
            $update_status_sql = "UPDATE tenant_status SET tenant_status = 0, date_ended = NOW() WHERE tenant_id = '$tenantid';";

            // Execute the SQL query to update tenant status
            $update_status_result = mysqli_query($conn, $update_status_sql);

            // Check if the update was successful
            if ($update_status_result) {
                // Update the rental_tbl to set the status to 'Available' based on stall_id
                $update_rental_sql = "UPDATE rental_tbl SET status = 'Available' WHERE stall_id = '$stall_id';";

                // Execute the SQL query to update rental_tbl
                $update_rental_result = mysqli_query($conn, $update_rental_sql);

                // Check if the update was successful
                if ($update_rental_result) {
                    // Update the rent_status to 0 in the rent table
                    $update_rent_status_sql = "UPDATE rent SET rent_status = 0 WHERE tenant_id = '$tenantid' AND stall_id = '$stall_id';";

                    // Execute the SQL query to update rent_status
                    $update_rent_status_result = mysqli_query($conn, $update_rent_status_sql);

                    if ($update_rent_status_result) {
                        // Redirect with a success message
                        header("Location: ../admin/tenants.php?action=danger&lname=" . $tlname);
                        exit();
                    } else {
                        // Redirect with an error message if rent_status update failed
                        header("Location: ../admin/tenants.php?error=rentstatusupdateerror");
                        exit();
                    }
                } else {
                    // Redirect with an error message if rental_tbl update failed
                    header("Location: ../admin/tenants.php?error=rentalupdateerror");
                    exit();
                }
            } else {
                // Redirect with an error message if tenant status update failed
                header("Location: ../admin/tenants.php?error=statusupdateerror");
                exit();
            }
        } else {
            // Redirect with an error message if contract_status update failed
            header("Location: ../admin/tenants.php?error=contractstatusupdateerror");
            exit();
        }
    } else {
        // Handle the case where the stall_id associated with the tenant could not be retrieved
        header("Location: ../admin/tenants.php?error=stallidnotfound");
        exit();
    }
}


/* payments */
if (isset($_POST['payment-submit'])) {
    $tenant_id = $_POST['tenantid']; // Tenant ID
    $pdate = $_POST['pdate'];
    $ornumber = $_POST['ornumber'];
    $amount = $_POST['amount'];
    $month_first = $_POST['month_first']; // Added to capture the start date
    $month_second = $_POST['month_second']; // Added to capture the end date
    // Fetch the userid from the session
    $userid = $_POST['userid'];
    date_default_timezone_set('Asia/Manila');
    $timestamp = date('Y-m-d H:i:s');



    // SQL query to insert payment data into payments_tbl
    $sql = "INSERT INTO payments_tbl (tenant_id, userid, ornumber, timestamp, paymentdate, paymenttime, amount, month_first, month_second) 
            VALUES ('$tenant_id', '$userid', '$ornumber', '$timestamp', '$pdate', NOW(), '$amount', '$month_first', '$month_second')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Payment insertion successful, you can redirect or do further processing as needed

        // Update the reminder for the tenant to 0 in the tenants table
        $updateReminderSQL = "UPDATE tenants SET reminder = 0 WHERE tenantid = '$tenant_id'";
        $updateReminderResult = mysqli_query($conn, $updateReminderSQL);

        if ($updateReminderResult) {
            header("Location: ../admin/payments.php?action=success");
            exit();
        } else {
            // Handle an error if updating the reminder failed
            header("Location: ../admin/payments.php?action=success&reminderupdateerror");
            exit();
        }
    } else {
        // Payment insertion failed
        header("Location: ../admin/paymentForm.php?error=insertfailed");
        exit();
    }
}


if (isset($_GET['editPayment'])) {
    $paymentid = $_GET['editPayment'];

    $sql = "SELECT p.paymentid, p.ornumber, p.amount, p.paymentdate, p.month_first, p.month_second, t.tenantid, t.tenant_lname, t.tenant_fname 
            FROM payments_tbl p
            JOIN tenants t ON p.tenant_id = t.tenantid
            WHERE p.paymentid='$paymentid';";

    $result = mysqli_query($conn, $sql);
    $rescheck = mysqli_num_rows($result);

    if ($rescheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ornumber = $row['ornumber']; // Retrieve O.R. number
            $amount = $row['amount'];     // Retrieve amount
            $pdate = $row['paymentdate']; // Retrieve payment date
            $month_first = $row['month_first']; // Retrieve month_first
            $month_second = $row['month_second']; // Retrieve month_second
            $tenantid = $row['tenantid']; // Retrieve tenant ID
        }
    }
}
if (isset($_POST['payment-update'])) {
    $paymentid = $_POST['paymentid'];
    $pamount = $_POST['amount']; // Updated field for payment amount

    if (empty($pamount)) {
        header("Location: ../admin/paymentform.php?error=emptyinput&editPayment=".$paymentid);
        exit();
    }

    // Optionally, you can update the payment amount only and leave other fields unchanged.
    // Modify the SQL query to update the necessary field(s).
    $sql1 = "UPDATE payments_tbl SET amount='$pamount' WHERE paymentid='$paymentid';";
    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
        header("Location: ../admin/payments.php?action=warning&tenantid=".$tenantid);
        exit();
    } else {
        header("Location: ../admin/paymentForm.php?error=updatefailed&editPayment=".$paymentid);
        exit();
    }
}


if (isset($_GET['deletePayment'])) {
    $paymentid = $_GET['deletePayment'];

    $query = "SELECT * FROM payments_tbl WHERE paymentid='$paymentid';";
    $resquery = mysqli_query($conn, $query);
    $resqueryCheck = mysqli_num_rows($resquery);

    if ($resqueryCheck > 0) {
        $row = mysqli_fetch_assoc($resquery);
        $holder = $row['holder'];

        $sql = "DELETE FROM payments_tbl WHERE paymentid='$paymentid';";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: ../admin/payments.php?action=danger&lname=".$lname);
            exit();
        }
    }
}


        /* users */
if(isset($_GET['deleteUser'])){
    $userid = $_GET['deleteUser'];

    $query = "SELECT * FROM users WHERE userid = $userid";
    $resquery = mysqli_query($conn, $query);
    $resqueryCheck = mysqli_num_rows($resquery);

    if($resqueryCheck > 0){
        while($row = mysqli_fetch_assoc($resquery)){
            $userlast = $row['lname'];
            $userfirst = $row['fname'];
            $username = $row['username'];
            $usertype = $row['usertype'];
            $email = $row['email'];
            $phone = $row['phone'];
            $pwd = $row['pwd'];

            $usrtyp = $_GET['deleteusrtyp'];
            $usrlname = $_GET['deletelname'];
            $sql = "DELETE FROM users WHERE userid = '$userid';";
            $result = mysqli_query($conn, $sql);

            if($result){
                header("Location: ../admin/users.php?action=danger&usertyp=".$usrtyp."&userlname=".$usrlname);
                exit();
            }
        }
    }

    }if(isset($_GET['editUser'])){
        $userid = $_GET['editUser'];

        $sql = "SELECT * FROM users WHERE userid = $userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                $lname = $row['lname'];
                $fname  = $row['fname'];
                $username = $row['username'];
                $usrtyp = $row['usertype'];
                $usemail = $row['email'];
                $usphone = $row['phone'];
            }
        }
    }
    if(isset($_POST['signup-update'])){
        $userid = $_POST['userid'];
        $lname = $_POST['lname'];
        $fname  = $_POST['fname'];
        $usrtyp = $_POST['usrtype'];
        $usphone = $_POST['phone'];

        if(empty($lname) || empty($fname) || empty($usphone)){
            header("Location: ../admin/signup.php?error=emptyinput&editUser=".$userid);
            exit();
        }else{
            $sql1 = "UPDATE users SET lname='$lname', fname='$fname', phone='$usphone' WHERE userid=$userid;";
            $result1 = mysqli_query($conn, $sql1);

            if($result1){
                header("Location: ../admin/users.php?action=warning");
                exit();
            }
        }
    }





if (isset($_POST['action'])) {
    $concernId = $_POST['concern_id'];
    $selectedStatus = $_POST['status'];

    // Fetch the user's ID (userid) from the session
    $usrId = $_SESSION['usrId'];

    // Define an array to map selected values to status labels
    $statusLabels = array(
        'Not process' => 0,
        'In process' => 1,
        'Closed' => 2
    );

    // Ensure the selected status is a valid key in the array
    if (array_key_exists($selectedStatus, $statusLabels)) {
        $newStatus = $statusLabels[$selectedStatus];

        // Prepare and execute the SQL update query
        $updateSql = "UPDATE tconcerns SET status = '$newStatus', userid = '$usrId' WHERE concernid = $concernId";
        if (mysqli_query($conn, $updateSql)) {
            // Status updated successfully
            header("Location: tconcerns.php"); // Redirect to a success page
            exit(); // Exit to prevent further execution
        } else {
            // Handle update failure, display an error message or log the error
            echo "Error updating status: " . mysqli_error($conn);
        }
    } else {
        // Handle invalid status value
        echo "Invalid status value.";
    }
}




if (isset($_GET['deleterequest'])) {
    $req_id = $_GET['deleterequest'];

    // Get the request date for the current request
    $sql = "SELECT req_date FROM request_tbl WHERE req_id=$req_id;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $req_date = $row['req_date'];

    // Delete all requests with the same request date
    $sql = "DELETE FROM request_tbl WHERE req_date = '$req_date';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../request.php?action=danger&lastname=" . $inqlast);
        exit();
    }
}
