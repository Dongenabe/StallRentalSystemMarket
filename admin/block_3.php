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
                    <h1 class="page-header"> BLOCK 3</h1>
                </div>
            </div>
        <div class="image-container">
            <img src="../img/maps/B3.png" id="ImageMap1" usemap="#ground">
        </div>
            <map id="ground" name="ground">
                    <?php
                    // Code for stall_id 156
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 156 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="522,779,550,835" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal156" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 157
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 157 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="522,832,551,889" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal157" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 158
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 158 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="492,779,522,834" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal158" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 159
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 159 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="492,833,522,889" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal159" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 160
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 160 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="462,777,493,835" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal160" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 161
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 161 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="462,835,493,888" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal161" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 162
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 162 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="433,777,462,835" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal162" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 163
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 163 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="434,835,463,888" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal163" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 164
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 164 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="405,779,432,833" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal164" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 165
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 165 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="406,835,435,888" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal165" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 166
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 166 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="374,779,406,834" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal166" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 167
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 167 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="374,835,405,888" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal167" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 168
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 168 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="344,779,373,835" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal168" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 169
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 169 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="345,835,374,888" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal169" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 170
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 170 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="316,779,345,835" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal170" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 171
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 171 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="317,834,345,890" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal171" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>        
                    <?php
                    // Code for stall_id 172
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 172 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="289,778,315,834" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal172" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>        
                    <?php
                    // Code for stall_id 173
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 173 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="288,835,318,890" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal173" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>        
                    <?php
                    // Code for stall_id 174
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 174 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="259,778,289,834" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal174" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>        
                    <?php
                    // Code for stall_id 175
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 175 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="260,835,286,890" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal175" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>        
                    <?php
                    // Code for stall_id 176
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 176 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="230,778,259,835" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal176" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>        
                    <?php
                    // Code for stall_id 177
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 177 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="230,835,259,888" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal177" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 178
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 178 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="167,835,190,888" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal178" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 179
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 179 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="140,834,165,888" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal179" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 180
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 180 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="115,834,139,888" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal180" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 181
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 181 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="poly" coords="86,834,86,871,113,889,113,835" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal181" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 182
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 182 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="89,754,110,780" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal182" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 183
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 183 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="110,754,131,780" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal183" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 184
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 184 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="132,754,153,780" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal184" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 185
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 185 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="155,754,176,780" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal185" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 186
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 186 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="175,729,199,754" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal186" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 187
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 187 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="175,705,200,730" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal187" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 188
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 188 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="175,681,200,705" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal188" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 189
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 189 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="175,593,199,617" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal189" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 190
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 190 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="175,568,198,594" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal190" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?> 
                    <?php
                    // Code for stall_id 191
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 191 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="175,542,198,568" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal191" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?> 
                    <?php
                    // Code for stall_id 192
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 192 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="155,520,177,546" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal192" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 193
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 193 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="133,519,155,546" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal193" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 194
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 194 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="111,519,133,546" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal194" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 195
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 195 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="88,519,110,546" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal195" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>  
                    <?php
                    // Code for stall_id 196
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 196 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="178,481,199,518" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal196" value="<?php echo $rent_status; ?>"
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
