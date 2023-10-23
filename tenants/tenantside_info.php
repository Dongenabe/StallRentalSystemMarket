<?php
session_start();
$_SESSION['actib'] = 'tsrt';
require 'tenantheader.php';

$tenant_lname = "";
$tenant_fname = "";
$gender = "";
$section_name = "";
$tid = $_SESSION['tenantId'];
$qlength = 0;

// Query to fetch tenant information for the logged-in tenant
$query = "SELECT t.tenant_lname, t.tenant_fname, t.tenant_gender, m.section_name, t.stall_id
          FROM tenants t
          JOIN rental_tbl r ON t.stall_id = r.stall_id
          JOIN market_section m ON r.section_id = m.market_section_id
          WHERE t.tenantid = '$tid';";

$resquery = mysqli_query($conn, $query);
$resqueryCheck = mysqli_num_rows($resquery);

if ($resqueryCheck > 0) {
    while ($row = mysqli_fetch_assoc($resquery)) {
        $tenant_lname = $row['tenant_lname'];
        $tenant_fname = $row['tenant_fname'];
        $gender = $row['tenant_gender'];
        $section_name = $row['section_name'];
        $stall_id = $row['stall_id']; // Fetch stall_id from tenants table
    }
}
?>
<?php
// Get the tenant ID from the URL parameter 'l_id'
$get_id = $_GET['l_id'];

if (!$get_id) {
    // Handle the case where 'l_id' is not provided
    echo "Tenant ID not provided.";
    exit();
}

// Create a prepared statement to retrieve tenant details, including the additional attributes
$sqlTenant = "SELECT tenant_lname, tenant_fname, tenant_midname, tenant_gender, civil_status, phoneno, address, birthdate, business_name, stall_category
              FROM tenants
              WHERE tenantid = ?";

// Initialize a prepared statement for tenant details
$stmtTenant = $conn->prepare($sqlTenant);

if ($stmtTenant) {
    // Bind the parameter to the prepared statement
    $stmtTenant->bind_param("i", $get_id);

    // Execute the prepared statement for tenant details
    $stmtTenant->execute();

    // Get the result set for tenant details
    $resultTenant = $stmtTenant->get_result();

    if ($resultTenant->num_rows > 0) {
        $rowTenant = $resultTenant->fetch_assoc();
        $tenant_lname = $rowTenant['tenant_lname'];
        $tenant_fname = $rowTenant['tenant_fname'];
        $tenant_midname = $rowTenant['tenant_midname'];
        $tenant_gender = $rowTenant['tenant_gender'];
        $business_name = $rowTenant['business_name'];
        $stall_category = $rowTenant['stall_category'];
        $birthdate = $rowTenant['birthdate'];
        $civil_status = $rowTenant['civil_status'];
        $phoneno = $rowTenant['phoneno'];
        $address = $rowTenant['address'];
    } else {
        echo "Tenant not found.";
        exit();
    }
} else {
    echo "Error preparing SQL statement for tenant details: " . $conn->error;
    exit();
}

// Create a prepared statement to retrieve stall and section information and join it with the tenants table
$sqlStallInfo = "SELECT rt.section_id, rt.stallno, rt.monthly_fee, rt.size, rt.description, rt.Image, ms.section_name
                FROM rental_tbl rt
                INNER JOIN tenants t ON rt.stall_id = t.stall_id
                INNER JOIN market_section ms ON rt.section_id = ms.market_section_id
                WHERE t.tenantid = ?";

// Initialize a prepared statement for stall and section information
$stmtStallInfo = $conn->prepare($sqlStallInfo);

