<?php
    session_start();
    $_SESSION['actib'] = 'request';
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
                border-top: 2px solid #c33a08;
            }
        </style>
<div class="bg-light-gray mb-5 p-3 rounded">
    <h3 class="fw-bold">Inquiry</h3><br>
    <?php
    if(isset($_GET['action'])){
        echo '<center><small><div class="text-start alert alert-'.$_GET['action'].' alert-dismissible fade show" role="alert">
            <strong>';
            if($_GET['action'] == 'danger')
                echo '<i class="fa-solid fa-trash"></i>&nbsp; Inquiry of Mr./Ms. '.$_GET['lastname'].' has been deleted !';
            elseif($_GET['action'] == 'warning')
                echo '<i class="fa-solid fa-user-pen"></i>&nbsp; Request record has been updated !';
        echo '</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div></small></center>';
    }
    ?>
    <?php
$sql = "SELECT rt.req_id,rt.req_date,rt.status,rt.lastname, rt.firstname,rt.gender,rt.contact,rt.address,rt.productname,rt.message,ms.section_name,
        u.lname AS user_lname, -- Add user's last name
        u.fname AS user_fname, -- Add user's first name
        u.usertype -- Add user's usertype
        FROM request_tbl AS rt
        LEFT JOIN rental_tbl AS r ON rt.section_id = r.section_id
        LEFT JOIN market_section AS ms ON r.section_id = ms.market_section_id
        LEFT JOIN users AS u ON rt.userid = u.userid -- Join the users table using userid
        GROUP BY rt.req_id
        ORDER BY rt.req_date DESC";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    ?>

    <form action="" method="post">
        <button type="submit" formaction="request.php" class="btn btn-success btn-sm"><i class="fa-solid fa-arrow-rotate-right"></i><small> Refresh</small></button>
    </form>
    <hr>
    <div class="table-responsive p-3 bg-light-gray mb-3 bord border-4 shadow-sm rounded">
        <table id="myDataTable" class="table custom-table table-hover table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Status</th>
                    <th>Request Date</th>
                    <th>Name</th>
                    <th>Section</th>
                    <th>Product Name</th>
                    <th>Message</th>
                    <th>Viewed by</th>
                    <th class="text-center">Message</th>
                    <th class="text-center">View</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td class="fw-bold">' . ++$no . '.</td>';
                        if ($row['status'] == 'unread') {
                            echo '<td class="text-center"><p class="bg-danger text-white rounded"><small>' . $row['status'] . '</small></p></td>';
                        } elseif ($row['status'] == 'read') {
                            echo '<td class="text-center"><p class="bg-warning text-white rounded"><small>' . $row['status'] . '</small></p></td>';
                        }
                        echo '<td>' . date('M d, Y', strtotime($row['req_date'])) . '</td>';
                        echo '<td>' . $row['firstname'] . ', ' . $row['lastname'] . '</td>';
                        echo '<td>' . $row['section_name'] . '</td>';
                        echo '<td>' . $row['productname'] . '</td>';
                        echo '<td>' . $row['message'] . '</td>';
                                echo '<td>' . $row['user_fname'] . ', ' . $row['user_lname'] . ' (' . '<strong>' . $row['usertype'] . '</strong>' . ')</td>';
                        echo '<td class="text-center"><a href="msginq.php?reqSMS=' . $row['req_id'] . '" class="btn btn-success btn-sm rounded"><i class="fas fa-envelope"></i></a></td>';
                        echo '<td class="text-center"><a href="request.php?view=' . $row['req_id'] . '&userid=' . $_SESSION['usrId'] . '" class="btn btn-primary btn-sm rounded"><i class="fa-solid fa-eye"></i></a></td>';
                        echo '<td class="text-center"><a href="../includes/process.php?deleterequest=' . $row['req_id'] . '&deleteinqname=' . $row['lastname'] . '" class="btn btn-danger btn-sm rounded"><i class="fa-solid fa-trash"></i></a></td>';
                        echo '</tr>';
                    }
                }
                ?>
                <input type="hidden" name="userid" value="<?php echo $_SESSION['usrId']; ?>">
                </tbody>
            </table>
        </div>
    <?php
if (isset($_GET['view'])) {
    $iddd = $_GET['view'];
    $userid = $_GET['userid']; // Retrieve the userid from the URL

    // Get the request date for the current request
    $sql = "SELECT req_date FROM request_tbl WHERE req_id=$iddd;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $req_date = $row['req_date'];

    // Update the status and userid of the request
    $query = "UPDATE request_tbl SET status = 'read', userid = $userid WHERE req_date = '$req_date' AND req_id = $iddd;";
    $resquery = mysqli_query($conn, $query);

        if ($resquery) {
            $sql = "SELECT rt.req_id, rt.req_date, rt.status, rt.lastname, rt.firstname, rt.gender, rt.contact, rt.address, rt.productname, rt.message, ms.section_name
                    FROM request_tbl AS rt
                    LEFT JOIN rental_tbl AS r ON rt.section_id = r.section_id
                    LEFT JOIN market_section AS ms ON r.section_id = ms.market_section_id
                    WHERE req_id='$iddd'
                    GROUP BY rt.req_id
                    ORDER BY rt.req_date DESC;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $a = $row['req_date'];
                    $b = $row['lastname'];
                    $c = $row['firstname'];
                    $d = $row['gender'];
                    $e = $row['address'];
                    $f = $row['contact'];
                    $g = $row['productname'];
                    $h = $row['section_name'];
                    $i = $row['message'];
                }
                echo '<script>
                        let str = `<div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><b>Request Date:</b></label>
                                        <input type="text" class="form-control" value="' . $a . '" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><b>Last Name:</b></label>
                                        <input type="text" class="form-control" value="' . $b . '" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><b>First Name:</b></label>
                                        <input type="text" class="form-control" value="' . $c . '" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><b>Gender:</b></label>
                                        <input type="text" class="form-control" value="' . $d . '" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><b>Address:</b></label>
                                        <input type="text" class="form-control" value="' . $e . '" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><b>Contact:</b></label>
                                        <input type="text" class="form-control" value="' . $f . '" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><b>Business Name:</b></label>
                                        <input type="text" class="form-control" value="' . $g . '" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><b>Cluster/Section:</b></label>
                                        <input type="text" class="form-control" value="' . $h . '" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"><b>Message:</b></label>
                                        <textarea readonly class="form-control">' . $i . '</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        Alert.render(str)
                    </script>';
            }
        }
    }
    ?>
</div>
    </div>
    <!--Container Main end-->

<?php
    require 'footer1.php';
?>