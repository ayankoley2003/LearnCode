<?php
include '../../include/db_connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_id=$_POST['category_id'];
    
    $sql = "DELETE FROM categories WHERE category_id = $category_id";

    if (mysqli_query($c, $sql)) {
        header("Location: view_categories.php");
        exit();
    } else {
        header("Location: view_categories.php");
        exit();
    }

    mysqli_close($c);
    
}
?>



















