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
                    <h1 class="page-header"> BLOCK 1</h1>
                </div>
            </div>
        <div class="image-container">
            <img src="../img/maps/B1.png" id="ImageMap1" usemap="#ground">
        </div>
            <map id="ground" name="ground">
                    <?php
                    // Code for stall_id 104
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 104 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="440,78,483,124" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal104" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 105
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 105 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="440,125,483,171" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal105" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 106
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 106 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="486,78,529,124" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal106" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 107
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 107 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="485,125,528,171" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal107" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 108
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 108 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="528,78,571,124" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal108" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 109
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 109 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="530,125,573,171" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal109" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 110
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 110 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="573,78,616,124" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal110" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 111
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 111 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="575,125,618,171" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal111" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 112
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 112 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="618,78,661,124" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal112" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 113
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 113 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="617,125,660,171" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal113" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 114
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 114 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="665,78,708,124" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal114" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 115
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 115 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="poly" coords="708,78,710,123,756,123,756,96,737,78" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal115" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 116
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 116 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="664,123,756,169" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal116" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 117
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 117 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="664,172,708,215" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal117" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 118
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 118 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="708,170,756,213" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal118" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 119
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 119 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="664,215,708,258" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal119" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 120
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 120 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="710,215,754,258" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal120" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                
                    <?php
                    // Code for stall_id 121
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 121 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="663,258,707,301" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal121" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                
                    <?php
                    // Code for stall_id 122
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 122 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="708,258,756,301" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal122" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                
                    <?php
                    // Code for stall_id 123
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 123 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="663,303,707,346" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal123" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                
                    <?php
                    // Code for stall_id 124
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 124 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="710,302,754,344" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal124" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 125
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 125 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="663,345,707,388" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal125" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                
                    <?php
                    // Code for stall_id 126
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 126 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="9" shape="rect" coords="710,347,754,389" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal126" value="<?php echo $rent_status; ?>"
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
