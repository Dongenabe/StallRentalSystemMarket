<?php
session_start();
$_SESSION['actib'] = 'inactive_tenant';
require 'headerr.php';
?>
<!--Container Main start-->
<!-- this is for alert -->
<div id="dialogoverlay"></div>
<div id="dialogbox">
    <div>
        <div id="dialogboxhead"></div>
        <div id="dialogboxbody"></div>
        <div id="dialogboxfoot"></div>
    </div>
</div>
<!-- end of alert -->
<div class="height-100 bg-light main-content">
    <style>
        .bord {
            border-top: 2px solid #ff00ff;
        }
    </style>

    <div class="bg-light mb-5 p-3 rounded">
        <h3 class="fw-bold"> Inactive tenants</h3><br>
        <?php
        if (isset($_GET['action'])) {
            echo '<center><small><div class="text-start alert alert-' . $_GET['action'] . ' alert-dismissible fade show" role="alert">
            <strong>';
            if ($_GET['action'] == 'danger')
                echo '<i class="fa-solid fa-user-xmark"></i>&nbsp; ' . $_GET['lname'] . '\'s payment has been deleted !';
            elseif ($_GET['action'] == 'warning')
                echo '<i class="fa-solid fa-user-pen"></i>&nbsp; Payment record of ' . $_GET['lname'] . ' has been updated !';
            elseif ($_GET['action'] == 'success')
                echo '<i class="bi bi-check-circle-fill"></i>&nbsp; Payment for ' . $_GET['lname'] . ' has been added !';
            echo '</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div></small></center>';
        }
        ?>

        <?php
        // Retrieve all tenants where tenant_status = 0 along with date_started and date_ended
        $sql = "SELECT t.tenantid, t.tenant_lname, t.tenant_fname, ms.section_name, rt.stallno, ts.date_started, ts.date_ended
        FROM tenants t
        INNER JOIN tenant_status ts ON t.tenantid = ts.tenant_id
        INNER JOIN rental_tbl rt ON t.stall_id = rt.stall_id
        INNER JOIN market_section ms ON rt.section_id = ms.market_section_id
        WHERE ts.tenant_status = 0";

        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        ?>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print" onclick="printTable()"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        <div class="table-responsive p-3 bg-light mb-3 bord border-4 shadow-sm rounded">
            <form action="" method="post">
                <button type="submit" formaction="payment.php" class="btn btn-success btn-sm"><i class="fa-solid fa-arrow-rotate-right"></i><small> Refresh</small></button>
            </form>
            <hr>
            <table id="myDataTable" class="table custom-table table-hover table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tenant Name</th>
                        <th>Section</th>
                        <th>Stall no.</th>
                        <th>Date started</th>
                        <th>Date ended</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td class="fw-bold">' . ++$no . '.</td>';
                        echo '<td>' . $row['tenant_lname'] . ', ' . $row['tenant_fname'] . '</td>';
                        echo '<td>' . $row['section_name'] . '</td>';
                        echo '<td>' . $row['stallno'] . '</td>';
                        echo '<td>' . $row['date_started'] . '</td>';
                        echo '<td>' . $row['date_ended'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
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
        printWindow.document.write('<h1 style="text-align: center;">Inactive Tenant Reports</h1>');

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

    <?php
    require 'footer1.php';
    ?>
