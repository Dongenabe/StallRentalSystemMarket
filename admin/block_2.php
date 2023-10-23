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
                    <h1 class="page-header"> BLOCK 2</h1>
                </div>
            </div>
        <div class="image-container">
            <img src="../img/maps/B2.jpg" id="ImageMap1" usemap="#ground">
        </div>
            <map id="ground" name="ground">
                    <?php
                    // Code for stall_id 127
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 127 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="708,423,753,463" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal127" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 128
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 128 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="756,420,802,455" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal128" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 129
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 129 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="708,465,753,505" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal129" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 130
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 130 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="754,457,800,492" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal130" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 131
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 131 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="708,507,756,549" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal131" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 132
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 132 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="755,492,801,527" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal132" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 133
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 133 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="708,551,756,594" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal133" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 134
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 134 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="756,531,802,563" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal134" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 135
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 135 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="708,596,756,639" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal135" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 136
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 136 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="756,566,802,600" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal136" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 137
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 137 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="756,601,802,638" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal137" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 138
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 138 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="poly" coords="755,636,756,731,791,730,801,713,801,637" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal138" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 139
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 139 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="710,637,756,730" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal139" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 140
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 140 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="686,638,710,685" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal140" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 141
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 141 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="678,684,708,729" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal141" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 142
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 142 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="661,638,685,683" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal142" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 143
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 143 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="645,685,675,729" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal143" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 144
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 144 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="634,638,658,682" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal144" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 145
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 145 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="615,685,645,729" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal145" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 146
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 146 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="611,638,634,685" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal146" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 147
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 147 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="587,638,611,685" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal147" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 148
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 148 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="583,685,614,729" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal148" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 149
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 149 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="562,639,585,684" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal149" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 150
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 150 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="551,686,584,729" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal150" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 151
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 151 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="536,639,560,685" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal151" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 152
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 152 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="519,685,550,729" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal152" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 153
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 153 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="514,639,536,684" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal153" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 154
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 154 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="487,684,518,728" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal154" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 155
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 155 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="488,640,512,684" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal155" value="<?php echo $rent_status; ?>"
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
<?php include 'mapfooter.php'; ?>
</body>
</html>
