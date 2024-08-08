<?php
// Database connection details
include '../../include/db_connection.php';
$quiz_id=$_POST['quiz_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $questions = $_POST['questions'];

    foreach ($questions as $questionData) {
        // Escape user inputs for security
        $question =  $questionData['question'];
        $option1 = $questionData['option1'];
        $option2 = $questionData['option2'];
        $option3 =  $questionData['option3'];
        $option4 =  $questionData['option4'];
        $answer =  $questionData['answer'];

        // Create SQL query
        $sql = "INSERT INTO quiz_questions (quiz_id,question, option1, option2, option3, option4, answer) 
                VALUES ($quiz_id,'$question', '$option1', '$option2', '$option3', '$option4', '$answer')";

        // Execute query
        if (!mysqli_query($c, $sql)) {
            echo "Error: " . mysqli_error($c) . "<br>";
        }
    }
    ?>
    <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thank You</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                padding: 50px;
            }
            h1 {
                color: #DF2771;
            }
        </style>
        </head>
        <body>
            <h1>All the Questions added successfully</h1>
            <p>Thank You for Your Creating Quiz !</p>
            <p>We appreciate your effort.</p>
        </body>
        </html>
    <?php
    header("refresh:5; url= ../admin_portal.php");
    exit;
    // Close connection
    mysqli_close($c);
}
?>
