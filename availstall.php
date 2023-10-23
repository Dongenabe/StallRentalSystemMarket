<?php
require 'indexHeader.php';
require 'includes/dbh.inc.php';

$ilname = "";
$ifname = "";
$igender = "";
$icontact = "";
$iadress = "";
$istallname = "";
$iprodname = "";
$iconcern = "";
$status = "unread";

if (isset($_POST['submit-inquiry'])) {
    $ilname = $_POST['ilname'];
    $ifname = $_POST['ifname'];
    $igender = $_POST['igender'];
    $icontact = $_POST['icontact'];
    $iadress = $_POST['iadress'];
    $istallname = $_POST['section_id']; // Use the correct name here for the Cluster/Section
    $iprodname = $_POST['iprodname'];
    $iconcern = $_POST['iconcern'];

    // Check the availability of the selected Cluster/Section and Market Location
    $sql = "SELECT rental_tbl.*, market_section.section_name
            FROM rental_tbl
            INNER JOIN market_section ON rental_tbl.section_id = market_section.market_section_id
            WHERE rental_tbl.section_id = '$istallname' AND rental_tbl.status = 'Available'
            ORDER BY rental_tbl.stallno ASC;";
    $result = mysqli_query($conn, $sql);
    $resCheck = mysqli_num_rows($result);

    if ($resCheck == 0) {
        header("Location: index.php?error=norental&cluster=" . $iclustername . "#inquire");
        exit();
    }
}
?>
<!-- Add the custom modal HTML and CSS here -->
<div id="customModal" class="custom-modal">
    <div class="modal-content">
        <span class="close" onclick="closeCustomModal()">&times;</span>
        <img id="customModalImage" src="" alt="Custom Modal Image">
    </div>
</div>

<style>
    /* Style for the custom modal */
    .custom-modal {
        display: none;
        position: fixed;
        z-index: 2; /* Use a higher z-index to ensure it's above other elements */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
        position: relative;
        margin: 10% auto;
        max-width: 70%;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    /* Style for the close button */
    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        cursor: pointer;
    }
</style>
<main>
    <section class="home">
        <div class="row justify-content-center">
            <!-- Recommended Stalls Section -->
            <div class="col-md-6 p-2 bg-light border rounded">
                <div class="card-body" data-aos="zoom-in">
                    <h2 class="text-center" style="color: #4CAF50; font-weight: bold; font-size: 24px; border: 2px solid #4CAF50; border-radius: 10px;">
                        <i class="fas fa-store"></i> Recommended Stalls Just for You!
                    </h2>
                    <hr>
                    <?php
                        // Fetch the image URL from the market_section table
                        $sqlImage = "SELECT img_url FROM market_section WHERE market_section_id = '$istallname'";
                        $resultImage = mysqli_query($conn, $sqlImage);

                        if ($rowImage = mysqli_fetch_assoc($resultImage)) {
                            $imgUrl = $rowImage['img_url'];

                            // Add the link to open the custom modal with the image
                            echo '<a href="javascript:void(0);" onclick="openCustomModal(\'' . $imgUrl . '\')">';
                            echo '<img src="img/maps/section_img/' . $imgUrl . '" alt="Section Image" style="max-width: 100%;">';
                            echo '</a>';
                        } else {
                            echo 'Image not found';
                        }
                    ?>
                        <div class="table-responsive p-3 bg-light mb-3 bord border-4 shadow-sm rounded">
                        <table id="myDataTable" class="table table-striped table-hover">
                    <h5 class="card-title" style="color: black;">Business name: <?php echo $iprodname; ?></h5>
                            <thead>
                                <tr>
                                    <th>Cluster/Section</th>
                                    <th>Stall no.</th>
                                    <th>Status</th>
                                    <th>View Image</th> <!-- New column header for View Image -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['section_name'] . '</td>';
                                        echo '<td>' . $row['stallno'] . '</td>';
                                        echo '<td><span class="badge badge-success">' . $row['status'] . '</span></td>';
                                        // Add View Image button/link
                                        echo '<td class="text-center"><button class="btn btn-primary btn-sm rounded" onclick="showStallDetails(\''
                                          . $row['section_name'] . '\', \'' . $row['stallno'] . '\', \'' . $row['monthly_fee'] . '\', \''
                                          . $row['size'] . '\', \'' . $row['description'] . '\', \'img/stalls/' . $row['image'] . '\')"><i class="fas fa-eye"></i></button></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="4" class="text-center">No available stalls in this section.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Inquiry Form Section -->
                    <div class="col-md-4 p-1">
                        <div class="bg-light p-2 border rounded">
                            <hr>
                            <form action="" method="post">

                            <input type="hidden" name="selected_rentalids" id="selected_rentalids" value="">
                            <input type="hidden" name="selected_stallnos" id="selected_stallnos" value="">
                            <input type="hidden" name="ilname" class="form-control" id="" placeholder="Last name..." value="<?php echo $ilname;?>">
                            <input type="hidden" name="ifname" class="form-control" id="" placeholder="First name..." value="<?php echo $ifname;?>">
                            <input type="hidden" name="igender" class="form-control" id="" placeholder="Gender..." value="<?php echo $igender;?>">
                            <input type="hidden" name="icontact" class="form-control" id="" placeholder="Contact no..." pattern="[0-9]{11}" value="<?php echo $icontact;?>">
                            <input type="hidden" name="iadress" class="form-control" id="" value="<?php echo $iadress;?>">
                            <input type="hidden" name="istallname" class="form-control" id="" placeholder="stall/Section..." value="<?php echo $istallname;?>">
                            <input type="hidden" name="iprodname" class="form-control" id="" placeholder="Product name..." value="<?php echo $iprodname;?>">
                                <label for="exampleFormControlTextarea1"><h4>Interesed in one of the units?</h4></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="iconcern" rows="3"></textarea>
                                <div class="row justify-content-center">
                                    <div class="col-4 mt-2 p-2">
                                        <center>
                                            <button type="submit" name="submit-inq" class="btn btn-primary btinquire">Submit Inquiry</button>
                                        </center>
                                    </div>
                                </div>
                                <hr>
                            </form>
                        </div>
                    <div class="bg-secondary p-3 rounded">
                        <div class="row justify-content-center" data-aos="fade-down">
                            <h5 class="text-center text-white">Contact</h5>
                        </div>
                        <div class="row justify-content-center" data-aos="zoom-in">
                            <img class="log" src="img/MCPMS.png" alt="">
                        </div><br>
                        <div class="row justify-content-center" data-aos="fade-up">
                            <h6 class="text-center text-white">test</h6><br>
                        </div>
                        <div class="row justify-content-center" data-aos="fade-up">
                            <p class="text-center"><small>test</small></p>
                        </div>
                        <div class="row justify-content-center" data-aos="fade-up">
                            <p class="text-center"><strong><i class="fa-solid fa-phone"></i>test</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Modal -->
