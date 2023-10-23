<?php
session_start();
$_SESSION['actib'] = 'ctrt_report';
require 'headerr.php';

// Create a prepared statement to retrieve all contract data where contract_status = 0
$sqlContracts = "SELECT tenant_id, start_date, end_date
                FROM contracts
                WHERE contract_status = 0
                ORDER BY start_date DESC";

// Initialize a prepared statement for contract data
$stmtContracts = $conn->prepare($sqlContracts);

if ($stmtContracts) {
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
        <h3 class="fw-bold">Contract Reports</h3><br>
        <div class="table-responsive p-3 bg-light mb-3 bord border-4 shadow-sm rounded">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print" onclick="printTable()"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
            <table id="myDataTable"
                   class="table table-hover table-bordered table-striped table-sm custom-table">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Tenant Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($resultContracts->num_rows > 0) {
                    $no = 0;
                    while ($row = $resultContracts->fetch_assoc()) {
                        $no++;
                        $tenantId = $row['tenant_id'];

                        // Fetch tenant details for the tenant_id
                        $sqlTenant = "SELECT tenant_lname, tenant_fname, tenant_midname FROM tenants WHERE tenantid = ?";
                        $stmtTenant = $conn->prepare($sqlTenant);

                        if ($stmtTenant) {
                            $stmtTenant->bind_param("i", $tenantId);
                            $stmtTenant->execute();
                            $resultTenant = $stmtTenant->get_result();

                            if ($resultTenant->num_rows > 0) {
                                $rowTenant = $resultTenant->fetch_assoc();
                                $tenantName = $rowTenant['tenant_lname'] . ', ' . $rowTenant['tenant_fname'] . ' ' . $rowTenant['tenant_midname'];
                            }
                        }

                        $start_date = date("F j, Y", strtotime($row['start_date']));
                        $end_date = date("F j, Y", strtotime($row['end_date']));

                        echo '<tr>';
                        echo '<td>' . $no . '</td>';
                        echo '<td>' . $tenantName . '</td>';
                        echo '<td>' . $start_date . '</td>';
                        echo '<td>' . $end_date . '</td>';
                        echo '<td>Contract Expired</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No contract details available with contract status "0 = Contract Expired."</td></tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
function printTable() {
    var table = document.getElementById("myDataTable");
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
        printWindow.document.write('<h1 style="text-align: center;">Tenant Contract Report</h1>');

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
