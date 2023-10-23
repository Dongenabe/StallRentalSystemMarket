
<?php
    session_start();
    $_SESSION['actib'] = 'Section';
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
            .bord{
                border-top: 2px solid #c33a08;
            }
        </style>

    <div class="bg-light-gray mb-5 p-3 rounded">
        
            <h3 class="fw-bold">Market Section</h3><br>
        
                <?php
                    if(isset($_GET['action'])){
                        echo '<center><small><div class="text-start alert alert-'.$_GET['action'].' alert-dismissible fade show" role="alert">
                            <strong>';
                            if($_GET['action'] == 'danger')
                                echo '<i class="fa-solid fa-trash"></i>&nbsp;  Public market  has been deleted !';
                            elseif($_GET['action'] == 'warning')
                                echo '<i class="fa-solid fa-user-pen"></i>&nbsp;  Public market has been updated !';
                             elseif($_GET['action'] == 'noaccess')
                        echo '<i class="fa-solid fa-user-pen"></i>&nbsp; Only administrators can access!';
                        echo '</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div></small></center>';
                    }
                ?>     
        
        <?php
            $sql = "SELECT * FROM market_section ORDER BY section_name ASC;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
        ?>

            <form action="" method="post">
                <button type="submit" formaction="add_marketsection.php" class="btn btn-secondary btn-sm" ><i class='fas fa-store-alt nav_icon'></i><small> Add market Section</small></button>
            </form><hr>
        <div class="table-responsive p-3 bg-light-gray mb-3 bord border-4 shadow-sm rounded">
        <table id="myDataTable" class="table custom-table table-hover table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Section name</th>
                    <th><small>Edit</small></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;
                    if($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>';
                                echo '<td class="fw-bold">'.++$no.'.</td>';
                                echo '<td>'.$row['section_name'].'</td>';
                                if ($_SESSION['ustype'] == 'Admin') {
                                    echo '<td class="text-center"><a href="add_marketsection.php?editMarketsection=' . $row['market_section_id'] . '" class="btn btn-warning btn-sm rounded"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                                } else {
                                    // Display a disabled button
                                    echo '<td class="text-center"><button class="btn btn-warning btn-sm rounded" disabled><i class="fa-solid fa-pen-to-square"></i></button></td>';
                                }
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