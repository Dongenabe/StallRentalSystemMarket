<?php
session_start();
require 'mapheader.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contract Details</title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> BLOCK 5 - 8</h1>
                </div>
            </div>
        <div class="image-container">
            <img src="../img/maps/B5-B8.png" id="ImageMap1" usemap="#ground">
        </div>
            <map id="ground" name="ground">
                    <?php
                    // Code for stall_id 223
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 223 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="344,244,382,289" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal223" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 224
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 224 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="383,244,421,289" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal224" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 225
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 225 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="346,291,381,315" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal225" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>   
                    <?php
                    // Code for stall_id 226
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 226 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="382,291,421,315" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal226" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>   
                    <?php
                    // Code for stall_id 227
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 227 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="346,315,382,340" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal227" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>   
                    <?php
                    // Code for stall_id 228
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 228 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="382,316,421,340" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal228" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>   
                    <?php
                    // Code for stall_id 229
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 229 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="346,341,382,366" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal229" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>   
                    <?php
                    // Code for stall_id 230
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 230 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="382,340,421,366" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal230" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>   
                    <?php
                    // Code for stall_id 231
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 231 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="346,367,382,392" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal231" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>   
                    <?php
                    // Code for stall_id 232
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 232 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="382,367,421,392" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal232" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 233
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 233 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="438,243,477,288" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal233" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 234
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 234 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="475,243,514,288" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal234" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 235
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 235 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="438,290,477,314" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal235" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 236
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 236 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="477,290,514,315" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal236" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 237
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 237 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="438,317,477,341" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal237" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>    
                    <?php
                    // Code for stall_id 238
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 238 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="477,317,514,342" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal238" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>    
                    <?php
                    // Code for stall_id 239
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 239 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="438,343,477,367" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal239" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>    
                    <?php
                    // Code for stall_id 240
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 240 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="477,340,514,365" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal240" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>    
                    <?php
                    // Code for stall_id 241
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 241 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="438,368,477,392" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal241" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>    
                    <?php
                    // Code for stall_id 242
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 242 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="477,367,514,392" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal242" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 243
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 243 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="532,243,568,289" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal243" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 244
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 244 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="568,243,607,289" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal244" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 245
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 245 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="532,289,570,314" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal245" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 246
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 246 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="570,289,607,314" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal246" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 247
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 247 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="531,315,568,341" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal247" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?> 
                    <?php
                    // Code for stall_id 248
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 248 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="570,316,607,341" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal248" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 249
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 249 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="531,341,568,367" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal249" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 250
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 250 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="570,342,607,367" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal250" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 251
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 251 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="531,366,568,392" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal251" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 252
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 252 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="570,366,607,391" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal252" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 253
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 253 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="622,243,644,288" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal253" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 254
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 254 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="643,243,662,288" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal254" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 255
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 255 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="663,242,698,290" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal255" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 256
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 256 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="623,288,661,316" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal256" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 257
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 257 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="660,288,700,315" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal257" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 258
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 258 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="624,315,661,339" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal258" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>      
                    <?php
                    // Code for stall_id 259
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 259 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="660,316,700,339" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal259" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>      
                    <?php
                    // Code for stall_id 260
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 260 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="623,340,660,364" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal260" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 261
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 261 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="662,340,699,364" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal261" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>      
                    <?php
                    // Code for stall_id 262
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 262 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="622,367,661,391" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal262" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>      
                    <?php
                    // Code for stall_id 263
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 263 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="663,366,700,390" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal263" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>                                                                                                                                                                         
                </map>
                <?php include 'stall_modal.php' ?>
        </div>

        <!-- /.panel-body -->
    </div>
    <!-- /#page-wrapper -->
</div>

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 4 JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!-- DataTables JavaScript -->
<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../js/sb-admin-2.js"></script>
<script src="../js/jquery.maphilight.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script>
    jQuery(function () {
        jQuery('#ImageMap1').maphilight();
    });
    $('#ImageMap1').trigger('alwaysOn.maphilight').find('area[coords]');
</script>
</body>
</html>
