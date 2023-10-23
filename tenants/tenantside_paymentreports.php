<?php
session_start();
$_SESSION['actib'] = 'ctrt';
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

// Create a prepared statement to retrieve tenant details
$sqlTenant = "SELECT tenant_lname, tenant_fname, tenant_midname
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
    } else {
        echo "Tenant not found.";
        exit();
    }
} else {
    echo "Error preparing SQL statement for tenant details: " . $conn->error;
    exit();
}

// Create a prepared statement to retrieve payment data for the specific tenant
$sqlPayments = "SELECT paymentid, paymentdate, month_first, month_second,
                section_name, stallno, monthly_fee, amount
                FROM payments_tbl
                INNER JOIN tenants ON payments_tbl.tenant_id = tenants.tenantid
                INNER JOIN rental_tbl ON tenants.stall_id = rental_tbl.stall_id
                INNER JOIN market_section ON rental_tbl.section_id = market_section.market_section_id
                WHERE tenants.tenantid = ?
                ORDER BY paymentdate DESC";

// Initialize a prepared statement for payment data
$stmtPayments = $conn->prepare($sqlPayments);

if ($stmtPayments) {
    // Bind the parameter to the prepared statement
    $stmtPayments->bind_param("i", $get_id);

    // Execute the prepared statement for payment data
    $stmtPayments->execute();

    // Get the result set for payment data
    $resultPayments = $stmtPayments->get_result();

    $totalAmountPaid = 0;
} else {
    echo "Error preparing SQL statement for payment data: " . $conn->error;
    exit();
}
?>

<!-- Display individual payment report -->
<div class="height-100 bg-light-gray main-content">
    <style>
        .bord {
            border-top: 2px solid #c33a08;
        }
    </style>

    <div class="bg-light mb-5 p-3 rounded">

            <div class="row">
                <div class="col-md-12 mb-2">
                    <button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print" onclick="printTable()"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        <div class="table-responsive p-3 bg-light mb-3 bord border-4 shadow-sm rounded">
            <div id="report">
                <?php if ($resultPayments->num_rows > 0) : ?>
                    <table id="myDataTable" class="table table-hover table-striped table-bordered table-sm">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Section Name</th>
                                <th>Stall no.</th>
                                <th>Consumption Period</th>
                                <th>Monthly fee</th>
                                <th>Amount paid</th>
                                <th>Credit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            while ($rowPayment = $resultPayments->fetch_assoc()) {
                                $totalAmountPaid += $rowPayment['amount'];
                                // Calculate the credit
                                $monthly_fee = $rowPayment['monthly_fee'];
                                $amountPaid = $rowPayment['amount'];
                                $credit = $monthly_fee - $amountPaid;
                            ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo date('M d, Y', strtotime($rowPayment['paymentdate'])) ?></td>
                                    <td><?php echo $rowPayment['section_name'] ?></td>
                                    <td><?php echo $rowPayment['stallno'] ?></td>
                                    <td><?php echo date('F j, Y', strtotime($rowPayment['month_first'])) . ' to ' . date('F j, Y', strtotime($rowPayment['month_second'])) ?></td>
                                    <td><?php echo $rowPayment['monthly_fee'] ?></td>
                                    <td class="text-right"><?php echo number_format($rowPayment['amount'], 2) ?></td>
                                    <td>₱ <?php echo number_format($credit, 2) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="6">Total Amount</th>
                                <th class='text-right'><?php echo number_format($totalAmountPaid, 2) ?></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                <?php else : ?>
                    <!-- Display an error message using the "alert-danger" class for no data -->
                    <div class="alert alert-danger" role="alert">
                        You have no Payment's Made
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



<script>
function printTable() {
    var table = document.getElementById("myDataTable");
    var tenantName = "<?php echo $tenant_lname . ', ' . $tenant_fname . ' ' . $tenant_midname; ?>";

    if (table) {
        var printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Payment Table</title></head><body>');
        // Center-align the text using CSS styles
        printWindow.document.write('<style>');
        printWindow.document.write('table {border-collapse: collapse; width: 100%; border: 1px solid black;}');
        printWindow.document.write('th, td {border: 1px solid black; padding: 8px;}');
        printWindow.document.write('img {display: block; margin: 0 auto; text-align: center;}'); // Center-align the image
        printWindow.document.write('</style>');
        printWindow.document.write('<h1 style="text-align: center;">Tenant Payment Reports</h1>');

        // Add tenant name to the header
        printWindow.document.write('<h2 style="text-align: center;"> ' + tenantName + '</h2>');

        // Add your logo image here with the appropriate source (src) attribute
        printWindow.document.write('<img src="img/binalbagan.png" alt="Logo" />');

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
