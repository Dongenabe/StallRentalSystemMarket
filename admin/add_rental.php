<?php
    session_start();
    if (!isset($_SESSION['usernm']) || $_SESSION['ustype'] != 'Admin') {
        header('Location: rental.php');
        exit();
    }
    $_SESSION['actib'] = 'rental';
    require 'headerr.php';
?>
    <div class="height-100 bg-light main-content">
        <div class="container bg-light p-4 rounded">
        <?php
            if(isset($_GET['editRental'])){
                echo '<h3 class="text-center">Edit Stall</h3>';
            }else{
                echo '<h3 class="text-center"> Add Stall</h3>';
            }?><hr>
        <div class="row justify-content-center">
            <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == "emptyinput"){
                        echo '<div class="alert shadow alert-warning alert-dismissible fade show" role="alert">
                            <strong> <i class="bi bi-exclamation-square-fill"></i>&nbsp; Please fill out all fields.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }elseif($_GET['error'] == "alreadyexists"){
                        echo '<div class="alert shadow alert-danger alert-dismissible fade show" role="alert">
                            <strong> <i class="bi bi-check-circle-fill"></i> Stall number already exists</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }elseif($_GET['error'] == "alreadyoccupied"){
                        echo '<div class="alert shadow alert-danger alert-dismissible fade show" role="alert">
                            <strong> <i class="bi bi-check-circle-fill"></i> Tenant is already occupying a stall</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    
                    }elseif($_GET['error'] == "none"){
                        echo '<div class="alert shadow alert-success alert-dismissible fade show" role="alert">
                            <strong> <i class="bi bi-check-circle-fill"></i> New stall has been added!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';

                    }
                }
                
            ?>
        </div>
            <form action="../includes/process.php" method="post" class="row g-1 sform mb-2 shadow" enctype="multipart/form-data">
                <div class="row g-3 ">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Stall/Section:</label>
                            <select class="form-select form-select-sm" name="section_id" aria-label="Default select example" <?php if (isset($_GET['editRental'])) echo 'disabled'; ?>>
                                <option selected disabled>Market location...</option>
                                <?php 
                                $market = $conn->query("SELECT * FROM market_section order by section_name asc");
                                if ($market->num_rows > 0) {
                                    while ($row = $market->fetch_assoc()) {
                                        $selected = ($row['market_section_id'] == $section_id) ? 'selected' : '';
                                        echo '<option value="' . $row['market_section_id'] . '" ' . $selected . '>' . $row['section_name'] . '</option>';
                                    }
                                } else {
                                    echo '<option selected="" value="" disabled="">Please check the category list.</option>';
                                }
                                ?>
                            </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Stall no.:</label>    
                        <input type="number" name="stallnum" class="form-control form-control-sm" min="1" placeholder="Stall no..." value="<?php echo $stall;?>" <?php if (isset($_GET['editRental'])) echo 'disabled'; ?> >
                    </div>
                <div class="row g-3 justify-content-center">
                    <div class="col-md-6">
                        <label for="" class="form-label">Monthly fee:</label>    
                        <input type="number" name="monthly_fee" class="form-control form-control-sm" min="10" placeholder="Market fee..." value="<?php echo $monthly_fee;?>"required >
                    </div>
                    <div class="col-md-6">
                        <label for="stallSize" class="form-label">Stall Size:</label> 
                        <input type="text" name="stall_size" class="form-control form-control-sm" min="10" placeholder="Market fee..." value="<?php echo $size;?>"required >
                    </div>
                    <div class="row g-3 justify-content-center">
                        <div class="col-md-9">
                            <label for="" class="form-label">Description:</label>
                            <textarea class="form-control" id="description" name="stall_description" rows="3" placeholder="Description of stalls" required><?php echo $description;?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Status:</label>
                        <select class="form-select form-select-sm" name="status" aria-label="Default select example"required <?php if (isset($_GET['editRental'])) echo 'disabled'; ?>>
                            <option value="Maintenance" <?php if ($status == 'Maintenance') { echo 'selected'; } ?>>Maintenance</option>
                            <option value="Available" <?php if ($status == 'Available') { echo 'selected'; } ?>>Available</option>
                            <option value="Occupied" <?php if ($status == 'Occupied') { echo 'selected'; } ?>>Occupied</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputImage" class="form-label">Image:</label>
                        <input type="file" class="form-control form-control-sm" name="image" id="inputImage" accept="image/jpeg" >
                    </div>
                </div>
                <input type="hidden" name="current_image" value="<?php echo $image; ?>">
                <input type="hidden" name="stall_id" value="<?php echo $stall_id?>">
                <div class="row g-3 justify-content-center mb-4">
                    <div class="col-md-6">
                        <center>
                            <?php
                                if(isset($_GET['editRental'])){
                                    echo '<a href="rental.php" class="btn btn-danger btn-sm">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" name="rental-update" formaction="../includes/process.php" class="btn btn-primary btn-sm">Update</button>';
                                }else{
                                    echo '<a href="rental.php" class="btn btn-danger btn-sm">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" name="rental-submit" class="btn btn-primary btn-sm">Save</button>';
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