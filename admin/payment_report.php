<?php
session_start();
$_SESSION['actib'] = 'pay_report';
require 'headerr.php';

$month_of = isset($_GET['month_of']) ? $_GET['month_of'] : date('Y-m');

// Execute the SQL query to retrieve payment data for the selected month
$sql2 = "SELECT payments_tbl.paymentid, payments_tbl.ornumber, payments_tbl.paymentdate, payments_tbl.paymenttime, payments_tbl.month_first, payments_tbl.month_second,
                        payments_tbl.tenant_id, 
                        tenants.tenant_lname, tenants.tenant_fname, tenants.tenant_midname,
                        rental_tbl.stallno,
                        rental_tbl.monthly_fee, -- Include monthly_fee from rental_tbl
                        market_section.section_name, -- Include section_name from market_section
                        payments_tbl.amount
                        FROM payments_tbl
                        INNER JOIN tenants ON payments_tbl.tenant_id = tenants.tenantid
                        LEFT JOIN rental_tbl ON tenants.stall_id = rental_tbl.stall_id
                        LEFT JOIN market_section ON rental_tbl.section_id = market_section.market_section_id
                        WHERE DATE_FORMAT(payments_tbl.paymentdate, '%Y-%m') = '$month_of'
                        ORDER BY payments_tbl.timestamp DESC";

$result = $conn->query($sql2);
$totalAmountPaid = 0;
?>
<div class="height-100 bg-light-gray main-content">
    <style>
        .bord {
            border-top: 2px solid #c33a08;
        }
    </style>
    <div class="bg-light mb-5 p-3 rounded">
        <h3 class="fw-bold"><i class='fa-solid fa-cash-register'></i> Payments</h3><br>
        <div class="table-responsive p-3 bg-light mb-3 bord border-4 shadow-sm rounded">
            <form id="filter-report">
                <div class="row form-group">
                    <label class="control-label col-md-2 offset-md-2 text-right">Month of:</label>
                    <input type="month" name="month_of" class="form-control col-md-4" value="<?php echo $month_of ?>">
                    <button class="btn btn-sm btn-block btn-primary col-md-2 ml-1">Filter</button>
                </div>
            </form>
            <hr>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print" onclick="printTable()"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
            <div id="report">
                <table id="myDataTable" class="table table-hover table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Consumption Perod</th>
                            <th>O.R. Number</th>
                            <th>Tenant Name</th>
                            <th>Section Name</th>
                            <th>Stall No</th>
                            <th>Monthly Fee</th>
                            <th>Amount paid</th>
                            <th>Credit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        if ($result->num_rows > 0) :
                            while ($row = $result->fetch_assoc()) :
                                $totalAmountPaid += $row['amount'];
                                $credit = $row['monthly_fee'] - $row['amount'];
                        ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo date('M d, Y', strtotime($row['paymentdate'])) ?></td>
                                    <td><?php echo date('M d, Y', strtotime($row['month_first'])) . ' to ' . date('M d, Y', strtotime($row['month_second'])) ?></td>
                                    <td><?php echo $row['ornumber'] ?></td>
                                    <td><?php echo ucwords($row['tenant_lname'] . ', ' . $row['tenant_fname'] . ', ' . $row['tenant_midname']) ?></td>
                                    <td><?php echo $row['section_name'] ?></td>
                                    <td><?php echo $row['stallno'] ?></td>
                                    <td><?php echo number_format($row['monthly_fee'], 2) ?> ₱</td>
                                    <td class="text-right"><?php echo number_format($row['amount'], 2) ?> ₱</td>
                                    <td class="text-right"><?php echo number_format($credit, 2) ?> ₱</td>
                                </tr>
                        <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <th colspan="6"><center>No Data.</center></th>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">Total Amount</th>
                            <th class='text-right'><?php echo number_format($totalAmountPaid, 2) ?> ₱</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
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
        printWindow.document.write('<h1 style="text-align: center;">Rental Payments Report</h1>');
        printWindow.document.write('<h2 style="text-align: center;">For the Month of <?php echo date("F Y", strtotime($month_of . "-01")) ?></h2>');

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
