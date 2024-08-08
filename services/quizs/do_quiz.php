<?php
include '../../include/db_connection.php';
$quiz_id=$_GET['id'];
$no=0;
if ($c->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT qno, question, option1, option2, option3, option4 FROM quiz_questions where quiz_id='$quiz_id'";
$result = $c->query($sql);

$questions = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      $questions[] = $row;
  }
} 
$c->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz</title>
  <link rel="stylesheet" href="qustyles.css">
</head>
<body>
  <div id="quiz-container">
    <h1>Quiz </h1>
      <form action="answer.php?id=<?=$quiz_id?>" method="post" onsubmit="return confirmSubmit()">
          <?php foreach ($questions as $question) : ?>
              <div class="question"><p><strong>Question <?= ++$no?> :</strong> <?= $question['question'] ?></p></div>
              <div class="options">
                  <label>
                      <input type="radio" name="question<?= $question['qno'] ?>" value="<?= $question['option1'] ?>">
                      <?= $question['option1'] ?>
                  </label><br>
                  <label>
                      <input type="radio" name="question<?= $question['qno'] ?>" value="<?= $question['option2'] ?>">
                      <?= $question['option2'] ?>
                  </label><br>
                  <label>
                      <input type="radio" name="question<?= $question['qno'] ?>" value="<?= $question['option3'] ?>">
                      <?= $question['option3'] ?>
                  </label><br>
                  <label>
                      <input type="radio" name="question<?= $question['qno'] ?>" value="<?= $question['option4'] ?>">
                      <?= $question['option4'] ?>
                  </label>
              </div>
          <?php endforeach; ?>
          <button type="submit">Submit Quiz</button>
      </form>
  </div>
  <script>
    function confirmSubmit() {
        return confirm('Are you sure you want to submit the quiz?');
    }
  </script>
</body>
</html>
