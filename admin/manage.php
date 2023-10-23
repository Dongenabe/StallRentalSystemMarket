<?php
    session_start();
    $_SESSION['actib'] = 'mngmnt';
    require 'headerr.php';
    $collection=0;
    $tenants=0;
    $inquiry=0;
    $user=0;
    $concerns = 0;
    $maintenance = 0;
    $curr_month = date("F");
    $curr_year = date("Y");

    $sql = "SELECT COUNT(stall_id) AS tot FROM rental_tbl;";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if($check > 0){
        while($row = mysqli_fetch_assoc($result)){
            $stalls = $row['tot'];
        }
    }
    $sql = "SELECT COUNT(stall_id) AS tot FROM rental_tbl WHERE status='Maintenance';";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if($check > 0){
        while($row = mysqli_fetch_assoc($result)){
            $maintenance = $row['tot'];
        }
    }
    $sql = "SELECT COUNT(userid) AS tot FROM users;";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if($check > 0){
        while($row = mysqli_fetch_assoc($result)){
            $user = $row['tot'];
        }
    }
    $sql = "SELECT COUNT(tenantid) AS tot FROM tenants INNER JOIN tenant_status ON tenants.tenantid = tenant_status.tenant_id WHERE tenant_status.tenant_status = 1;";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if($check > 0){
        while($row = mysqli_fetch_assoc($result)){
            $tenants = $row['tot'];
        }
    }
    $sql = "SELECT SUM(amount) AS totalCollection FROM payments_tbl WHERE MONTHNAME(paymentdate) = '$curr_month' AND YEAR(paymentdate) = '$curr_year';";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if($check > 0){
        while($row = mysqli_fetch_assoc($result)){
            $collection = $row['totalCollection'];
        }
    }

    $sql = "SELECT COUNT(req_id) AS tot FROM request_tbl WHERE status='unread';";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if($check > 0){
        while($row = mysqli_fetch_assoc($result)){
            $inquiry = $row['tot'];
        }
    }
    $sql = "SELECT COUNT(concernid) AS tot FROM tconcerns WHERE status='Not process yet';";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if($check > 0){
        while($row = mysqli_fetch_assoc($result)){
            $concern = $row['tot'];
        }
    }
//For the Monthly Collection
// Initialize default values
$curr_month = date("m");
$curr_year = date("Y");
$dateYear = $curr_year . '-' . date("m");
$_SESSION['taon'] = $curr_year;
$curr_days = cal_days_in_month(CAL_GREGORIAN, date("m"), $curr_year);
$expectedCollection = 0;
$receivedCollection = 0;
$remaining = 0;


$_SESSION['taonbuwan'] = $dateYear;

// Handle search by date
if (isset($_POST['searchDate'])) {
    if (!empty($_POST['dateYear'])) {
        $yearDate = explode('-', $_POST['dateYear']);
        $curr_month = $yearDate[1];
        $curr_year = $yearDate[0];
        $dateYear = $_POST['dateYear'];
        $curr_days = cal_days_in_month(CAL_GREGORIAN, $yearDate[1], $yearDate[0]);
        $expectedCollection = 0;
        $receivedCollection = 0;
        $remaining = 0;
    }
}


// Handle search by year
if (isset($_POST['searchYear'])) {
    $taon = $_POST['Year'];
    $_SESSION['taon'] = $taon;
}

?>
    <!--Container Main start-->
    <div class="height-100 bg-light main-content">
        <style>
            .bord{
                border-top: 2px solid #04204e;
            }
            .bordd{
                border-top: 2px solid red;
            }
            .borddd{
                border-top: 2px solid #f0c53f;
            }
        </style>
