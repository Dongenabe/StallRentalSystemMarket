<?php
// Start a PHP session to manage user authentication
session_start();

// Check if the user is not logged in or is not an 'Admin'; redirect if not
if (!isset($_SESSION['usernm']) || $_SESSION['ustype'] != 'Admin') {
    header("Location:tenants.php?action=noaccess");
    exit(); // Terminate script execution
}

// Set a session variable 'actib' to 'ctrt'
$_SESSION['actib'] = 'ctrt';

// Include a header file
require 'headerr.php';

// Construct a SQL query to retrieve contract details for active tenants
$sql = "SELECT tenants.*, 
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
        WHERE tenant_status.tenant_status = 1 AND contracts.contract_status = 1";

// Execute the SQL query and get the result
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
?>

<!-- HTML content begins here -->

<div class="height-100 bg-light-gray main-content">
    <style>
        .bord {
            border-top: 2px solid #005c5c;
        }
    </style>

    <div class="bg-light-gray mb-5 p-3 rounded">
        <h3 class="fw-bold">Contract Details</h3><br>

        <?php
        // Check if there are results in the database query
        if ($resultCheck > 0) {
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
                        <th>Stall no.</th>
                        <th>Monthly Fee</th>
                        <th>Beginning of Contract</th>
                        <th>End of Contract</th>
                        <th>Contract Status</th>
                        <th>Renew</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Loop through the database results and display contract details
                    $no = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $no++;
                        $tenantName = $row['tenant_lname'] . ', ' . $row['tenant_fname'];
                        $section = $row['section_name'];
                        $stallNo = $row['stallno'];
                        $monthly_fee = $row['monthly_fee'];
                        $beginningOfContract = date("F j, Y", strtotime($row['start_date']));
                        $endOfContract = date("F j, Y", strtotime($row['end_date']));
                        $contractStatus = (strtotime($row['end_date']) >= strtotime('today')) ? '<small><span class="bg-success text-white rounded"> &nbsp; Active&nbsp; </span></small>' : '<small><span class="bg-warning text-white rounded"> &nbsp; Inactive&nbsp; </span></small>';

                        // Display contract details in a table row
                        echo '<tr>';
                        echo '<td>' . $no . '</td>';
                        echo '<td>' . $tenantName . '</td>';
                        echo '<td>' . $section . '</td>';
                        echo '<td>' . $stallNo . '</td>';
                        echo '<td>₱ ' . number_format($monthly_fee) . '</td>';
                        echo '<td>' . $beginningOfContract . '</td>';
                        echo '<td>' . $endOfContract . '</td>';
                        echo '<td>' . $contractStatus . '</td>';

                        // Add a button to renew the contract
                        echo '<td class="text-center">
                            <a href="javascript:void(0);" onclick="showRenewConfirmation(' . $row['tenantid'] . ')" class="btn btn-danger btn-sm rounded"><i class="fa-solid fa-refresh"></i></a>
                          </td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo '<p>No contract details available for rentals with tenants and "Active" contracts.</p>';
        }
        ?>
    </div>
</div>

<!-- Renew Confirmation Modal -->
<div class="modal fade" id="renewConfirmationModal" tabindex="-1" aria-labelledby="renewConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="renewConfirmationModalLabel">Renew Contract</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Set the new renewal date:</p>
        <div class="form-group">
          <label for "renewDate">Renewal Date</label>
          <input type="date" class="form-control" id="renewDate">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="renewConfirmButton">Renew</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript function to show the Renew Confirmation Modal and handle renewal -->
<script>
function showRenewConfirmation(tenantId) {
  // Show the Renew Confirmation Modal
  $('#renewConfirmationModal').modal('show');

  // Add a click event listener to the "Renew" button in the modal
  $('#renewConfirmButton').on('click', function () {
    // Get the selected renewal date from the input field
    var newRenewalDate = $('#renewDate').val();

    // Construct the URL with the tenantId and newRenewalDate and redirect
    var redirectURL = '../includes/process.php?renewDate=' + newRenewalDate + '&tenantId=' + tenantId;
    window.location.href = redirectURL;

    // After processing, you can close the modal
    $('#renewConfirmationModal').modal('hide');
  });
}
</script>

<?php
// Include a footer file
require 'footer1.php';
?>
