<?php
session_start();
$_SESSION['actib'] = 'payment';
require 'headerr.php';

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

// Create a prepared statement to retrieve contract data for the specific tenant
$sqlContracts = "SELECT start_date, end_date
                FROM contracts
                WHERE tenant_id = ? AND contract_status = 0
                ORDER BY start_date DESC";

// Initialize a prepared statement for contract data
$stmtContracts = $conn->prepare($sqlContracts);

if ($stmtContracts) {
    // Bind the parameter to the prepared statement
    $stmtContracts->bind_param("i", $get_id);

    // Execute the prepared statement for contract data
    $stmtContracts->execute();

    // Get the result set for contract data
    $resultContracts = $stmtContracts->get_result();
} else {
    echo "Error preparing SQL statement for contract data: " . $conn->error;
    exit();
}
?>

<div class="height-100 bg-light-gray main-content">
    <div class="bg-light-gray mb-5 p-3 rounded">
        <h3 class="fw-bold">Contract Details</h3><br>
        <div class="table-responsive p-3 bg-light mb-3 bord border-4 shadow-sm rounded">
            <h4 class="fw-bold"><?php echo $tenant_lname . ', ' . $tenant_fname . ' ' . $tenant_midname; ?></h4>
        <?php
        if ($resultContracts->num_rows > 0) {
            ?>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print" onclick="printTable()"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
            <div class="table-responsive p-3 bg-light-gray mb-3 bord border-4 shadow-sm rounded">
                <hr>
                <table id="myDataTable"
                       class="table table-hover table-bordered table-striped table-sm custom-table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tenant name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    while ($row = $resultContracts->fetch_assoc()) {
                        $no++;
                        $start_date = date("F j, Y", strtotime($row['start_date']));
                        $end_date = date("F j, Y", strtotime($row['end_date']));
                        echo '<tr>';
                        echo '<td>' . $no . '</td>';
                        echo '<td>' . $tenant_lname . ', ' . $tenant_fname . ' ' . $tenant_midname . '</td>';
                        echo '<td>' . $start_date . '</td>';
                        echo '<td>' . $end_date . '</td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo '<p>No contract details available for this tenant with contract status "Inactive".</p>';
        }
        ?>
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
        printWindow.document.write('<h1 style="text-align: center;">Tenant Contract Reports</h1>');

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
    require 'footer1.php';
?>