<div class="modal fade" id="stallDetailsModal" tabindex="-1" role="dialog" aria-labelledby="stallDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stallDetailsModalLabel">Stall Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="stallImage" src="" alt="Stall Image" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h5>Section Name: <span id="sectionName"></span></h5>
                        <h5>Stall Number: <span id="stallNumber"></span></h5>
                        <h5>Monthly Fee: <span id="monthly_fee"></span></h5>
                        <h5>Size: <span id="size"></span></h5>
                        <h5>Description: <span id="description"></span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <style>
        .home{
            color:black;
        }
        .home img{
            width: 60vmin;
            height: 30vmin;
        }
        .home .log{
            width: 13vmin;
            height: 10vmin;
        }
        .bord{
            border-top: 2px solid red;
        }
    </style>
<script>
    function showStallDetails(sectionName, stallNumber, monthly_fee, size, description, imageUrl) {
        // Set modal content with stall details
        document.getElementById('sectionName').textContent = sectionName;
        document.getElementById('stallNumber').textContent = stallNumber;
        document.getElementById('monthly_fee').textContent = monthly_fee;
        document.getElementById('size').textContent = size;
        document.getElementById('description').textContent = description;
        document.getElementById('stallImage').src = imageUrl;

        // Show the modal
        $('#stallDetailsModal').modal('show');
    }
</script>
<script>
    // Function to open the custom modal with the clicked image
    function openCustomModal(imgUrl) {
        var customModal = document.getElementById("customModal");
        var customModalImage = document.getElementById("customModalImage");

        customModalImage.src = "img/maps/section_img/" + imgUrl;
        customModal.style.display = "block";
    }

    // Function to close the custom modal
    function closeCustomModal() {
        var customModal = document.getElementById("customModal");
        customModal.style.display = "none";
    }
</script>
<?php
if (isset($_POST['submit-inq'])) {
    $ilname = $_POST['ilname'];
    $ifname = $_POST['ifname'];
    $igender = $_POST['igender'];
    $icontact = $_POST['icontact'];
    $iadress = $_POST['iadress'];
    $istallname = $_POST['istallname'];
    $iprodname = strtoupper($_POST['iprodname']);
    $iconcern = $_POST['iconcern'];
    $status = "unread";
    $selected_stallnos = explode(',', $_POST['selected_stallnos']);
    $selected_rentalids = explode(',', $_POST['selected_rentalids']);

    for ($i = 0; $i < count($selected_stallnos); $i++) {
        $stallno = $selected_stallnos[$i];
        $rentalid = $selected_rentalids[$i];

        $sql = "INSERT INTO request_tbl (status, lastname, firstname, gender, contact, address, section_id, productname, message)
            VALUES ('$status', '$ilname', '$ifname', '$igender', '$icontact', '$iadress', '$istallname','$iprodname', '$iconcern');";
        $result = mysqli_query($conn, $sql);
    }

    if ($result) {
        echo '<script>window.location.href="index.php?error=none#inquire";</script>';
    }
}

require 'indexFooter.php';
?>