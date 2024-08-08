<?php
include '../../include/db_connection.php';


if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}



$query = '';
$category = '';
if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($c, $_GET['query']);
    $sql = "SELECT * FROM quiz_sets WHERE category LIKE '%$query%' OR quiz_name LIKE '%$query%' ";
    $result = mysqli_query($c, $sql);

    include 'quiz_header.php';
    if (mysqli_num_rows($result) > 0) {
        if (mysqli_num_rows($result) > 0) {
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Quiz List</title>
                <link rel='stylesheet' href='styles4.css'>
            </head>
            <body>
                <div class='table-container'>
                    <table>
                        <thead>
                        <tr>
                            <th>Quiz ID</th>
                            <th>Category</th>
                            <th>Quiz Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>";
            
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['category'] . '</td>';
                        echo '<td>' . $row['quiz_name'] . '</td>';
                        echo "
                            <td><a href='do_quiz.php?id=".$row['id']."' class='edit-btn'>Start</a></td>
                            ";
                    echo '</tr>';
                }
            echo "</tbody>
                    </table>
                </div>
            </body>
            </html>";
            include 'quiz_footer.php';
        } else {
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Quiz List</title>
                <link rel='stylesheet' href='styles4.css'>
            </head>
            <body>
                <div class='no-quizs'>No quiz found.</div>
            </body>
            </html>";
        }
    }
}