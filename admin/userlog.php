<?php
    session_start();
    if (!isset($_SESSION['usernm']) || $_SESSION['ustype'] != 'Admin') {
        header('Location: manage.php');
        exit();
    }
    $_SESSION['actib'] = 'userlog';
    require 'headerr.php';
?>
<!--Container Main start-->

<!-- this is for alert -->
<div id="dialogoverlay"></div>
<div id="dialogbox">
    <div>
        <div id="dialogboxhead"></div>
        <div id="dialogboxbody"></div>
        <div id="dialogboxfoot"></div>
    </div>
</div>
<!-- end of alert -->
<div class="height-100 bg-light-gray main-content">
    <style>
        .bord {
            border-top: 2px solid #c33a08;
        }
    </style>
<div class="bg-light-gray mb-5 p-3 rounded">
    <h3 class="fw-bold">User logs</h3><br>
    <div class="row justify-content-around mb-3 p-2 bg-light bordddd border-4 shadow-sm rounded">
        <hr>
        <?php
        $sql = "SELECT l.log_id, l.user_id, u.lname, u.fname, u.email, l.login_time, l.logout_time
                FROM login_log l
                JOIN users u ON l.user_id = u.userid";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        ?>
        <div class="table-responsive p-3 bg-light mb-3 rounded">
            <table id="myDataTable" class="table custom-table table-hover table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>User email</th>
                        <th>Login Time</th>
                        <th>Logout Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nn = "NONE";
                    $no = 0;
                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td class="fw-bold">' . ++$no . '.</td>';
                            echo '<td>' . $row['lname'] . ', ' . $row['fname'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . date("M d, Y H:i:s", strtotime($row['login_time'])) . '</td>';
                            echo '<td>' . date("M d, Y H:i:s", strtotime($row['logout_time'])) . '</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!--Container Main end-->

<?php
require 'footer1.php';
?>
