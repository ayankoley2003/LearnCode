<?php
include '../../include/db_connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id=$_POST['course_id'];
    
    $sql = "DELETE FROM courses WHERE course_id = $course_id";

    if (mysqli_query($c, $sql)) {
        header("Location: view_course.php");
        exit();
    } else {
        header("Location: view_course.php");
        exit();
    }

    mysqli_close($c);
    
}
?>



















