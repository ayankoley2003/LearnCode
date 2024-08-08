<?php
include '../../include/db_connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id=$_POST['id'];
    $sql = "DELETE FROM ebooks WHERE id = $id";
    if (mysqli_query($c, $sql)) {
        header("Location: show_ebook.php");
        exit();
    } else {
        header("Location: show_ebook.php");
        exit();
    }

    mysqli_close($c);
    
}
?>



















