<?php
// Set the content type to JSON for the response
header('Content-Type: application/json');

// Include the database connection file
require 'dbh.inc.php';

// Initialize an empty array to store the data
$data = array();

// Query to retrieve distinct rental sections that are marked as 'Available'
$sikwel = "SELECT DISTINCT(rt.section_id), ms.section_name
            FROM rental_tbl rt
            LEFT JOIN market_section ms ON rt.section_id = ms.market_section_id
            WHERE rt.status = 'Available'
            ORDER BY ms.section_name ASC;";
$results = mysqli_query($conn, $sikwel);
$resultsCheck = mysqli_num_rows($results);

if ($resultsCheck > 0) {
    while ($rows = mysqli_fetch_assoc($results)) {

        // Extract section_id and section_name from the result
        $section_id = $rows['section_id'];
        $section_name = $rows['section_name'];

        // Query to count the number of clusters available in a section
        $sikwel1 = "SELECT COUNT(rt.section_id) AS countCluster 
                    FROM rental_tbl rt
                    WHERE rt.section_id='$section_id' AND rt.status='Available';";
        $results1 = mysqli_query($conn, $sikwel1);
        $resultsCheck1 = mysqli_num_rows($results1);

        if ($resultsCheck1 > 0) {
            while ($rows1 = mysqli_fetch_assoc($results1)) {
                // Check if section_name is defined, and add data to the array
                if (isset($section_name)) {
                    $data[] = array(
                        'section_name' => $section_name,
                        'countCluster' => $rows1['countCluster']
                    );
                }
            }
        }
    }
}

// Output the data array as JSON
print json_encode($data);
?>
