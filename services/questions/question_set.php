<?php
include '../../include/db_connection.php';
$category=$_GET['category'];
// Query database to get questions$questions
$sql = "SELECT question_text,answer FROM questions where category='$category'";
$result = mysqli_query($c, $sql);

$questions = array();

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $questions[] = $row;
    }
}
$i=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions of <?php echo $category; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Available questions for <?php echo $category; ?></h1>
        <?php if (!empty($questions)) : ?>
            <table class="question-table">
                <thead>
                    <tr>
                        <th>Q.No</th>
                        <th>Question</th>
                        <th>Answer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($questions as $que) : ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo htmlspecialchars($que["question_text"]); ?></td>
                            <td><?php echo htmlspecialchars($que["answer"]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="no-questions">No questions found</p>
        <?php endif; ?>
    </div>
</body>
</html>
