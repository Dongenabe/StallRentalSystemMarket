<?php
session_start();
require 'mapheader.php';
$_SESSION['actib'] = 'map';
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
                    <h1 class="page-header"> Wet Market</h1>
                </div>
            </div>
        <div class="image-container">
            <img src="../img/maps/wet_market(2).jpg" id="ImageMap1" usemap="#ground">
        </div>
            <map id="ground" name="ground">
                <?php
                // This is PHP code for displaying information about stall_id 1 and its status on an HTML image map.

                // SQL query to retrieve information about stall_id 1, including tenant and rent details.
                $sql = "SELECT * FROM rental_tbl s 
                        LEFT JOIN tenants t 
                        ON t.stall_id = s.stall_id
                        LEFT JOIN rent r
                        ON r.tenant_id = t.tenantid 
                        WHERE s.stall_id = 1 ORDER BY r.rent_status DESC LIMIT 1 ";
                $result = $conn->query($sql);

                // Define the mapping of colors for highlighting the stall based on its rent status.
                // If the rent status is 1, it's occupied and highlighted in red. If not, it's vacant and highlighted in green.
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $rent_status = $row['rent_status'];
                    $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                    ?>
                    <!-- Define an image map area for stall ID 9 with coordinates and other attributes.
                         The area is linked to a modal and includes the rent status and maphilight configuration. -->
                    <area id="9" shape="rect" coords="55,59,19,10" data-toggle="modal" class="stallstyle1"
                          href="#stall_modal1" value="<?php echo $rent_status; ?>"
                          data-maphilight='<?php echo $maphilight; ?>'>
                    <?php
                }
                ?>
                    <?php
                    // Code for stall_id 2
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 2 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="20,60,56,107" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal2" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 3
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 3 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="20,107,56,157" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal3" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 4
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 4 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="21,157,56,205" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal4" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 5
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 5 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="20,205,55,254" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal5" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 6
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 6 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="20,300,50,402" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal6" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 7
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 7 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="19,435,50,531" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal7" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 8
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 8 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="140,301,171,402" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal8" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 9
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 9 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="141,435,168,530" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal9" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 10
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 10 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="135,530,55,500" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal10" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 11
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 11 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="308,488,344,533" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal11" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 12
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 12 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="343,488,380,533" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal12" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 13
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 13 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="381,488,416,535" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal13" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 14
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 14 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="415,488,451,533" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal14" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 15
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 15 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="449,488,486,534" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal15" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 16
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 16 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="555,533,519,487" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal16" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 17
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 17 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="555,487,590,533" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal17" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 18
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 18 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="590,487,623,533" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal18" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 19
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 19 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="624,487,658,533" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal19" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 20
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 20 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="658,487,693,532" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal20" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 21
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 21 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="728,486,762,534" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal21" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 22
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 22 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="763,487,797,532" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal22" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 23
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 23 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="798,487,833,533" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal23" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 24
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 24 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="833,487,868,534" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal24" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 25
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 25 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="868,486,902,533" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal25" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 26
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 26 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="97,9,134,63" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal26" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 27
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 27 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="134,10,168,63" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal27" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 28
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 28 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="168,11,205,63" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal28" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 29
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 29 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="204,11,237,63" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal29" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 30
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 30 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="237,11,275,63" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal30" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 31
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 31 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="306,10,344,59" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal31" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 32
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 32 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="347,10,380,59" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal32" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 33
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 33 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="380,10,415,59" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal33" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 34
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 34 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="415,10,448,60" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal34" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 35
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 35 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="482,59,450,10" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal35" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 36
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 36 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="519,10,554,59" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal36" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 37
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 37 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="554,11,589,59" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal37" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 38
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 38 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="589,11,625,59" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal38" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 39
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 39 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="625,11,658,59" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal39" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 40
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 40 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="658,11,695,60" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal40" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 41
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 41 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="727,10,764,60" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal41" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 42
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 42 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="765,10,799,60" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal42" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 43
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 43 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="798,10,833,59" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal43" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 44
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 44 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="868,60,833,10" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal44" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 45
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 45 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="903,59,869,10" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal45" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 46
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 46 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="935,9,977,58" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal46" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 47
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 47 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="936,58,977,110" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal47" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 48
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 48 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="936,111,977,156" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal48" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 49
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 49 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="935,156,977,204" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal49" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 50
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 50 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="935,205,977,253" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal50" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 51
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 51 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="937,294,974,341" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal51" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 52
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 52 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="936,341,974,390" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal52" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 53
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 53 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="936,390,974,439" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal53" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 54
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 54 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="936,439,975,487" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal54" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 55
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 55 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="rect" coords="936,486,976,533" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal55" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 56
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 56 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="309,166,309,130,309,109,345,108,345,130,328,131,326,166" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal56" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 57
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 57 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="329,222,327,186,309,186,308,246,343,246,343,222" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal57" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 58
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 58 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="307,361,307,325,308,302,343,302,343,325,327,325,327,361" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal58" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 59
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 59 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="326,416,326,381,308,381,308,438,344,439,344,415" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal59" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 60
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 60 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="345,109,380,108,381,167,362,167,361,132,345,130" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal60" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 61
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 61 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="345,223,345,246,380,246,380,220,380,188,362,188,362,223" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal61" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 62
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 62 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="345,302,380,301,381,360,362,360,361,325,344,326" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal62" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 63
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 63 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="344,416,344,439,379,439,379,413,379,381,361,381,361,416" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal63" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 64
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 64 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="413,167,413,131,414,108,449,108,449,131,433,131,433,167" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal64" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 65
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 65 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="431,222,431,188,413,188,413,245,449,245,449,223" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal65" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 66
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 66 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="413,360,413,324,414,301,449,301,449,324,433,324,433,360" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal66" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 67
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 67 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="431,415,431,381,413,381,413,438,449,438,449,416" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal67" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 68
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 68 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="449,108,484,107,485,166,466,166,465,131,448,132" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal68" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 69
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 69 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="451,222,451,245,486,245,486,219,486,187,468,187,468,222" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal69" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 70
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 70 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="450,301,485,301,485,358,467,359,466,325,449,325" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal70" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 71
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 71 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="449,416,449,438,484,438,484,415,484,383,466,383,466,415" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal71" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 72
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 72 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="518,166,518,130,519,107,554,107,554,130,538,130,538,166" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal72" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 73
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 73 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="537,221,537,187,519,187,519,244,555,244,555,222" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal73" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 74
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 74 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="518,360,518,324,519,301,554,301,554,324,538,324,538,360" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal74" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 75
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 75 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="537,416,537,382,519,382,519,439,552,440,552,416" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal75" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 76
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 76 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="555,107,590,107,590,166,572,165,571,131,554,131" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal76" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 77
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 77 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="555,221,555,244,589,245,590,220,590,188,572,188,572,220" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal77" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 78
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 78 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="555,300,590,300,590,359,572,358,571,324,554,324" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal78" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 79
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 79 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="555,415,555,438,589,439,590,414,590,382,572,382,572,414" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal79" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 80
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 80 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="622,166,622,130,623,107,658,107,658,130,642,130,642,166" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal80" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 81
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 81 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="639,223,640,187,622,186,623,244,658,245,657,223" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal81" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 82
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 82 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="622,360,622,324,623,301,658,301,658,324,642,324,642,360" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal82" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 83
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 83 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="640,418,641,382,623,381,624,439,656,439,656,418" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal83" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 84
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 84 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="658,108,693,108,693,167,675,166,674,132,657,132" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal84" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 85
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 85 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="660,221,660,244,694,245,695,220,695,188,677,188,677,220" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal85" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 86
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 86 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="659,301,694,301,694,360,676,359,675,325,658,325" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal86" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 87
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 87 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="658,416,658,438,693,438,694,414,693,380,676,380,675,416" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal87" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 88
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 88 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="729,165,729,129,729,108,763,108,763,128,747,128,747,165" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal88" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 89
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 89 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="745,223,746,187,728,186,729,244,761,244,761,223" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal89" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 90
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 90 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="727,357,729,323,729,302,763,302,762,323,745,325,745,357" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal90" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 91
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 91 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="747,415,746,379,729,378,729,439,763,439,763,415" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal91" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 92
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 92 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="764,107,799,107,799,166,781,165,780,128,765,128" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal92" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 93
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 93 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="764,222,764,244,799,244,800,220,799,186,782,186,781,222" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal93" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 94
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 94 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="763,303,798,303,798,362,780,361,779,324,764,324" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal94" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 95
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 95 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="764,417,764,439,799,439,800,415,799,381,782,381,781,417" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal95" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 96
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 96 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="832,163,834,129,834,108,869,108,869,129,851,129,851,163" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal96" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 97
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 97 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="851,222,850,186,833,185,834,244,868,245,867,222" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal97" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 98
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 98 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="831,357,833,323,833,302,868,302,868,323,850,323,850,357" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal98" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 99
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 99 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="849,416,848,380,831,379,832,438,866,439,865,416" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal99" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 100
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 100 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="869,108,904,108,904,167,886,166,885,129,870,129" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal100" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 101
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 101 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="869,223,869,245,904,245,905,221,904,187,887,187,886,223" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal101" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 102
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 102 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="869,300,904,300,904,359,886,358,885,321,870,321" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal102" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                    <?php
                    // Code for stall_id 103
                    $sql = "SELECT * FROM rental_tbl s 
                            LEFT JOIN tenants t 
                            ON t.stall_id = s.stall_id
                            LEFT JOIN rent r
                            ON r.tenant_id = t.tenantid 
                            WHERE s.stall_id = 103 ORDER BY r.rent_status DESC LIMIT 1 ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rent_status = $row['rent_status'];
                        $maphilight = ($rent_status == 1) ? '{"strokeColor":"FF0000","strokeWidth":3,"fillColor":"FF3333","fillOpacity":0.6,"alwaysOn":true}' : '{"strokeColor":"008000","strokeWidth":3,"fillColor":"7CFC00","fillOpacity":0.6,"alwaysOn":true}';
                        ?>
                        <area id="10" shape="poly" coords="867,415,867,437,902,437,903,413,902,379,885,379,884,415" data-toggle="modal" class="stallstyle1"
                              href="#stall_modal103" value="<?php echo $rent_status; ?>"
                              data-maphilight='<?php echo $maphilight; ?>'>
                        <?php
                    }
                    ?>
                </map>                
                <img src="../img/maps/legends.jpg" alt="Municipality of Binalbagan">
                <br>
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
