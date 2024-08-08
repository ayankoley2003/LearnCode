<?php
include '../../include/db_connection.php';
session_start();

$username = $_SESSION["username"];
$password = $_SESSION["password"];



$quiz_id=$_GET['quiz_id'];

// Check connection
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch performance data from the database
$sql = "SELECT * FROM `quiz_participants`where quiz_id=$quiz_id ORDER by score DESC;";
$result = mysqli_query($c, $sql);
$i=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance and Ranking Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header">
        <h1>Performance and Ranking Report</h1>
    </header>
    <div class="container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='ranking-table'>
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>";
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$i}</td>
                        <td>{$row['student_id']}</td>
                        <td>{$row['score']}</td>
                      </tr>";
                $i=$i+1;
            }

            echo "</tbody>
                </table>";
        } else {
            echo "<div class='no-data'>No performance data found.</div>";
        }
        ?>
    </div>
</body>
</html>