if ($stmtStallInfo) {
    // Bind the parameter to the prepared statement
    $stmtStallInfo->bind_param("i", $get_id);

    // Execute the prepared statement for stall and section information
    $stmtStallInfo->execute();

    // Get the result set for stall and section information
    $resultStallInfo = $stmtStallInfo->get_result();

    if ($resultStallInfo->num_rows > 0) {
        $rowStallInfo = $resultStallInfo->fetch_assoc();
        $section_name = $rowStallInfo['section_name'];
        $stallno = $rowStallInfo['stallno'];
        $monthly_fee = $rowStallInfo['monthly_fee'];
        $size = $rowStallInfo['size'];
        $description = $rowStallInfo['description'];
        $Image = $rowStallInfo['Image'];
    } else {
        echo "Stall information not found.";
        exit();
    }
} else {
    echo "Error preparing SQL statement for stall information: " . $conn->error;
    exit();
}
// Create a prepared statement to retrieve the latest payment details for the tenant
$sqlLatestPaymentDetails = "SELECT paymentdate, amount, ornumber
                           FROM payments_tbl
                           WHERE tenant_id = ?
                           ORDER BY paymentdate DESC
                           LIMIT 1";

// Initialize a prepared statement for the latest payment details
$stmtLatestPaymentDetails = $conn->prepare($sqlLatestPaymentDetails);

if ($stmtLatestPaymentDetails) {
    // Bind the parameter to the prepared statement
    $stmtLatestPaymentDetails->bind_param("i", $get_id);

    // Execute the prepared statement for the latest payment details
    $stmtLatestPaymentDetails->execute();

    // Get the result set for the latest payment details
    $resultLatestPaymentDetails = $stmtLatestPaymentDetails->get_result();

    if ($resultLatestPaymentDetails->num_rows > 0) {
        $rowLatestPaymentDetails = $resultLatestPaymentDetails->fetch_assoc();
        $latest_payment_date = $rowLatestPaymentDetails['paymentdate'];
        $amount = $rowLatestPaymentDetails['amount'];
        $ornumber = $rowLatestPaymentDetails['ornumber'];
    }
} else {
    echo "Error preparing SQL statement for the latest payment details: " . $conn->error;
    exit();
}


// Create a prepared statement to retrieve the currently active contract for the tenant
$sqlActiveContract = "SELECT contract_id
                     FROM contracts
                     WHERE tenant_id = ? AND contract_status = 1";

// Initialize a prepared statement for the currently active contract
$stmtActiveContract = $conn->prepare($sqlActiveContract);

if ($stmtActiveContract) {
    // Bind the parameter to the prepared statement
    $stmtActiveContract->bind_param("i", $get_id);

    // Execute the prepared statement for the currently active contract
    $stmtActiveContract->execute();

    // Get the result set for the currently active contract
    $resultActiveContract = $stmtActiveContract->get_result();

    if ($resultActiveContract->num_rows > 0) {
        // You have an active contract, so you can display "Currently Active"
        $active_contract_status = "Currently Active";
    } else {
        // No active contract found
        $active_contract_status = "No Active Contract";
    }
} else {
    echo "Error preparing SQL statement for the active contract: " . $conn->error;
    exit();
}
?>

