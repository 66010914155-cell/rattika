<meta charset="utf-8">

<?php
    include_once("connectdb.php");
    $sql = "DELETE * FROM regions ORDER BY regions.r_id ASC";
    $rs = mysqli_query($conn, $sql);
    
?>