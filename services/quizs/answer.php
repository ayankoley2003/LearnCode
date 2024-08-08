<?php
session_start();

$username=$_SESSION["username"];
$password=$_SESSION["password"];
include '../../include/db_connection.php';
$quiz_id = $_GET['id'];



$sql = "SELECT qno, question, option1, option2, option3, option4, answer FROM quiz_questions WHERE quiz_id='$quiz_id'";
$result = mysqli_query($c, $sql);

$score = 0;
$totalQuestions = $result->num_rows;

if ($totalQuestions > 0) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <link rel="stylesheet" href="qustyles.css">
</head>
<body>
    <div class="results-container">
        <h1>Quiz Results</h1>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
            $questionId = $row["qno"];
            $correctOption = $row["answer"];
            if (isset($_POST["question$questionId"])) {
        ?>
            <div class="question">
                <p><strong>Question:</strong> <?php echo $row['question']; ?></p>
                <p><?php echo $row['option1']; ?></p>
                <p><?php echo $row['option2']; ?></p>
                <p><?php echo $row['option3']; ?></p>
                <p><?php echo $row['option4']; ?></p>
                <p class="correct-answer"><strong>Right answer:</strong> <?php echo $row['answer']; ?></p>
                <p class="your-answer"><strong>Your answer:</strong> <?php echo $_POST["question$questionId"]; ?></p>
                <?php if ($_POST["question$questionId"] == $correctOption) { ?>
                    <p class="correct-answer">Correct!</p>
                <?php } else { ?>
                    <p class="wrong-answer">Incorrect.</p>
                <?php } ?>
            </div>
        <?php
                if ($_POST["question$questionId"] == $correctOption) {
                    $score++;
                }
            }
        }
        ?>
        <div class="score">
            <p>Your score: <?php echo $score; ?> / <?php echo $totalQuestions; ?></p>
        </div>
    </div>
</body>
</html>
<?php
}

$sql_insert = "INSERT INTO quiz_participants (student_id, quiz_id, score) VALUES ('$username', '$quiz_id', '$score')";
if (mysqli_query($c, $sql_insert)) {
    // Successfully inserted the score
} else {
    echo "Error: " . $sql_insert . "<br>" . mysqli_error($c);
}

mysqli_close($c);


?>
