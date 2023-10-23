<?php
    session_start();
    $_SESSION['actib'] = 'payment';
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
        <h3 class="fw-bold"><i class='fa-solid fa-cash-register'></i>Payments</h3><br>
                <?php
                    if(isset($_GET['action'])){
                        echo '<center><small><div class="text-start alert alert-'.$_GET['action'].' alert-dismissible fade show" role="alert">
                            <strong>';
                            if($_GET['action'] == 'danger')
                                echo '<i class="fa-solid fa-user-xmark"></i>&nbsp; payment has been deleted !';
                            elseif($_GET['action'] == 'warning')
                                echo '<i class="fa-solid fa-user-pen"></i>&nbsp; Payment record of has been updated !';
                            elseif($_GET['action'] == 'success')
                                echo '<i class="bi bi-check-circle-fill"></i>&nbsp; Payment has been added !';
                        echo '</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div></small></center>';
                        
                    }
                ?>        
                <?php
                $sql = "SELECT payments_tbl.paymentid, payments_tbl.ornumber, payments_tbl.paymentdate, payments_tbl.paymenttime, payments_tbl.month_first, payments_tbl.month_second,
                        payments_tbl.tenant_id, 
                        tenants.tenant_lname, tenants.tenant_fname,
                        rental_tbl.stallno,
                        rental_tbl.monthly_fee,
                        market_section.section_name,
                        payments_tbl.amount,
                        payments_tbl.userid,
                        users.fname,
                        users.lname,
                        users.usertype
                        FROM payments_tbl
                        INNER JOIN tenants ON payments_tbl.tenant_id = tenants.tenantid
                        LEFT JOIN rental_tbl ON tenants.stall_id = rental_tbl.stall_id
                        LEFT JOIN market_section ON rental_tbl.section_id = market_section.market_section_id
                        LEFT JOIN users ON payments_tbl.userid = users.userid
                        ORDER BY payments_tbl.timestamp DESC";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                ?>

                <div class="table-responsive p-3 bg-light mb-3 bord border-4 shadow-sm rounded">
                    <form action="" method="post">
                        <button formaction="tenants.php" type="submit" class="btn btn-dark btn-sm"><i class='fa-solid fa-cash-register'></i>&nbsp;Add payment</button>&nbsp;
                        <button type="submit" formaction="payment.php" class="btn btn-success btn-sm" ><i class="fa-solid fa-arrow-rotate-right"></i><small> Refresh</small></button>
                    </form>
                    <hr>
                    <table id="myDataTable" class="table custom-table table-hover table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>O.R. number</th>
                                <th>Date and Time</th>
                                <th>Consumption Period</th>
                                <th>Tenant Name</th>
                                <th>Section</th>
                                <th>Stall no.</th>
                                <th>Monthly fee</th>
                                <th>Amount paid</th>
                                <th>Credit</th>
                                <th>Addressed by</th>
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
                                echo '<td>' . $row['ornumber'] . '</td>';
                                echo '<td>' . date('M d, Y', strtotime($row['paymentdate'])) . ', ' . $row['paymenttime'] . '</td>';
                                echo '<td>' .date('M d, Y', strtotime($row['month_first'])) . ' to ' . date('M d, Y', strtotime($row['month_second'])). '</td>';
                                echo '<td>' . $row['tenant_lname'] . ', ' . $row['tenant_fname'] . '</td>';
                                echo '<td>' . $row['section_name'] . '</td>';
                                echo '<td>' . $row['stallno'] . '</td>';
                                echo '<td>₱ ' . number_format($row['monthly_fee']) . '</td>';
                                echo '<td>₱ ' . number_format($row['amount']) . '</td>';

                                // Calculate the credit as monthly_fee - amount paid
                                $monthly_fee = $row['monthly_fee'];
                                $amountPaid = $row['amount'];
                                $credit = $monthly_fee - $amountPaid;

                                // Display the credit in the "Credit" column
                                echo '<td>₱ ' . number_format($credit) . '</td>';

                                // Display the "Addressed by" information
                                echo '<td>' . $row['fname'] . ', ' . $row['lname'] . ' (' . '<strong>' . $row['usertype'] . '</strong>' . ')</td>';
                                echo '<td class="text-center"><a href="paymentForm.php?editPayment=' . $row['paymentid'] . '" class="btn btn-warning btn-sm rounded"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                                echo '<td class="text-center"><a href="payments.php?deletePayment=' . $row['paymentid'] . '" class="btn btn-warning btn-sm rounded"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                                echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>


    <!--Container Main end-->
<?php
    require 'footer1.php';
?>