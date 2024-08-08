<?php
include '../../include/db_connection.php';
$msg='';
$quiz_id=$_GET['quiz_id'];
$sql_set = "SELECT * from quiz_sets WHERE id=$quiz_id ";
$result_set = mysqli_query($c, $sql_set);
$row_set = mysqli_fetch_assoc($result_set);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $qno = mysqli_real_escape_string($c, $_POST['qno']);
    $question = mysqli_real_escape_string($c, $_POST['question']);
    $option1 = mysqli_real_escape_string($c, $_POST['option1']);
    $option2 = mysqli_real_escape_string($c, $_POST['option2']);
    $option3 = mysqli_real_escape_string($c, $_POST['option3']);
    $option4 = mysqli_real_escape_string($c, $_POST['option4']);
    $answer = mysqli_real_escape_string($c, $_POST['answer']);

    // Update query
    $sql_update = "UPDATE quiz_questions SET question='$question', option1='$option1', option2='$option2', option3='$option3', option4='$option4', answer='$answer' WHERE qno=$qno ";

    if (mysqli_query($c, $sql_update)) {
        $msg="Question updated successfully.";
    } else {
        $msg="Error updating question: " . mysqli_error($c);
    }
    }
    $sql_questions = "SELECT qno,question, option1, option2, option3, option4, answer FROM quiz_questions WHERE quiz_id='$quiz_id'";
    $result_questions = mysqli_query($c, $sql_questions);

    if (mysqli_num_rows($result_questions) > 0) {
        // Output data of each question
        echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Questions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .question-block {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        p {
            font-weight: bold;
            color: green;
        }   
        label {
            margin: 10px 5px 5px 5px;
            font-weight: bold;
        }
        input[type="text"]
        {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 95%;
        }
        input[type="submit"]
        {
            text-decoration: none;
            color: #fff;
            background-color: #DF2771;
            padding: 4px 24px;
            border-radius: 4px;
            transition: 0.3s;
            border: 1px solid #DF2771;
            font-size: 17px;
        }
        input[type="submit"]:hover 
        {
            background-color: #f70566;
        }
    </style>
</head>
<body>
    <div class="container">';
        echo "<h2>Quiz Id : $quiz_id </h2>";
        echo "<p> $msg </p>";
        $question_count = 1;
        while ($row_question = mysqli_fetch_assoc($result_questions)) {
            ?>
            <div class="question-block">
            <form method="post" action="">
                <input type="hidden" name="qno" value="<?php echo htmlspecialchars($row_question['qno']); ?>"><br>
                <label>Question <?=$question_count?>:</label><br>
                <input type="text" name="question" value="<?php echo htmlspecialchars($row_question['question']); ?>"><br>
        
                <label>Option 1:</label><br>
                <input type="text" name="option1" value="<?php echo htmlspecialchars($row_question['option1']); ?>"><br>
        
                <label>Option 2:</label><br>
                <input type="text" name="option2" value="<?php echo htmlspecialchars($row_question['option2']); ?>"><br>
        
                <label>Option 3:</label><br>
                <input type="text" name="option3" value="<?php echo htmlspecialchars($row_question['option3']); ?>"><br>
        
                <label>Option 4:</label><br>
                <input type="text" name="option4" value="<?php echo htmlspecialchars($row_question['option4']); ?>"><br>
        
                <label>Answer:</label><br>
                <input type="text" name="answer" value="<?php echo htmlspecialchars($row_question['answer']); ?>"><br>
        
                <input type="submit" value="Update Question">
            </form>
        <?Php
            echo '</div>';
            $question_count++;
        }
        echo '</div>
</body>
</html>';
    } else {
        echo "No questions found for the specified quiz.";
    }


// Close connection
mysqli_close($c);
?>
