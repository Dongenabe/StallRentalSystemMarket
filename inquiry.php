
<div class="row justify-content-center" data-aos="zoom-in-up">
    <h1 class="discover-header">Begin Your Retail Journey!</h1>
</div>
<hr>
<div class="row justify-content-center">
    <div class="col-md-5">
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "norental") {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <small><strong><i class="fa-solid fa-circle-exclamation"></i></strong> Unfortunately, The Section is currently fully occupied. Please try another cluster or section.</small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            } elseif ($_GET['error'] == "none") {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <small><strong><i class="fa-solid fa-circle-check"></i></strong> Thank you for your inquiry! We have received your submission and will be in touch with you shortly.</small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        }
        ?>
    </div>
</div>
<div class="custom">
    <form action="availstall.php#inquire" method="post">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="lastname"><small>Last name:</small></label>
                <input type="text" name="ilname" class="form-control" id="lastname" placeholder="Last name..." required>
            </div>
            <div class="col-md-6">
                <label for="firstname"><small>First name:</small></label>
                <input type="text" name="ifname" class="form-control" id="firstname" placeholder="First name..." required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="gender"><small>Gender:</small></label>
                <select name="igender" class="custom-select" id="gender" required>
                    <option selected>Gender...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="contactno"><small>Contact no:</small></label>
                <input type="number" name="icontact" class="form-control" id="contactno" placeholder="Contact no..." min="0" pattern="[0-9]{11}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="address"><small>Address:</small></label>
                <textarea class="form-control" id="address" name="iadress" rows="3" required></textarea>
            </div>
        </div>

        <div class="row mb-3">
                <div class="col-md-6">
                    <label for="clustersection"><small>Cluster/Section:</small></label>
                    <select name="section_id" class="custom-select" id="section_id" required>
                        <option selected>Cluster/Section...</option>
                        <?php 
                        // Retrieve unique market_section_id values from rental_tbl
                        $uniqueSectionIds = [];
                        $marketLocations = $conn->query("SELECT DISTINCT section_id FROM rental_tbl");
                        if ($marketLocations->num_rows > 0) {
                            while ($row = $marketLocations->fetch_assoc()) {
                                $uniqueSectionIds[] = $row['section_id'];
                            }
                        }
                        
                        // Retrieve section_name for each unique market_section_id
                        foreach ($uniqueSectionIds as $sectionId) {
                            $section = $conn->query("SELECT section_name FROM market_section WHERE market_section_id = $sectionId");
                            if ($section->num_rows > 0) {
                                $sectionName = $section->fetch_assoc()['section_name'];
                                echo '<option value="' . $sectionId . '">' . $sectionName . '</option>';
                            }
                        }
                        
                        if (empty($uniqueSectionIds)) {
                            echo '<option selected="" value="" disabled="">No market locations available.</option>';
                        }
                        ?>
                    </select>
                </div>
            <div class="col-md-6">
                <label for="productname"><small>Desired Business name:</small></label>
                <input type="text" name="iprodname" class="form-control" id="productname" placeholder="Product name..." required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12 d-flex justify-content-center">
                <button type="submit" name="submit-inquiry" class="btn btn-primary btn-recommended">View Prescribed Stalls</button>
            </div>
        </div>
        <hr>
    </form>
</div>
