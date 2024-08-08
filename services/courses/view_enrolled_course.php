
<?php
include '../../include/db_connection.php';
session_start();

$username=$_SESSION["username"];
$password=$_SESSION["password"];
// Check connection
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch courses from the database
$sql = "SELECT e.enrollment_id,c.course_id,c.course_category,c.course_title, c.course_code, c.start_date, c.end_date, c.description,c.capacity
        FROM courses c
        JOIN enrollment e ON c.course_id = e.course_id
        WHERE e.username = '$username'";

$result = mysqli_query($c, $sql);

include 'course_header.php';
if (mysqli_num_rows($result) > 0) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Enrolled Course</title>
        <link rel='stylesheet' href='styles4.css'>
    </head>
    <body>
        <div class='table-container'>
            <table>
                <thead>
                <tr>
                    <th>Enroll Id</th>
                    <th>Title</th>
                    <th>Code</th>
                    <th>Category</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Description</th>
                    <th colspan=2>Actions</th></tr>
                </thead>
                <tbody>";
    
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['enrollment_id'] . '</td>';
            echo '<td>' . $row['course_title'] . '</td>';
            echo '<td>' . $row['course_code'] . '</td>';
            echo '<td>' . $row['course_category'] . '</td>';
            echo '<td>' . $row['start_date'] . '</td>';
            echo '<td>' . $row['end_date'] . '</td>';
            echo '<td>' . $row['description'] . '</td>';
            echo "
                <td><a href='download_course_form.php?enrollment_id=".$row['enrollment_id']."' class='edit-btn'>View</a></td>
                <td><a href='msg.php?course_id=".$row['course_id']."' class='edit-btn'>Notice</a></td>
                ";
            echo '</tr>';
        }
    echo "</tbody>
            </table>
        </div>
    </body>
    </html>";
    include 'course_footer.php';
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
        <div class='no-videos'>No course enrolled.</div>
    </body>
    </html>";
}