<?php
// Set the content type to JSON for the response
header('Content-Type: application/json');

// Include the database connection file and start a session
require 'dbh.inc.php';
session_start();

// Retrieve the year from the session
$taon = $_SESSION['taon'];

// Arrays to store data
$dataYear = array();
$dataMonth = array();
$data = array();

// Query to retrieve distinct years from the payments table for a specific year
$sql = "SELECT DISTINCT(YEAR(paymentdate)) as years FROM payments_tbl WHERE YEAR(paymentdate) = $taon ORDER BY YEAR(paymentdate) DESC";
$result = mysqli_query($conn, $sql);
$resCheck = mysqli_num_rows($result);

if ($resCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        // Store the distinct years in the dataYear array
        $dataYear[] = $row['years'];

        // Get the year
        $year = $row['years'];

        // Query to retrieve distinct months for each year
        $sql1 = "SELECT DISTINCT(MONTH(paymentdate)) as months FROM payments_tbl WHERE YEAR(paymentdate) = $year ORDER BY MONTH(paymentdate) ASC";
        $result1 = mysqli_query($conn, $sql1);
        $resCheck1 = mysqli_num_rows($result1);

        if ($resCheck1 > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {

                // Store the distinct months in the dataMonth array
                $dataMonth[] = $row1['months'];

                // Get the month
                $month = $row1['months'];

                // Query to retrieve payment data for each year and month
                $sql2 = "SELECT YEAR(paymentdate) as years, MONTHNAME(paymentdate) as months, SUM(amount) as tototal FROM payments_tbl WHERE YEAR(paymentdate) = $year AND MONTH(paymentdate) = $month ORDER BY MONTH(paymentdate) ASC";
                $result2 = mysqli_query($conn, $sql2);
                $resCheck2 = mysqli_num_rows($result2);

                if ($resCheck2 > 0) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {

                        // Store the payment data in the data array
                        $data[] = $row2;
                    }
                }
            }
        }
    }
}

// Output the data array as JSON
print json_encode($data);
?>
