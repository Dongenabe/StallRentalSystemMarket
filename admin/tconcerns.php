<?php
session_start();
$_SESSION['actib'] = 'concerns';
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
        .bord {
            border-top: 2px solid #c33a08;
        }
    </style>
<div class="bg-light-gray mb-5 p-3 rounded">
    <h3 class="fw-bold">Concern of tenants</h3><br>
    <div class="row justify-content-around mb-3 p-2 bg-light bordddd border-4 shadow-sm rounded">
        <h5 class="text-start mt-4"><i class="fa-solid fa-comments"></i>Tenants Concern</h5>
        <hr>
        <?php
        if(isset($_GET['action']) && isset($_GET['message'])){
            echo '<center><small><div class="text-start alert alert-'.$_GET['action'].' alert-dismissible fade show" role="alert">
                <strong>';
            echo '<i class="fa-solid fa-user-pen"></i>&nbsp; ' . $_GET['message'];
            echo '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div></small></center>';
        }
        ?>
        <?php
        // SQL query to retrieve information about tenant concerns, including related details.
        $sql = "SELECT tconcerns.concernid, tconcerns.status, 
                       tenants.tenant_fname, tenants.tenant_lname,
                       market_section.section_name, rental_tbl.stallno, tconcerns.date_time_created,
                       users.fname, users.lname, users.usertype
                FROM tconcerns
                LEFT JOIN tenants ON tconcerns.tenantid = tenants.tenantid
                LEFT JOIN rental_tbl ON tenants.stall_id = rental_tbl.stall_id
                LEFT JOIN market_section ON rental_tbl.section_id = market_section.market_section_id
                LEFT JOIN users ON tconcerns.userid = users.userid
                WHERE tconcerns.status IN (0, 1, 2)
                ORDER BY tconcerns.date_time_created DESC;";

        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        ?>
        <form action="" method="post">
            <div class="buttons" style="float:right;">
                <button type="button" class="btn btn-primary" id="buttonall">All</button>
                <button type="button" class="btn btn-primary" id="buttonNotprocess">Not process</button>
                <button type="button" class="btn btn-primary" id="buttonInprocess">In process</button>
                <button type="button" class="btn btn-primary" id="buttonclosed">Closed</button>
            </div>
        </form>

        <!-- Display a table to present tenant concerns -->
        <div class="table-responsive p-3 bg-light mb-3 rounded">
            <table id="myDataTable" class="table custom-table table-hover table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Tenant name</th>
                        <th>Stall occupied</th>
                        <th>Date created</th>
                        <th>Addressed by</th>
                        <th class="text-center">View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $statusLabels = array(
                        0 => 'Not process',
                        1 => 'In process',
                        2 => 'Closed'
                    );

                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Determine and set status class based on the status value
                            $status = $row['status'];
                            $statusClass = '';
                            if ($status == 0) {
                                $statusClass = 'bg-danger text-white rounded';
                            } elseif ($status == 1) {
                                $statusClass = 'bg-warning text-white rounded';
                            } elseif ($status == 2) {
                                $statusClass = 'bg-success text-white rounded';
                            }

                            // Output each row in the table with relevant information
                            echo '<tr>';
                            echo '<td class="fw-bold">' . ++$no . '.</td>';
                            echo '<td class="text-center"><p class="' . $statusClass . '">' . $statusLabels[$status] . '</p></td>';
                            echo '<td>' . $row['tenant_fname'] . ' ' . $row['tenant_lname'] . '</td>';
                            echo '<td>' . $row['section_name'] . ' - Stall No. ' . $row['stallno'] . '</td>';
                            echo '<td>' . $row['date_time_created'] . '</td>';
                            echo '<td>' . $row['fname'] . ', ' . $row['lname'] . ' (' . '<strong>' . $row['usertype'] . '</strong>' . ')</td>';
                            echo '<td class="text-center"><a href="tconcerns.php?view=' . $row['concernid'] . '" class="btn btn-primary btn-sm rounded"><i class="fa-solid fa-eye"></i></a></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Create a hidden form input to store the user ID -->
        <input type="hidden" name="userid" value="<?php echo $_SESSION['usrId']; ?>">

        <?php
        // If a "view" parameter is in the URL, retrieve and display the details for a specific concern
        if (isset($_GET['view'])) {
            $iddd = $_GET['view'];
            $sql = "SELECT tconcerns.concernid, tconcerns.status, 
                       CONCAT(tenants.tenant_fname, ' ', tenants.tenant_lname) AS tenant_name, 
                       CONCAT(market_section.section_name, ' - ', rental_tbl.stallno) AS section_info, 
                       tconcerns.date_time_created, tenants.tenant_gender, rental_tbl.stallno, tconcerns.concerns
                FROM tconcerns
                LEFT JOIN tenants ON tconcerns.tenantid = tenants.tenantid
                LEFT JOIN rental_tbl ON tenants.stall_id = rental_tbl.stall_id
                LEFT JOIN market_section ON rental_tbl.section_id = market_section.market_section_id
                WHERE tconcerns.concernid = $iddd
                ORDER BY tconcerns.date_time_created DESC;";
            
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $p = $row['tenant_name'];
                    $k = $row['tenant_gender'];
                    $a = $row['section_info'];
                    $b = $row['stallno'];
                    $t = $row['status'];
                    $c = $row['concerns'];
                    $h = $row['date_time_created'];
                }
                
                // Define labels for different status values
                $statusLabels = array(
                    0 => 'Not process',
                    1 => 'In process',
                    2 => 'Closed'
                );
                
                // Generate a JavaScript script to display details in a modal dialog
                echo '<script>
                    let str = `<div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><b>Name:</b></label>
                                    <input type="text" class="form-control" value="' . $p . '" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Stall name:</b></label>
                                    <input type="text" class="form-control" value="' . $a . '" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Date created:</b></label>
                                    <input type="text" class="form-control" value="' . $h . '" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><b>Gender:</b></label>
                                    <input type="text" class="form-control" value="' . $k . '" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><b>Stall No.:</b></label>
                                    <input type="text" class="form-control" value="' . $b . '" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="mb-3">
                                    <h5>Status</h5>
                                    <input type="text" class="form-control" value="' . $statusLabels[$t] . '" readonly>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="mb-3">
                                    <h5>Tenant\'s Concern Message</h5>
                                    <input type="text" class="form-control" value="' . $c . '" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <form method="POST" action="">
                                    <input type="hidden" name="concern_id" value="' . $iddd . '">
                                    <select name="status" class="form-select form-select-sm">
                                        <option value="In process" ' . ($t == 1 ? 'selected' : '') . '>In process</option>
                                        <option value="Closed" ' . ($t == 2 ? 'selected' : '') . '>Closed</option>';
                                    
                        // Add the "disabled" attribute to the button if status is 2 (Closed)
                        if ($t == 2) {
                            echo '<button type="submit" name="action" class="btn btn-success btn-sm rounded" disabled>Take Action</button>';
                        } else {
                            echo '<button type="submit" name="action" class="btn btn-success btn-sm rounded">Take Action</button>';
                        }
                                    
                        echo '</form>
                            </div>
                        </div>
                    </div>`;
                    Alert.render(str);
                </script>';
            }
        }
        ?>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // Handle button clicks to filter tenant concerns based on status
            $('#buttonall').click(function() {
                $('table tbody tr').show(); // Show all rows
            });
            $('#buttonNotprocess').click(function() {
                $('table tbody tr').hide();
                $('table tbody tr:has(.bg-danger)').show();
            });
            $('#buttonclosed').click(function() {
                $('table tbody tr').hide();
                $('table tbody tr:has(.bg-success)').show();
            });
            $('#buttonInprocess').click(function() {
                $('table tbody tr').hide();
                $('table tbody tr:has(.bg-warning)').show();
            });
        </script>

        <!--Container Main end-->

    <?php
    require 'footer1.php';
     ?>
