<?php
require 'dbconnect.php';

$sql = "SELECT player_id, fname FROM Players";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
while( $record = mysqli_fetch_assoc($resultset) ) {
    ?>
    <div class="card hovercard">
        <div class="cardheader">
            <div class="avatar">
                <img alt="" src="sample/preset.png">
            </div>
        </div>
        <div class="card-body info">
            <div class="title">
                <a href="#"><?php echo $fname ?></a>
            </div>
        </div>
        <div class="card-footer bottom">

        </div>
    </div>
<?php } ?>