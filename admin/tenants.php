<?php
    session_start();
    $_SESSION['actib'] = 'tenants';
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
    <div class="height-100 bg-light-gray main-content">
        <style>
            .bord{
                border-top: 2px solid #f0c53f;
            }
        </style>

    <div class="bg-light-gray mb-5 p-3 rounded">

        <h3 class="fw-bold"> Tenants</h3><br>
                <?php
                    if(isset($_GET['action'])){
                        echo '<center><small><div class="text-start alert alert-'.$_GET['action'].' alert-dismissible fade show" role="alert">
                            <strong>';
                            if($_GET['action'] == 'danger')
                                echo '<i class="fa-solid fa-user-xmark"></i>&nbsp; Tenant '.$_GET['lname'].' has been deleted !';
                            elseif($_GET['action'] == 'warning')
                                echo '<i class="fa-solid fa-user-pen"></i>&nbsp; Tenant '.$_GET['lname'].' record has been updated !';
                            elseif($_GET['action'] == 'noaccess')
                                echo '<i class="fa-solid fa-user-pen"></i>&nbsp; Only administrators can accessed the Contract details !';
                        echo '</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div></small></center>';
                        
                    }
                ?>
        <?php
        $sql = "SELECT tenants.*, 
                       CONCAT(ms.section_name, ' - ', rental_tbl.stallno) AS stall_info,
                       rental_tbl.monthly_fee
                FROM tenants
                INNER JOIN tenant_status ON tenants.tenantid = tenant_status.tenant_id
                LEFT JOIN rental_tbl ON tenants.stall_id = rental_tbl.stall_id
                LEFT JOIN market_section ms ON rental_tbl.section_id = ms.market_section_id
                WHERE tenant_status.tenant_status = 1
                ORDER BY tenants.tenant_lname ASC;";

        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        ?>
        <div class="table-responsive p-3 bg-light-gray mb-3 bord border-4 shadow-sm rounded">
            <form action="" method="post" class="d-flex justify-content-start mb-3">
                <button formaction="tenantsignup.php" type="submit" class="btn btn-dark btn-sm me-4"><i class="fa-solid fa-user-plus"></i> Add Tenant</button>
                <button type="submit" formaction="tenants.php" class="btn btn-success btn-sm me-5"><i class="fa-solid fa-arrow-rotate-right"></i> Refresh</button>
            </form>
            <hr>
            <table id="myDataTable" class="table custom-table table-hover table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Stall Occupied</th>
                        <th>Monthly Fee</th>
                        <th>Business Name</th>
                        <th>Stall Category</th>
                        <th>Phone No.</th>
                        <th>Address</th>
                        <th>Date Admitted</th>
                        <th><small>Add-Payment</th>
                        <th><small>Send Message</th>
                        <th><small>View</small></th>
                        <th><small>Edit</small></th>
                        <th><small>Delete</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 0;
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td class="fw-bold">' . ++$no . '.</td>';
                        echo '<td>' . $row['tenant_lname'] . ', ' . $row['tenant_fname'] . '</td>';
                        echo '<td>' . $row['stall_info'] . '</td>';
                        echo '<td>₱ ' . number_format($row['monthly_fee']) . '</td>';
                        echo '<td>' . $row['business_name'] . '</td>';
                        echo '<td>' . $row['stall_category'] . '</td>';
                        echo '<td>' . $row['phoneno'] . '</td>';
                        echo '<td>' . $row['address'] . '</td>';
                        echo '<td>' . date("M d, Y", strtotime($row['date_registered'])) . '</td>';
                        echo '<td class="text-center">
                              <a href="paymentform.php?addPay=' . $row['tenantid'] . '&lname=' . $row['tenant_lname'] . '&fname=' . $row['tenant_fname'] . '&monthly_fee=' . $row['monthly_fee'] . '" class="btn btn-info btn-sm rounded text-white">
                              <i class="fa-solid fa-wallet"></i>
                              </a>
                              </td>';
                        echo '<td class="text-center">
                              <a href="messages.php?addSMS=' . $row['tenantid'] . '&lname=' . $row['tenant_lname'] . '&fname=' . $row['tenant_fname'] . '&phoneno=' . $row['phoneno'] . '" class="btn btn-info btn-sm rounded text-white">
                              <i class="fa-solid fa-envelope"></i>
                              </a>
                              </td>';
                        echo '<td class="text-center"><a href="tenants.php?view=' . $row['tenantid'] . '" class="btn btn-primary btn-sm rounded"><i class="fa-solid fa-eye"></i></a></td>';
                        if ($_SESSION['ustype'] == 'Admin') {
                            echo '<td class="text-center"><a href="tenantsignup.php?editTenant=' . $row['tenantid'] . '" class="btn btn-warning btn-sm rounded"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                            echo '<td class="text-center">
                                <a href="../includes/process.php?deleteTenant=' . $row['tenantid'] . '" class="btn btn-danger btn-sm rounded" 
                                    onclick="return confirm(\'Are you sure you want to set the status of this tenant to inactive?\')">
                                    <i class="fas fa-user-alt-slash"></i>
                                </a></td>';
                        } else {
                            echo '<td class="text-center"><a href="javascript:void(0);" class="btn btn-warning btn-sm rounded disabled" disabled><i class="fa-solid fa-pen-to-square"></i></a></td>';
                            echo '<td class="text-center"><a href="javascript:void(0);" class="btn btn-danger btn-sm rounded disabled" disabled><i class="fas fa-user-alt-slash"></i></a></td>';
                        }
                        echo '</tr>';
                    }
                }
                ?>

                </tbody>
            </table>
        </div>
            <?php
            if(isset($_GET['view'])){
                $iddd = $_GET['view'];
                $sql = "SELECT * FROM tenants WHERE tenantid=$iddd;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $ii = $row['tenantid'];
                        $p = $row['tenant_lname'];
                        $k = $row['tenant_fname'];
                        $a = $row['tenant_midname'];
                        $b = $row['tenant_gender'];
                        $c = $row['birthdate'];
                        $h = $row['phoneno'];
                        $d = $row['address'];
                        $bn = $row['business_name'];
                        $cs = $row['civil_status'];
                        $sc = $row['stall_category'];
                    }
                }
                $birthdate = strtotime($c);
                $age = date('Y') - date('Y', $birthdate);

                echo '<script>
                    let str = `<div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><b>Tenant ID no.:</b></label>
                                    <input type="text" class="form-control" value="' . $ii . '" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Name:</b></label>
                                    <input type="text" class="form-control" value="' . $k . ' ' . $a . '" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Gender:</b></label>
                                    <input type="text" class="form-control" value="' . $b . '" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Birthdate:</b></label>
                                    <input type="text" class="form-control" value="' . $c . '" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Age:</b></label>
                                    <input type="text" class="form-control" value="' . $age . '" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><b>Phone No.:</b></label>
                                    <input type="text" class="form-control" value="' . $h . '" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Address:</b></label>
                                    <input type="text" class="form-control" value="' . $d . '" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Civil Status:</b></label>
                                    <input type="text" class="form-control" value="' . $cs . '" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Business name:</b></label>
                                    <input type="text" class="form-control" value="' . $bn . '" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Stall category:</b></label>
                                    <input type="text" class="form-control" value="' . $sc . '" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6 d-flex justify-content-center">
                                    <div class="mb-3">
                                        <a href="message.php?SMS=' . $ii . '" class="btn btn-primary" id="messageLink">
                                            <i class="fas fa-envelope"></i> Send Message
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                    <div class="mb-3">
                                        <a href="message.php?SMS=' . $ii . '" class="btn btn-primary" id="paymentLink">
                                            <i class="bi bi-credit-card"></i> Payment
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    Alert.render(str)
                    </script>';
            }
            ?>
        </div>
    </div>
    <!--Container Main end-->
<?php
    require 'footer1.php';
?>
