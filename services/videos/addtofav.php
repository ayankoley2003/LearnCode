<?php
session_start();

$username=$_SESSION["username"];
$password=$_SESSION["password"];
include '../../include/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vid = $_POST['vid'];

    
    $check_sql = "SELECT * FROM favourite_videos WHERE user_id = '$username' AND vid = $vid";
    $check_result = mysqli_query($c, $check_sql);

    if (mysqli_num_rows($check_result) == 0) {
        // Insert into favourites table
        $insert_sql = "INSERT INTO favourite_videos (user_id, vid) VALUES ('$username', $vid)";
        if (mysqli_query($c, $insert_sql)) {
            $message = "Video added to favourites successfully.";
        } else {
            $message = "Error: " . $insert_sql . "<br>" . mysqli_error($c);
        }
    } else {
        $message = "Video is already in your favourites.";
    }
}

mysqli_close($c);

// Redirect back to the video page with a message
header("Location: video.php?vid=$vid");
exit;
?>
