<?php
include '../../include/db_connection.php';


if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}



$query = '';
$category = '';
if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($c, $_GET['query']);
    $sql = "SELECT * FROM courses WHERE course_category LIKE '%$query%' OR course_title LIKE '%$query%' OR description LIKE '%$query%' ";
    $result = mysqli_query($c, $sql);

    include 'course_header.php';
    if (mysqli_num_rows($result) > 0) {
        if (mysqli_num_rows($result) > 0) {
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Video List</title>
                <link rel='stylesheet' href='styles4.css'>
            </head>
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
                            <th>Description</th>
                            <th>Capacity</th>
                            <th>Actions</th></tr>
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
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['capacity'] . '</td>';
                    echo "
                        <td><a href='enroll_course.php?course_id=".$row['course_id']."' class='edit-btn'>Enroll</a></td>
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
                <div class='no-videos'>No course found.</div>
            </body>
            </html>";
        }
    }
}