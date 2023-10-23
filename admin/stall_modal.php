
<div class="modal fade" id="stall_modal1" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      // SQL query to retrieve information about a specific stall (stall_id = 1) and its associated tenant and rental details.
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 1 ORDER BY r.rent_status DESC LIMIT 1 ";

      $result = $conn->query($sql); // Execute the SQL query and store the result.

      if ($result->num_rows > 0) {
          // If there are results in the query:

          $row = $result->fetch_assoc(); // Fetch a row from the result.

          // Extract and format relevant data from the result row.
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None';
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00';
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image'];

          // Output modal header with stall section and number.
          ?>
          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <!-- Output modal body with stall and tenant details. -->
          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p>
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>

            <!-- If the stall is occupied (rent_status = 1), display the stall image. -->
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <!-- If not occupied, display a message indicating no image is available. -->
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>

<!-- -->
<div class="modal fade" id="stall_modal2" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 2 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal3" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 3 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal4" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 4 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal5" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 5 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal6" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 6 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>

<!-- -->
<div class="modal fade" id="stall_modal7" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 7 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal8" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 8 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal9" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 9 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>

<!-- -->
<div class="modal fade" id="stall_modal10" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 10 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal11" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 11 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal12" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 12 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal13" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 13 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal14" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 14 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal15" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 15 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal16" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 16 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal17" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 17 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal18" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 18 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal19" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 19 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal20" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 20 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal21" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 21 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal22" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 22 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal23" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 23 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal24" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 24 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal25" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 25 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal26" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 26 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal27" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 27 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal28" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 28 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal29" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 29 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal30" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 30 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal31" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 31 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal32" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 32 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal33" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 33 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal34" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 34 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal35" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 35 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal36" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 36 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal37" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 37 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal38" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 38 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal39" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 39 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal40" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 40 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal41" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 41 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal42" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 42 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal43" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 43 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal44" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 44 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal45" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 45 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal46" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 46 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal47" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 47 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal48" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 48 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal49" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 49 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal50" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 50 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal51" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 51 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal52" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 52 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal53" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 53 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal54" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 54 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal55" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 55 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal56" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 56 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal57" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 57 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal58" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 58 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal59" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 59 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal60" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 60 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal61" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 61 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal62" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 62 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal63" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 63 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal64" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 64 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal65" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 65 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal66" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 66 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal67" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 67 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal68" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 68 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal69" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 69 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal70" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 70 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal71" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 71 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal72" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 72 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal73" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 73 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal74" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 74 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal75" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 75 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal76" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 76 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal77" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 77 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal78" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 78 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal79" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 79 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal80" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 80 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal81" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 81 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal82" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 82 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal83" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 83 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal84" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 84 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal85" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 85 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal86" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 86 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal87" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 87 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal88" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 88 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal89" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 89 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal90" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 90 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal91" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 91 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal92" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 92 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal93" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 93 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal94" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 94 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal95" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 95 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal96" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 96 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal97" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 97 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal98" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 98 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal99" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 99 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal100" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 100 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal101" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 101 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal102" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 102 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal103" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 103 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal104" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 104 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal105" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 105 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal106" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 106 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal107" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 107 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal108" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 108 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal109" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 109 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal110" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 110 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal111" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 111 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal112" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 112 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal113" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 113 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal114" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 114 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal115" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 115 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal116" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 116 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal117" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 117 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal118" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 118 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal119" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 119 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal120" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 120 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal121" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 121 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal122" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 122 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal123" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 123 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal124" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 124 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal125" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 125 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal126" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 126 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal127" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 127 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal128" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 128 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal129" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 129 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal130" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 130 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal131" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 131 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal132" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 132 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal133" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 133 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal134" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 134 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal135" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 135 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal136" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 136 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal137" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 137 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal138" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 138 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal139" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 139 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal140" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 140 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal141" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 141 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal142" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 142 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal143" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 143 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal144" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 144 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal145" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 145 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal146" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 146 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal147" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 147 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal148" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 148 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal149" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 149 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal150" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 150 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal151" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 151 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal152" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 152 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal153" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 153 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal154" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 154 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal155" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 155 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal156" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 156 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal157" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 157 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal158" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 158 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal159" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 159 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal160" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 160 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal161" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 161 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal162" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 162 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal163" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 163 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal164" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 164 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal165" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 165 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal166" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 166 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal167" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 167 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal168" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 168 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal169" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 169 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal170" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 170 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal171" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 171 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal172" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 172 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal173" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 173 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal174" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 174 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal175" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 175 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal176" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 176 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal177" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 177 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal178" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 178 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal179" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 179 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal180" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 180 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal181" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 181 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal182" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 182 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal183" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 183 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal184" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 184 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal185" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 185 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal186" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 186 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal187" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 187 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal188" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 188 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal189" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 189 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal190" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 190 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal191" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 191 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal192" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 192 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal193" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 193 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal194" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 194 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal195" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 195 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal196" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 196 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal197" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 197 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal198" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 198 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal199" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 199 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal200" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 200 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal201" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 201 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal202" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 202 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal203" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 203 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal204" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 204 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal205" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 205 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal206" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 206 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal207" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 207 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal208" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 208 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal209" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 209 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal210" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 210 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal211" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 211 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal212" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 212 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal213" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 213 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal214" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 214 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal215" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 215 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal216" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 216 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal217" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 217 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal218" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 218 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal219" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 219 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal220" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 220 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal221" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 221 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal222" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 222 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal223" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 223 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal224" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 224 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal225" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 225 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal226" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 226 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal227" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 227 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal228" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 228 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal229" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 229 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal230" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 230 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal231" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 231 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal232" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 232 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal233" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 233 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal234" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 234 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal235" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 235 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal236" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 236 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal237" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 237 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal238" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 238 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal239" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 239 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal240" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 240 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal241" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 241 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal242" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 242 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<<div class="modal fade" id="stall_modal243" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 243 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal244" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 244 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal245" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 245 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal246" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 246 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal247" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 247 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal248" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 248 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal249" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 249 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal250" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 250 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal251" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 251 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal252" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 252 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal253" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 253 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal254" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 254 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal255" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 255 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal256" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 256 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal257" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 257 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal258" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 258 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal259" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 259 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal260" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 260 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal261" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 261 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal262" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 262 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- -->
<div class="modal fade" id="stall_modal263" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <?php
      $sql = "SELECT s.stallno, r.rent_status, t.tenant_lname, t.tenant_fname, t.tenant_midname, s.description, s.section_id, ms.section_name, s.monthly_fee, s.size, t.business_name, s.image
              FROM rental_tbl s 
              LEFT JOIN tenants t 
              ON t.stall_id = s.stall_id
              LEFT JOIN rent r
              ON r.tenant_id = t.tenantid 
              LEFT JOIN market_section ms
              ON ms.market_section_id = s.section_id
              WHERE s.stall_id = 263 ORDER BY r.rent_status DESC LIMIT 1 ";
              
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $stallno = $row['stallno'];
          $rent_status = ($row['rent_status'] == 1) ? 'Occupied' : 'Not Occupied';
          $tenant_fullname = ($row['rent_status'] == 1) ? $row['tenant_lname'] . ' ' . $row['tenant_fname'] . ' ' . $row['tenant_midname'] : 'None';
          $description = $row['description'];
          $business_name = ($row['business_name']) ? $row['business_name'] : 'None'; // Updated to set 'None' if business_name is empty
          $monthly_fee = ($row['monthly_fee'] != null) ? '₱' . number_format($row['monthly_fee'], 2) : '₱0.00'; // Add peso sign, comma separators, and format to two decimal places
          $stall_size = $row['size'];
          $image = "../img/stalls/" . $row['image']; // Update the image URL to include the "img/stalls" directory
          ?>

          <div class="modal-header">
            <h5 class="modal-title" id="" style="font-size: 24px;"><?php echo $row['section_name'] . ' - ' . $stallno; ?></h5>
          </div>

          <div class="modal-body" style="font-size: 18px;">
            <p><strong>Status:</strong> <?php echo $rent_status; ?></p>
            <p><strong>Tenant:</strong> <?php echo $tenant_fullname; ?></p>
            <p><strong>Business name:</strong> <?php echo $business_name; ?></p> <!-- Changed to Business name -->
            <p><strong>Description of stall:</strong> <?php echo $description; ?></p>
            <p><strong>Monthly fee:</strong> <?php echo $monthly_fee; ?></p>
            <?php if ($row['rent_status'] == 1) { ?>
              <p><strong>Stall image:</strong> <img src="<?php echo $image; ?>" alt="Stall Image" style="max-width: 100%; max-height: 400px;"></p>
            <?php } else { ?>
              <p>No image available</p>
            <?php } ?>
          </div>
      <?php } ?>
    </div>
  </div>
</div>