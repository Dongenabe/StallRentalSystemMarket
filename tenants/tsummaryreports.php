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
// Retrieve tenant data
$sql = "SELECT t.tenantid, t.tenant_lname, t.tenant_fname, ms.section_name, rt.stallno
        FROM tenants t
        INNER JOIN tenant_status ts ON t.tenantid = ts.tenant_id
        INNER JOIN rental_tbl rt ON t.stall_id = rt.stall_id
        INNER JOIN market_section ms ON rt.section_id = ms.market_section_id
        WHERE ts.tenant_status = 1 AND  t.tenantid = '$tid';";
;

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

$displayedTenants = array(); // Keep track of displayed tenants
?>

<div class="table-responsive p-3 bg-light mb-3 bord border-4 shadow-sm rounded">
    <form action="" method="post">
        <button type="submit" formaction="payment.php" class="btn btn-success btn-sm" ><i class="fa-solid fa-arrow-rotate-right"></i><small> Refresh</small></button>
    </form>
    <hr>
    <table id="myDataTable" class="table custom-table table-hover table-bordered table-striped table-sm">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tenant Name</th>
                <th>Section</th>
                <th>Stall no.</th>
                <th>Individual Payment reports</th>
                <th>Individual Tenant Summary</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Check if the tenant has already been displayed
                    if (!in_array($row['tenant_lname'] . $row['tenant_fname'], $displayedTenants)) {
                        echo '<tr>';
                        echo '<td class="fw-bold">' . ++$no . '.</td>';
                        echo '<td>' . $row['tenant_lname'] . ', ' . $row['tenant_fname'] . '</td>';
                        echo '<td>' . $row['section_name'] . '</td>';
                        echo '<td>' . $row['stallno'] . '</td>';
                        echo '<td class="text-center"><a href="tenantside_paymentreports.php?l_id=' . $row['tenantid'] . '" class="btn btn-warning btn-sm rounded"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                        echo '<td class="text-center"><a href="tenantside_info.php?l_id=' . $row['tenantid'] . '" class="btn btn-warning btn-sm rounded"><i class="fa-solid fa-pen-to-square"></i></a></td>';


                        echo '</tr>';
                        $displayedTenants[] = $row['tenant_lname'] . $row['tenant_fname']; // Mark tenant as displayed
                    }
                }
            }
            ?>
        </tbody>
    </table>
</div>
</div>