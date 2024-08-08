<?php
include '../../include/db_connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vid=$_POST['vid'];
    $sql = "DELETE FROM video WHERE vid = $vid";
    if (mysqli_query($c, $sql)) {
        header("Location: show_video.php");
        exit();
    } else {
        header("Location: show_video.php");
        exit();
    }

    mysqli_close($c);
    
}
?>



















