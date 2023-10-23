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

// SQL Query to fetch contract details for the logged-in tenant
$contractQuery = "SELECT tenants.*, 
               market_section.section_name, 
               rental_tbl.stallno, 
               rental_tbl.monthly_fee,
               contracts.start_date, 
               contracts.end_date
        FROM tenants
        INNER JOIN contracts ON tenants.tenantid = contracts.tenant_id
        INNER JOIN tenant_status ON tenants.tenantid = tenant_status.tenant_id
        LEFT JOIN rental_tbl ON tenants.stall_id = rental_tbl.stall_id
        LEFT JOIN market_section ON rental_tbl.section_id = market_section.market_section_id
        WHERE tenant_status.tenant_status = 1
        AND contracts.contract_status = 1
        AND tenants.tenantid = '$tid'
        ORDER BY contracts.start_date DESC";

$contractResult = mysqli_query($conn, $contractQuery);
$contractResultCheck = mysqli_num_rows($contractResult);
?>

<div class="height-100 bg-light-gray main-content">
    <style>
        .bord {
            border-top: 2px solid #005c5c;
        }
    </style>

    <div class="bg-light-gray mb-5 p-3 rounded">
        <h3 class="fw-bold">Contract Details</h3><br>

        <?php
        if ($contractResultCheck > 0) {
            ?>
            <div class="table-responsive p-3 bg-light-gray mb-3 bord border-4 shadow-sm rounded">
                <hr>
                <table id="myDataTable"
                       class="table table-hover table-bordered table-striped table-sm custom-table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tenant name</th>
                        <th>Cluster/Section</th>
                        <th>Stall no</th>
                        <th>Market Fee</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Contract Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    while ($row = mysqli_fetch_assoc($contractResult)) {
                        $no++;
                        $tenantName = $row['tenant_lname'] . ', ' . $row['tenant_fname'];
                        $section = $row['section_name'];
                        $stallNo = $row['stallno'];
                        $monthly_fee = $row['monthly_fee'];
                        $start_date = date("F j, Y", strtotime($row['start_date']));
                        $end_date = date("F j, Y", strtotime($row['end_date']));
                        $contractStatus = (strtotime($row['end_date']) >= strtotime('today')) ? '<small><span class="bg-success text-white rounded"> &nbsp; Active&nbsp; </span></small>' : '<small><span class="bg-warning text-white rounded"> &nbsp; Inactive&nbsp; </span></small>';
                        echo '<tr>';
                        echo '<td>' . $no . '</td>';
                        echo '<td>' . $tenantName . '</td>';
                        echo '<td>' . $section . '</td>';
                        echo '<td>' . $stallNo . '</td>';
                        echo '<td>₱ ' . number_format($monthly_fee) . '</td>';
                        echo '<td>' . $start_date . '</td>';
                        echo '<td>' . $end_date . '</td>';
                        echo '<td>' . $contractStatus . '</td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo '<p>No contract details available for this tenant.</p>';
        }
        ?>
    </div>
</div>
<?php
    require 'tenantfooter.php';
?>
