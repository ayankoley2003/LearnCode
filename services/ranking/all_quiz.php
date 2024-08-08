<?php
include '../../include/db_connection.php';
session_start();

$username = $_SESSION["username"];
$password = $_SESSION["password"];
// Check connection
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}
// Fetch courses from the database
$sql = "SELECT * FROM quiz_sets";
$result = mysqli_query($c, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Reports & Ranking</title>
        <link rel='stylesheet' href='styles2.css'>
    </head>
    <body>
        <header class='header'>
            <h1>Reports & Ranking</h1>
        </header>
        <div class='container'>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <div class='mentor-card'>
            <div class='image-container'>
                <img src='../../Images/quiz.png' alt=''>
            </div>
            <div class='info-container'>
                <p class='name'>".$row['quiz_name']."</p>
                <a href='quiz_rank.php?quiz_id=".$row['id']."' class='message-button'>View Rank</a>
            </div>
        </div>";
    }

    echo "
        </div>
    </body>
    </html>";
} else {
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>No Mentors Found</title>
        <link rel='stylesheet' href='styles2.css'>
    </head>
    <body>
        <p>No mentor & tutor found.</p>
    </body>
    </html>";
}
?>
