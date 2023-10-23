<?php
    session_start();
    require 'headerr.php';
?>
    <div class="height-100 bg-light main-content">
    <div class="container bg-light p-4 rounded">
    <h3 class="fw-bold text-center"><i class="bi bi-envelope"></i> Send Message</h3><hr>
        <div class="row justify-content-center">
            <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == "emptyinput"){
                        echo '<div class="alert shadow alert-warning alert-dismissible fade show" role="alert">
                            <strong> <i class="bi bi-exclamation-square-fill"></i>&nbsp; Please fill out all fields.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
            ?>
        </div>

        <form action="includes/process.php" method="post" class="row g-1 sform mb-2 shadow" enctype="multipart/form-data">
            <div class="row g-3 justify-content-center">
                <div class="col-md-4">
                        <?php
                        if (isset($_GET['addSMS'])) {
                            $tenantid = $_GET['addSMS'];
                            $tenant_lname = $_GET['lname'];
                            $tenant_fname = $_GET['fname'];
                        }
                        ?>
                        <h4>Send Message to <?php echo $tenant_fname . ' , ' . $tenant_lname; ?></h4>
                </div>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-md-4">
                    <label for="contactNumber" class="form-label">Tenant Contact Number:</label>
                        <?php
                        if (isset($_GET['addSMS'])) {
                            $tenantid = $_GET['addSMS'];
                            $phoneno = $_GET['phoneno'];
                        }
                        ?>
                    <input type="text" name="contactNumber" class="form-control form-control-sm" id="contactNumber" placeholder="Tenant contact number..." required value="<?php echo $phoneno?>" readonly>
                </div>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-md-4">
                    <label for="message" class="form-label">Message:</label>
                    <textarea name="message" class="form-control form-control-sm" id="message" placeholder="Type your message here..." rows="4" required></textarea>
                </div>
            </div>
            <div class="row g-3 justify-content-center mb-4">
                <div class="col-md-6">
                    <center>
                        <a href="tenants.php" class="btn btn-danger btn-sm">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" name="send-sms" class="btn btn-primary btn-sm">Send SMS</button>
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