<?php
    session_start();
    require 'headerr.php';

?>
<div class="height-100 bg-light main-content">
    <div class="container bg-light p-4 rounded">
        <h3 class="fw-bold text-center">
            <i class="bi bi-credit-card-fill"></i> <?php if(isset($_GET['editPayment'])){echo 'Edit Payment';}else{echo 'Add Payment';}?>
        </h3>
        <hr>

        <div class="row justify-content-center">
            <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "emptyinput"){
                    echo '<div class="alert shadow alert-warning alert-dismissible fade show" role="alert">
                        <strong><i class="bi bi-exclamation-square-fill"></i>&nbsp; Please fill out all fields.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } elseif($_GET['error'] == "occupiedstall"){
                    echo '<div class="alert shadow alert-warning alert-dismissible fade show" role="alert">
                        <strong><i class="bi bi-exclamation-square-fill"></i>&nbsp; Stall number you\'ve entered is already occupied.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } elseif($_GET['error'] == "ornumlength"){
                    echo '<div class="alert shadow alert-warning alert-dismissible fade show" role="alert">
                        <strong><i class="bi bi-exclamation-square-fill"></i>&nbsp; O.R. number must contain 7 digits.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } elseif($_GET['error'] == "none"){
                    echo '<div class="alert shadow alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="bi bi-check-circle-fill"></i> Payment has been added!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
            ?>
        </div>
        <form action="../includes/process.php" method="post" class="row g-1 sform mb-2 shadow" enctype="multipart/form-data">
            <div class="row g-3 justify-content-center">
                <div class="col-md-4">
                    <label for="pdate" class="form-label">Payment Date:</label>
                    <input type="date" name="pdate" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>" required <?php echo isset($_GET['editPayment']) ? 'disabled' : ''; ?>>
                </div>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-md-4">
                    <label for="month_range" class="form-label">Payment Period for the month of:</label>
                    <input type="date" name="month_first" class="form-control form-control-sm" value="<?php echo $month_first; ?>" required <?php echo isset($_GET['editPayment']) ? 'disabled' : ''; ?>>
                    <label for="month_range" class="form-label">To:</label>
                    <input type="date" name="month_second" class="form-control form-control-sm" value="<?php echo $month_second; ?>"  required <?php echo isset($_GET['editPayment']) ? 'disabled' : ''; ?>>
                </div>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-md-4">
                    <label for="tenantid" class="form-label">Select Tenant:</label>
                        <select name="tenantid" id="tenant_id" class="form-control form-control-sm" value="<?php echo $tenantid; ?>" disabled required <?php echo isset($_GET['editPayment']) ? 'disabled' : ''; ?>>
                        <?php
                        if (isset($_GET['addPay'])) {
                            $tenantid = $_GET['addPay'];
                            $tenant_lname = $_GET['lname'];
                            $tenant_fname = $_GET['fname'];
                        }
                        ?>
                        <option selected disabled>Select Tenant...</option>
                        <?php 
                        $sql = "SELECT t.tenantid, t.tenant_lname, t.tenant_fname
                                FROM tenants t
                                ORDER BY t.tenant_lname ASC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $selected = ($row['tenantid'] == $tenantid) ? 'selected' : '';
                                echo '<option value="' . $row['tenantid'] . '" ' . $selected . '>' . $row['tenant_lname'] . ', ' . $row['tenant_fname'] . '</option>';
                            }
                        } else {
                            echo '<option selected="" value="" disabled="">No currently renting tenants found.</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- Display Monthly Fee -->
            <div class="row g-3 justify-content-center">
                <div class="col-md-4">
                        <?php
                        if (isset($_GET['addPay'])) {
                            $monthly_fee = $_GET['monthly_fee'];
                        }
                        ?>
                    <label for="monthly_fee" class="form-label">Monthly Fee:</label>
                    <input type="text" name="monthly_fee" class="form-control form-control-sm" readonly value="<?php echo $monthly_fee; ?>">
                </div>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-md-4">
                    <label for="ornumber" class="form-label">O.R. number:</label>
                    <input type="number" name="ornumber" class="form-control form-control-sm" min="10" placeholder="O.R. number..." required value="<?php echo $ornumber; ?>">
                </div>
            </div>

            <div class="row g-3 justify-content-center">
                <div class="col-md-4">
                    <label for="amount" class="form-label">Total Amount:</label>
                    <input type="number" name="amount" class="form-control form-control-sm" min="10" placeholder="Payment Amount..." required value="<?php echo $amount; ?>">
                </div>
            </div>

            <!-- Hidden field to send paymentid for editing -->
            <input type="hidden" name="tenantid" value="<?php echo $tenantid;?>">
            <input type="hidden" name="paymentid" value="<?php echo $paymentid; ?>">
            <input type="hidden" name="userid" value="<?php echo $_SESSION['usrId']; ?>">
            <div class="row g-3 justify-content-center">
                <div class="col-md-6">
                    <center>
                        <?php
                        if (isset($_GET['editPayment'])) {
                            echo '<a href="payments.php" class="btn btn-danger btn-sm">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="submit" name="payment-update" class="btn btn-primary btn-sm">Update</button>';
                        } else {
                            echo '<a href="tenants.php" class="btn btn-danger btn-sm">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="submit" name="payment-submit" class="btn btn-primary btn-sm">Save</button>';
                        }
                        ?>
                    </center>
                </div>
            </div>
        </form><hr>
    </div>
</div>


    <!--Container Main end-->
<?php
    require 'footer1.php';
?>

