<?php
require '../includes/dbh.inc.php';

if (isset($_GET['view'])) {
    $iddd = $_GET['view'];
    $sql = "SELECT rental_tbl.*, market_section.section_name
            FROM rental_tbl
            LEFT JOIN market_section ON rental_tbl.section_id = market_section.market_section_id
            WHERE stall_id = '$iddd'
            ORDER BY section_name ASC;";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $k = $row['section_name'];
            $a = $row['stallno'];
            $b = $row['monthly_fee'];
            $c = $row['status'];
            $si = '../img/stalls/' . $row['image'];
            $o = $row['size'];
            $d = $row['description'];
        }
    }

    $modalContent = '<div class="text-center mb-4">';
    $modalContent .= '<img src="' . $si . '" alt="Stall Image" class="img-thumbnail" style="width: 200px; height: 200px;">';
    $modalContent .= '</div>';
    $modalContent .= '<div class="row">';
    $modalContent .= '<div class="col-md-6">';
    $modalContent .= '<div class="mb-3">';
    $modalContent .= '<label class="form-label"><b>Section:</b></label>';
    $modalContent .= '<input type="text" class="form-control" value="' . $k . '" readonly>';
    $modalContent .= '</div>';
    $modalContent .= '<div class="mb-3">';
    $modalContent .= '<label class="form-label"><b>Stall number:</b></label>';
    $modalContent .= '<input type="text" class="form-control" value="' . $a . '" readonly>';
    $modalContent .= '</div>';
    $modalContent .= '<div class="mb-3">';
    $modalContent .= '<label class="form-label"><b>Monthly Fee:</b></label>';
    $modalContent .= '<input type="text" class="form-control" value="' . $b . '" readonly>';
    $modalContent .= '</div>';
    $modalContent .= '</div>';
    $modalContent .= '<div class="col-md-6">';
    $modalContent .= '<div class="mb-3">';
    $modalContent .= '<label class="form-label"><b>Status:</b></label>';
    $modalContent .= '<input type="text" class="form-control" value="' . $c . '" readonly>';
    $modalContent .= '</div>';
    $modalContent .= '<div class="mb-3">';
    $modalContent .= '<label class="form-label"><b>Size:</b></label>';
    $modalContent .= '<input type="text" class="form-control" value="' . $o . '" readonly>';
    $modalContent .= '</div>';
    $modalContent .= '<div class="mb-3">';
    $modalContent .= '<label class="form-label"><b>Description:</b></label>';
    $modalContent .= '<input type="text" class="form-control" value="' . $d . '" readonly>';
    $modalContent .= '</div>';
    $modalContent .= '</div>';
    $modalContent .= '</div>';

    echo $modalContent;
}
?>