<div class="height-100 bg-light-gray main-content">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print" onclick="printTable()"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
    <div class="bg-light-gray mb-5 p-3 rounded" id="TenantSummary">
        <!-- Add the title and icon at the center of the page -->
        <div class="text-center mb-4">

            <h4 class="fw-bold">TENANT INFORMATION</h4>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="bg-light-gray p-3 rounded mb-4">
                    <h3 class="fw-bold">PERSONAL INFORMATION</h3>

                    <!-- Display Last Name -->
                    <p><strong>Last Name:</strong> <?php echo $tenant_lname; ?></p>

                    <!-- Display First Name -->
                    <p><strong>First Name:</strong> <?php echo $tenant_fname; ?></p>

                    <!-- Display Middle Name -->
                    <p><strong>Middle Name:</strong> <?php echo $tenant_midname; ?></p>
                    <!-- Display Middle Name -->
                    <p><strong>Gender:</strong> <?php echo $tenant_gender; ?></p>
                    <!-- Replace the placeholders below with actual data -->
                    <!-- Display Civil Status -->
                    <p><strong>Civil Status:</strong> <?php echo $civil_status; ?></p>
                    <!-- Display Birthdate -->
                    <p><strong>Birthdate:</strong> <?php echo date("F j, Y", strtotime($birthdate)); ?></p>
                    <!-- Calculate Age based on birthdate -->
                    <?php
                    $birthdate = strtotime($birthdate);
                    $age = date('Y') - date('Y', $birthdate);
                    echo "<p><strong>Age:</strong> $age</p>";
                    ?>
                    <p><strong>Address:</strong> <?php echo $address; ?></p>
                    <!-- Display Phone Number -->
                    <p><strong>Phone Number:</strong> <?php echo $phoneno; ?></p>
                    <p><strong>Business Name:</strong> <?php echo $business_name; ?></p>
                    <p><strong>Stall Category:</strong> <?php echo $stall_category; ?></p>


                </div>
            </div>

            <div class="col-md-6">
                <div class="bg-light-gray p-3 rounded mb-4">
                    <h3 class="fw-bold">STALL RENTED INFORMATION</h3>

                    <!-- Display Section ID -->
                    <p><strong>Stall Name:</strong> <?php echo $section_name; ?></p>

                    <!-- Display Stall Number -->
                    <p><strong>Stall Number:</strong> <?php echo $stallno; ?></p>

                    <!-- Display Monthly Fee -->
                    <p><strong>Monthly Fee:</strong> <?php echo $monthly_fee; ?></p>

                    <!-- Display Size -->
                    <p><strong>Size:</strong> <?php echo $size; ?></p>

                    <!-- Display Description -->
                    <p><strong>Description:</strong> <?php echo $description; ?></p>
                    <!-- Display Image -->
                    <img src="../img/stalls/<?php echo $Image; ?>" alt="Stall Image" width="200" height="200">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="bg-light-gray p-3 rounded mb-4">
                    <h3 class="fw-bold">CONTRACT DATA</h3>
                    <p><strong>Contract Status:</strong> <span style="color: green;"><?php echo $active_contract_status; ?></span></p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="bg-light-gray p-3 rounded mb-4">
                    <h3 class="fw-bold">PAYMENT DATA</h3>
                    <?php if (!empty($latest_payment_date)) { ?>
                        <p><strong>Last Payment Date:</strong> <?php echo date("F j, Y", strtotime( $latest_payment_date)); ?></p>
                        <p><strong>Amount:</strong> <?php echo $amount; ?></p>
                        <p><strong>OR Number:</strong> <?php echo $ornumber; ?></p>
                    <?php } else { ?>
                        <p><strong>Last Payment Date:</strong> No payments were made.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function printTable() {
    var table = document.getElementById("TenantSummary");

    if (table) {
        var printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Tenant info</title></head><body>');
        // Center-align the text using CSS styles
        printWindow.document.write('<style>');
        printWindow.document.write('table {border-collapse: collapse; width: 100%; border: 1px solid black;}');
        printWindow.document.write('th, td {border: 1px solid black; padding: 8px;}');
        printWindow.document.write('img {display: block; margin: 0 auto; text-align: center;}'); // Center-align the image
        printWindow.document.write('</style>');
        printWindow.document.write('<h1 style="text-align: center;">Tenant Information Reports</h1>');

        // Add your logo image here with the appropriate source (src) attribute
        printWindow.document.write('<img src="../img/binalbagan.png" alt="Logo" />');

        printWindow.document.write('<div>');
        printWindow.document.write(table.outerHTML);
        printWindow.document.write('</div>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
        printWindow.onafterprint = function () {
            printWindow.close();
        };
    } else {
        alert("Table not found.");
    }
}
</script>
<!--Container Main end-->
<?php
    require 'tenantfooter.php';
?>
