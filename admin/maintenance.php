<?php
session_start();
if (!isset($_SESSION['usernm']) || $_SESSION['ustype'] != 'Admin') {
                   header("Location:rental.php?action=noaccess");
    exit();
}

// Add the message here
$errorMessage = "Only administrators can access this page.";

$_SESSION['actib'] = 'rental';
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
            border-top: 2px solid #005c5c;
        }
    </style>

    <div class="bg-light-gray mb-5 p-3 rounded">
        
        <h3 class="fw-bold">Maintenance Stalls</h3><br>
        
        <?php
    require '../includes/dbh.inc.php';

            if(isset($_GET['action'])){
                echo '<center><small><div class="text-start alert alert-'.$_GET['action'].' alert-dismissible fade show" role="alert">
                    <strong>';
                    if($_GET['action'] == 'danger')
                        echo '<i class="fa-solid fa-trash"></i>&nbsp; '.$_GET['stallname'].', Stall no. '.$_GET['stallno'].' has been deleted !';
                    elseif($_GET['action'] == 'warning')
                        echo '<i class="fa-solid fa-user-pen"></i>&nbsp; Stall record has been updated !';
                    elseif($_GET['action'] == 'warningerror')
                        echo '<i class="fa-solid fa-user-pen"></i>&nbsp; Tenant has already Occupied a stall !';
                echo '</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div></small></center>';
            }
        ?>        
<?php
$sql = "SELECT rental_tbl.*, market_section.section_name
    FROM rental_tbl
    LEFT JOIN market_section ON rental_tbl.section_id = market_section.market_section_id
    WHERE status = 'Maintenance'
    ORDER BY section_name ASC;";


$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
?>
<div class="table-responsive p-3 bg-light-gray mb-3 bord border-4 shadow-sm rounded">
    <form action="" method="post">
        <div class="buttons" style="float:right;">
            <button type="button" class="btn btn-primary" id="buttonall">All Stalls</button>
            <button type="button" class="btn btn-primary" id="buttonoccupied">Occupied Stalls</button>
            <button type="button" class="btn btn-primary" id="buttonavailable">Avaialble Stalls</button>
        </div>
        <button formaction="add_rental.php" type="submit" class="btn btn-dark btn-sm"><i class="fa-solid fa-circle-plus"></i><small> Add Stall</small></button>&nbsp;
        <button type="submit" formaction="rental.php" class="btn btn-success btn-sm"><i class="fa-solid fa-store"></i><small>Stalls</small></button>
    </form>
    <hr>
    <table id="myDataTable" class="table table-hover table-bordered table-striped table-sm custom-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Renter name</th>
                <th>Section</th>
                <th>Stall no.</th>
                <th>Status</th>
                <th class="text-center">View</th>
                <th class="text-center">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nn = "____";
            $no = 0;
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td class="fw-bold">' . ++$no . '.</td>';
                    if (empty($row['tenant_lname']) && empty($row['tenant_fname'])) {
                        echo '<td class="fw-bold">' . $nn . '</td>';
                    } else {
                        echo '<td class="fw-bold">' . $row['tenant_lname'] . ', ' . $row['tenant_fname'] . '</td>';
                    }
                    echo '<td>' . $row['section_name'] . '</td>'; // Change 'stallname' to 'section_name'
                    echo '<td>' . $row['stallno'] . '</td>';
                    if ($row['status'] == 'Maintenance') {
                        echo '<td class="text-center"><p class="bg-success text-white"><small>' . $row['status'] . '</small></p></td>';
                    } elseif ($row['status'] == 'Occupied') {
                        echo '<td class="text-center"><p class="bg-warning text-white"><small>' . $row['status'] . '</small></p></td>';
                    }
                    echo '<td class="text-center"><a href="#" class="btn btn-primary btn-sm rounded view-button" data-stallid="' . $row['stall_id'] . '"><i class="fa-solid fa-eye"></i></a></td>';
                    echo '<td class="text-center"><a href="add_rental.php?editRental=' . $row['stall_id'] . '" class="btn btn-warning btn-sm rounded"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                    echo '</tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>
 </div>
<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Stall Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="viewModalBody">
                <!-- Dynamic content will be displayed here -->
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Handle button clicks
    $('#buttonall').click(function() {
        $('table tbody tr').show(); // Show all rows
    });

    $('#buttonavailable').click(function() {
        $('table tbody tr').hide();
        $('table tbody tr:has(.bg-success)').show();
    });

    $('#buttonoccupied').click(function() {
        $('table tbody tr').hide();
        $('table tbody tr:has(.bg-warning)').show();
    });

    // Handle 'View' button click
    $('.view-button').click(function(e) {
        e.preventDefault();
        var stallId = $(this).data('stallid');
        $.ajax({
            url: 'view_rental.php', // Replace with the URL to fetch stall details
            method: 'GET',
            data: { view: stallId },
            success: function(response) {
                $('#viewModalBody').html(response);
                $('#viewModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>
<?php
require 'footer1.php';
?>