<!-- Main content -->
<div class="height-100 bg-light-gray main-content">
    <div class="bg-light-gray mb-5 p-3 rounded">
        <h3 class="fw-bold mb-2"><i class='fas fa-tachometer-alt nav_icon'></i> Dashboard</h3><br>
        <div class="p-2 mb-2 bg-light-gray border-4 shadow-sm rounded">
    <div class="row g-3 my-2 justify-content-center">
        <div class="col-md-4">
            <a href="rental.php" class="text-decoration-none">
                <div class="card bg-primary text-white">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa-solid fa-store fs-4 rounded mr-2"></i>
                        <div>
                            <p class="fs-5">Stalls</p>
                            <h3 class="fs-3"><?php echo $stalls; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="maintenance.php" class="text-decoration-none">
                <div class="card bg-primary text-white">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa-solid fa-wrench fs-4 rounded mr-2"></i>
                        <div>
                            <p class="fs-5">Under Maintenance Stalls</p>
                            <h3 class="fs-3"><?php echo $maintenance; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="payments.php" class="text-decoration-none">
                <div class="card bg-primary text-white">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <p class="fs-5">Collection</p>
                            <h3 class="fs-3"><i class="fa-solid fa-peso-sign"></i> <?php echo number_format($collection, 2); ?></h3>
                            <p class="fs-6"><?php echo date("F Y") ?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="request.php" class="text-decoration-none">
                <div class="card bg-success text-white">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa-solid fa-users-line fs-4 rounded mr-2"></i>
                        <div>
                            <p class="fs-5">Inquiries</p>
                            <h3 class="fs-3"><?php echo $inquiry; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="tconcerns.php" class="text-decoration-none">
                <div class="card bg-success text-white">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa-solid fa-circle-info fs-4 rounded mr-2"></i>
                        <div>
                            <p class="fs-5">Pending Concerns</p>
                            <h3 class="fs-3"><?php echo $concern; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="users.php" class="text-decoration-none">
                <div class="card bg-dark text-white">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa-sharp fa-solid fa-users fs-4 rounded mr-2"></i>
                        <div>
                            <p class="fs-5">Users</p>
                            <h3 class="fs-3"><?php echo $user; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="tenants.php" class="text-decoration-none">
                <div class="card bg-dark text-white">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa-sharp fa-solid fa-users fs-4 rounded mr-2"></i>
                        <div>
                            <p class="fs-5">Tenants</p>
                            <h3 class="fs-3"><?php echo $tenants; ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

        </div>
    </div>
    <div class="px-4 p-2 bg-light rounded">
                <div class="row justify-content-around rounded">
                    <div class="col-md-7 g-5 my-2 bg-light bordd border-4 shadow-sm rounded">
                    <h4 class="my-3 fw-bold"><i class='fa-solid fa-store'></i> Available Stalls</h4>
                    <hr class="dropdown-divider"></li>
                        <div class="card px-5 my-2">
                            <div class="class-card">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 g-5 my-2 rounded">
                        <div class="table-responsive px-3 my-3 bg-light borddd border-4 shadow-sm rounded">
                        <h4 class="my-3 fw-bold"><i class='fa-solid fa-store'></i> Cluster/Section</h4>
                        <hr class="dropdown-divider"></li>
                        <table id="myDataTable" class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Cluster/Section</th>
                                    <th>Available Stalls</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $sikwel = "SELECT ms.section_name, COUNT(rt.section_id) AS countCluster 
                                           FROM market_section ms
                                           LEFT JOIN rental_tbl rt ON ms.market_section_id = rt.section_id AND rt.status = 'Available'
                                           WHERE rt.status = 'Available' AND rt.section_id IS NOT NULL
                                           GROUP BY ms.section_name
                                           ORDER BY ms.section_name ASC;";
                                $results = mysqli_query($conn, $sikwel);
                                $resultsCheck = mysqli_num_rows($results);

                                if ($resultsCheck > 0) {
                                    while ($rows = mysqli_fetch_assoc($results)) {
                                        $distinctSection = $rows['section_name'];
                                        $countCluster = $rows['countCluster'];

                                        echo '<tr>';
                                        echo '<td class="fw-bold">' . ++$no . '.</td>';
                                        echo '<td>' . $distinctSection . '</td>';
                                        echo '<td>' . $countCluster . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
    <div class="height-100 bg-light-gray main-content">
        <style>
            .bord{
                border-top: 2px solid #c33a08;
            }
        </style>
    <div class="bg-light-gray mb-5 p-3 rounded">
        <div class="row justify-content-around p-2 bg-light bordd border-4 shadow-sm rounded">
            <div class="col-md-6 g-5 my-2 bg-light shadow-sm rounded">
                <br>
                <h4 class="text-center"><i class="fa-solid fa-coins"></i> Monthly Collection</h4>
                <hr>
                <form action="" method="post">
                    <div class="col-md-3 input-group mb-3">
                        <input type="number" class="form-control form-control-sm" name="Year" aria-label="Example text with button addon" aria-describedby="button-addon1" min="1900" max="<?php echo $curr_year; ?>" Placeholder="Enteryear here..." value="<?php echo $taon; ?>">
                        <button class="btn btn-info btn-sm text-white" name="searchYear" type="submit" id="button-addon1"><small><i class="fa-solid fa-magnifying-glass"></i> Find</small></button>
                    </div>
                </form>

                <div class="card">
                    <div class="class-card">
                        <canvas id="statsChart"></canvas>
                    </div>
                </div>
                <hr>
            </div>
            <hr>
        </div>
    </div>
<div class="row g-3 my-2 justify-content-around"  id="Due">
    <div class="col-md-12 g-5 my-2 py-3 bg-light bordddd border-4 shadow-sm rounded"><br>
                        <?php
                            $currentmonth1 = date("m");
                            $currentyear1 = date("Y");
                            $curr_dayss1 = cal_days_in_month(CAL_GREGORIAN,date("m"),$currentyear1);
                            $dateYearStatus = $currentyear1.'-'.date("m");

                            $expectedCollection2 = 0;
                            $paidAmount = 0;

                        
                            if(isset($_POST['searchDateStatus'])){
                                if(empty($_POST['dateYearStatus'])){
                                    
                                }else{
                                    $yearDate = explode('-',$_POST['dateYearStatus']);
                        
                                    $currentmonth1 = $yearDate[1];
                                    $currentyear1 = $yearDate[0];
                                    $dateYearStatus = $_POST['dateYearStatus'];
                        
                                    $curr_dayss1 = cal_days_in_month(CAL_GREGORIAN,$yearDate[1],$yearDate[0]);
                                    $expectedCollection2 = 0;
                                    $paidAmount = 0;
                                }
                            }elseif(isset($_GET['yeardate'])){
                                $yearDate = explode('-',$_GET['yeardate']);
                    
                                $currentmonth1 = $yearDate[1];
                                $currentyear1 = $yearDate[0];
                                $dateYearStatus = $_GET['yeardate'];

                                $curr_dayss1 = cal_days_in_month(CAL_GREGORIAN,$yearDate[1],$yearDate[0]);
                                $expectedCollection2 = 0;
                                $paidAmount = 0;
                            }
                        ?>
                
                    <h4 class="text-start"><i class='fa-solid fa-cash-register'></i> Payment Status <span class="fs-6">(<?php $dateObj   = DateTime::createFromFormat('!m', $currentmonth1);
                        $monthName = $dateObj->format('F'); echo $monthName.', '.$currentyear1; ?>)</span></h4><hr>

                    <form action="manage.php#due" method="post">
                        <div class="col-md-3 input-group mb-3">
                            <input type="month" class="form-control form-control-sm" name="dateYearStatus" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?php echo $dateYearStatus; ?>">
                            <button class="btn btn-info btn-sm text-white" name="searchDateStatus" type="submit" id="button-addon1"><small><i class="fa-solid fa-magnifying-glass"></i> Find</small></button>
                        </div>
                    </form>
        <div class="table-responsive">
            <table id="myDataTable1" class="table custom-table table-hover table-bordered table-striped table-sm">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Tenant name</th>
                        <th>Stall Occupied</th>
                        <th>Monthly Fee</th>
                        <th>Unpaid Balance</th>
                        <th>Status</th>
                        <th>Add Payment</th>
                        <th>Reminders</th>
                        <th>Reminders</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;

                                        // Retrieve tenant information along with required data for tenants with tenant_status = 1 (active tenants)
                    // Modify the SQL query to filter tenants based on the selected year and month
                    $query = "SELECT tenants.*, 
                        CONCAT(ms.section_name, ' - ', rental_tbl.stallno) AS stall_info,
                        rental_tbl.monthly_fee
                    FROM tenants
                    INNER JOIN tenant_status ON tenants.tenantid = tenant_status.tenant_id
                    LEFT JOIN rental_tbl ON tenants.stall_id = rental_tbl.stall_id
                    LEFT JOIN market_section ms ON rental_tbl.section_id = ms.market_section_id
                    WHERE tenant_status.tenant_status = 1
                        AND tenants.date_registered <= NOW()
                        AND (YEAR(tenants.date_registered) < $currentyear1
                            OR (YEAR(tenants.date_registered) = $currentyear1 AND MONTH(tenants.date_registered) <= $currentmonth1))
                    ORDER BY tenants.tenant_lname ASC;";


                    $resquery = mysqli_query($conn, $query);
                    $resqueryCheck = mysqli_num_rows($resquery);
                    echo mysqli_error($conn);

                    if ($resqueryCheck > 0) {
                        while ($row = mysqli_fetch_assoc($resquery)) {
                            echo '<tr>';
                            echo '<td class="fw-bold">' . ++$no . '.</td>';
                            echo '<td>' . $row['tenant_lname'] . ', ' . $row['tenant_fname'] . '</td>';
                            echo '<td>' . $row['stall_info'] . '</td>';
                            echo '<td>₱ ' . number_format($row['monthly_fee']) . '</td>';

                            // Calculate the total paid amount for the tenant from payments_tbl
                            $totalPaidAmount = 0;

                            // Retrieve total paid amount for the tenant from payments_tbl for the current month and year
                            $totalPaidQuery = "SELECT COALESCE(SUM(amount), 0) AS totalPaid FROM payments_tbl WHERE tenant_id = {$row['tenantid']} AND MONTH(month_first) = $currentmonth1 AND YEAR(month_first) = $currentyear1";
                            $totalPaidResult = mysqli_query($conn, $totalPaidQuery);

                            if ($totalPaidRow = mysqli_fetch_assoc($totalPaidResult)) {
                                $totalPaidAmount = $totalPaidRow['totalPaid'];
                            }

                            // Calculate the Outstanding Balance
                            $outstandingBalance = $row['monthly_fee'] - $totalPaidAmount;

                            echo '<td>₱ ' . number_format($outstandingBalance) . '</td>';

                            // Determine the payment status (Due or Paid)
                            echo '<td class="fw-bold">';
                            if ($outstandingBalance > 0) {
                                echo '<small><span class="bg-warning text-white rounded"> &nbsp; Due &nbsp; </span></small>';
                            } else {
                                echo '<small><span class="bg-success text-white rounded"> &nbsp; Paid &nbsp; </span></small>';
                            }

                            // Display "Add Payment" button based on payment status
                            echo '<td class="text-center">';
                            if ($outstandingBalance <= 0) {
                                echo '<button type="button" class="btn btn-primary btn-sm" disabled><small>Add Payment</small></button>';
                            } else {
                                echo '<a href="paymentForm.php?addPay=' . $row['tenantid'] . '&lname=' . $row['tenant_lname'] . '&fname=' . $row['tenant_fname'] . '&monthly_fee=' . $row['monthly_fee'] .  ' " class="btn btn-primary btn-sm"><small>Add Payment</small></a>';
                            }
                            echo '</td>';

                            echo '<td class="text-center">';
                            if ($row['reminder'] == 1) {
                                echo '<button class="btn btn-warning btn-sm" disabled>
                                    <small>Set Reminder</small>
                                </button>';
                            } else {
                                echo '<button class="btn btn-warning btn-sm" onclick="setReminder(' . $row['tenantid'] . ')">
                                    <small>Set Reminder</small>
                                </button>';

                            }
                            echo '<td class="text-center">';
                            if ($row['reminder'] == 2) {
                                echo '<button class="btn btn-warning btn-sm" disabled>
                                    <small>Past Due Reminder</small>
                                </button>';
                            } else {
                                echo '<button class="btn btn-warning btn-sm" onclick="dueDate(' . $row['tenantid'] . ')">
                                    <small>Past Due Reminder</small>
                                </button>';

                            }
                            echo '</td>';

                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

        </div><br><br>
    </div>
    </div>

    <!-- Remidners --->
<script>
function setReminder(tenantId) {
    // Send an AJAX request to update the reminder for the tenant
    $.ajax({
        type: "POST",
        url: "updateReminder.php", // Create a PHP file to handle the update
        data: {
            tenantId: tenantId
        },
        success: function(response) {
            if (response === "success") {
                // Update the button or perform any other UI changes if needed
                alert("Reminder set successfully.");
            } else {
                alert("Failed to set the reminder.");
            }
        }
    });
}

function dueDate(tenantId) {
    // Send an AJAX request to update the reminder for the tenant
    $.ajax({
        type: "POST",
        url: "updateReminder.php",
        data: {
            tenantId: tenantId,
            function: 'dueDate' // Add this parameter to specify the function
        },
        success: function(response) {
            if (response === "success") {
                // Update the button or perform any other UI changes if needed
                alert("Reminder set successfully.");
            } else {
                alert("Failed to set the reminder.");
            }
        }
    });
}

</script>
<?php
    require 'footer1.php';
?>
    <!--Container Main end-->   
