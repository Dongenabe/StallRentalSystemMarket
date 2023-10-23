<?php
    session_start();
    $_SESSION['actib'] = 'active_tenant';
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
            .bord{
                border-top: 2px solid #ff00ff;
            }
        </style>

<div class="bg-light mb-5 p-3 rounded">
    <h3 class="fw-bold">Active Tenants</h3><br>
    <?php
    if(isset($_GET['action'])){
        echo '<center><small><div class="text-start alert alert-'.$_GET['action'].' alert-dismissible fade show" role="alert">
            <strong>';
            if($_GET['action'] == 'danger')
                echo '<i class="fa-solid fa-user-xmark"></i>&nbsp; '.$_GET['lname'].'\'s payment has been deleted !';
            elseif($_GET['action'] == 'warning')
                echo '<i class="fa-solid fa-user-pen"></i>&nbsp; Payment record of '.$_GET['lname'].' has been updated !';
            elseif($_GET['action'] == 'success')
                echo '<i class="bi bi-check-circle-fill"></i>&nbsp; Payment for '.$_GET['lname'].' has been added !';
        echo '</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div></small></center>';

    }
    ?>        
<?php
// Retrieve tenant data where status = 1=active
$sql = "SELECT t.tenantid, t.tenant_lname, t.tenant_fname, ms.section_name, rt.stallno
        FROM tenants t
        INNER JOIN tenant_status ts ON t.tenantid = ts.tenant_id
        INNER JOIN rental_tbl rt ON t.stall_id = rt.stall_id
        INNER JOIN market_section ms ON rt.section_id = ms.market_section_id
        WHERE ts.tenant_status = 1";

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
                <th>Individual Contract reports</th>
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
                        echo '<td class="text-center"><a href="tenantreport.php?l_id=' . $row['tenantid'] . '" class="btn btn-warning btn-sm rounded"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                        echo '<td class="text-center"><a href="individual_contracts.php?l_id=' . $row['tenantid'] . '" class="btn btn-warning btn-sm rounded"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                        echo '<td class="text-center"><a href="tenantsummary.php?l_id=' . $row['tenantid'] . '" class="btn btn-warning btn-sm rounded"><i class="fa-solid fa-pen-to-square"></i></a></td>';


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

<?php
    require 'footer1.php';
?>