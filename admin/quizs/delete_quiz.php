<?php
include '../../include/db_connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quiz_id=$_POST['quiz_id'];
    
    $sql = "DELETE FROM quiz_sets WHERE id = $quiz_id";

    if (mysqli_query($c, $sql)) {
        header("Location: view_quizs.php");
        exit();
    } else {
        header("Location: view_quizs.php");
        exit();
    }

    mysqli_close($c);
    
}
?>



















