<?php
include '../include/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = $_POST['courseId'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    // Insert message into messages table
    $sql = "INSERT INTO messages (course_id, subject, body) VALUES ('$course_id', '$subject', '$body')";
    if (mysqli_query($c, $sql)) {

        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($c);
    }

    mysqli_close($c);
}
?>
