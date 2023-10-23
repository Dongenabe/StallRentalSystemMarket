<?php
session_start();
$_SESSION['actib'] = 'trt';
require 'tenantheader.php';

$tenant_lname = "";
$tenant_fname = "";
$gender = "";
$section_name = "";
$tid = $_SESSION['tenantId'];
$qlength = 0;

// Query to fetch tenant information for the logged-in tenant
$query = "SELECT t.tenant_lname, t.tenant_fname, t.tenant_gender, m.section_name, t.stall_id
          FROM tenants t
          JOIN rental_tbl r ON t.stall_id = r.stall_id
          JOIN market_section m ON r.section_id = m.market_section_id
          WHERE t.tenantid = '$tid';";

$resquery = mysqli_query($conn, $query);
$resqueryCheck = mysqli_num_rows($resquery);

if ($resqueryCheck > 0) {
    while ($row = mysqli_fetch_assoc($resquery)) {
        $tenant_lname = $row['tenant_lname'];
        $tenant_fname = $row['tenant_fname'];
        $gender = $row['tenant_gender'];
        $section_name = $row['section_name'];
        $stall_id = $row['stall_id']; // Fetch stall_id from tenants table
    }
}

?>

<div class="height-100 bg-light-gray main-content">
    <style>
        .bord {
            border-top: 2px solid #005c5c;
        }

        .reminder-box {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .reminder-title {
            font-size: 24px;
            font-weight: bold;
            color: #005c5c;
            margin-bottom: 10px;
        }

        .reminder-message {
            font-size: 16px;
        }

        .no-reminder {
            font-size: 24px;
            font-weight: bold;
            color: #005c5c;
            text-align: center;
        }
    </style>

    <div class="reminder-box">
        <h3 class="reminder-title">Payment Reminder</h3>
        <?php
        $qry = "SELECT reminder FROM tenants WHERE tenantid = '$tid'";
        $reminderResult = mysqli_query($conn, $qry);
        $row = mysqli_fetch_assoc($reminderResult);
        $reminder = $row['reminder'];

        if ($reminder == 1) {
            echo '<p class="reminder-message">This is to notify you that your Payments program is going to expire soon. Please clear up your payments before your due dates. <br>IT IS IMPORTANT THAT YOU CLEAR YOUR DUES ON TIME.</p>';
        } elseif ($reminder == 2) {
            echo '<p class="reminder-message">You have missed your payment due date! Please make your payments as soon as possible.</p>';
        } else {
            echo '<p class="no-reminder">NO REMINDERS YET!</p>';
        }
        ?>
    </div>
</div>
