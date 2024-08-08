<?php
include '../../include/db_connection.php';

// Check connection
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch courses from the database
$sql = "SELECT course_id, course_category, course_title, course_code, start_date, end_date, description, capacity FROM courses";
$result = mysqli_query($c, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Existing Course</title>
        <link rel='stylesheet' href='styles2.css'>
        <script type='text/javascript'>
        function confirmDeletion() {
            return confirm('Are you sure you want to delete this course?');
        }
        </script>
    </head>
    <header>
        <div class='header-content'>
            <h1>Existing Course</h1>
        </div>
    </header>
    <body>
        <div class='table-container'>
            <table>
                <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Code</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th colspan=3><center>Actions</center></th></tr>
                </thead>
                <tbody>";
    
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['course_id'] . '</td>';
            echo '<td>' . $row['course_category'] . '</td>';
            echo '<td>' . $row['course_title'] . '</td>';
            echo '<td>' . $row['course_code'] . '</td>';
            echo '<td>' . $row['start_date'] . '</td>';
            echo '<td>' . $row['end_date'] . '</td>';
            echo "<td><a href='update_course.php?course_id=".$row['course_id']."' class='edit-btn'>Edit</a></td>";
            echo "<td>
                    <form action='delete_course.php' method='post' onsubmit='return confirmDeletion();' '>
                        <input type='hidden' name='course_id' value='".$row['course_id']."'>
                        <button type='submit' class='edit-btn'>Delete</button>
                    </form>
                </td>";
            echo "<td><a href='msg.php?course_id=".$row['course_id']."' class='edit-btn'>Messege</a></td>";
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