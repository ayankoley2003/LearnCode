<?php
include '../../include/db_connection.php';

// Check connection
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch courses from the database
$sql = "SELECT * FROM quiz_sets";
$result = mysqli_query($c, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Existing Quizs</title>
        <link rel='stylesheet' href='styles2.css'>
        <script type='text/javascript'>
        function confirmDeletion() {
            return confirm('Are you sure you want to delete this quiz?');
        }
        </script>
    </head>
    <header>
        <div class='header-content'>
            <h1>Existing Quizs</h1>
        </div>
    </header>
    <body>
        <div class='table-container'>
            <table>
                <thead>
                <tr>
                    <th>Quiz ID</th>
                    <th>Category</th>
                    <th>Quiz Title</th>
                    <th colspan=2><center>Actions</center></th></tr>
                </thead>
                <tbody>";
    
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['category'] . '</td>';
            echo '<td>' . $row['quiz_name'] . '</td>';
            echo "<td><a href='update_quiz.php?quiz_id=".$row['id']."' class='edit-btn'>Update</a></td>";
            echo "<td>
                    <form action='delete_quiz.php' method='post' onsubmit='return confirmDeletion();' '>
                        <input type='hidden' name='quiz_id' value='".$row['id']."'>
                        <button type='submit' class='edit-btn2'>Delete</button>
                    </form>
                </td>";
            echo '</tr>';
        }
    echo "</tbody>
            </table>
        </div>
    </body>
    <footer>
        <div class='footer-content'>
            <p>Copyright © 2024 Created By Shirshendu sen , All Rights Reserved.</p>
            <ul>
                <li><a href='#'>Privacy Policy</a></li>
                <li><a href='#'>Terms of Service</a></li>
            </ul>
        </div>
    </footer>
    </html>";
} else {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Video List</title>
        <link rel='stylesheet' href='styles4.css'>
    </head>
    <body>
        <div class='no-course'>No course found.</div>
    </body>
    </html>";
}