<?php
include '../../include/db_connection.php';
$quiz_category=$_POST['quiz_category'];
$quiz_name=$_POST['quiz_name'];
$sql = "INSERT INTO quiz_sets (category,quiz_name) VALUES ('$quiz_category','$quiz_name')";
        if (!mysqli_query($c, $sql)) {
            echo "Error: " . mysqli_error($c) . "<br>";
        }
$sql2 = "SELECT id FROM quiz_sets where quiz_name='$quiz_name' order by id desc limit 1";
$result = mysqli_query($c, $sql2); 
$row = mysqli_fetch_assoc($result);
$quiz_id=$row["id"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Quiz Questions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 700px;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-top: 0;
        }
        .question-block {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .question-block h3 {
            margin-top: 0;
            color: #666;
            font-size: 18px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
            font-size: 14px;
        }
        textarea {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 14px;
        }
        .options-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .option {
            flex: 1 1 calc(50% - 10px);
        }
        input[type="text"],select {
            width: 97%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 14px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        input[type="submit"], button {
            background-color: #28a745;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        button {
            background-color: #007bff;
        }
        button:hover, input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function addQuestion() {
            const container = document.getElementById('questions-container');
            const questionCount = container.children.length + 1;

            const questionDiv = document.createElement('div');
            questionDiv.className = 'question-block';

            questionDiv.innerHTML = `
                <h3>Question ${questionCount}</h3>
                <label for="question${questionCount}">Question:</label>
                <textarea id="question${questionCount}" name="questions[${questionCount}][question]" rows="3" required></textarea>
                
                <div class="options-container">
                    <div class="option">
                        <label for="option1_${questionCount}">Option 1:</label>
                        <input type="text" id="option1_${questionCount}" name="questions[${questionCount}][option1]" required>
                    </div>
                    <div class="option">
                        <label for="option2_${questionCount}">Option 2:</label>
                        <input type="text" id="option2_${questionCount}" name="questions[${questionCount}][option2]" required>
                    </div>
                    <div class="option">
                        <label for="option3_${questionCount}">Option 3:</label>
                        <input type="text" id="option3_${questionCount}" name="questions[${questionCount}][option3]" required>
                    </div>
                    <div class="option">
                        <label for="option4_${questionCount}">Option 4:</label>
                        <input type="text" id="option4_${questionCount}" name="questions[${questionCount}][option4]" required>
                    </div>
                </div>
                
                <label for="answer_${questionCount}">Correct Answer:</label>
                <input type="text" id="answer_${questionCount}" name="questions[${questionCount}][answer]" required>
            `;

            container.appendChild(questionDiv);
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Add New Quiz Questions</h1>
        <form action="add_questions.php" method="post">
            <label for="quiz_id">Quiz Id :</label>
            <input type="text" id="quiz_id" name="quiz_id" value="<?= $quiz_id?>" readonly>
            <label for="quiz_category">Quiz Category :</label>
            <input type="text" id="quiz_category" name="quiz_category" value="<?= $quiz_category?>" readonly>
            <label for="quiz_name">Quiz Title :</label>
            <input type="text" id="quiz_name" name="quiz_name" value="<?= $quiz_name?>" readonly>
            <div id="questions-container">
                <!-- Initial question block -->
                <div class="question-block">
                    <h3>Question 1</h3>
                    <label for="question1">Question:</label>
                    <textarea id="question1" name="questions[1][question]" rows="3" required></textarea>
                    
                    <div class="options-container">
                        <div class="option">
                            <label for="option1_1">Option 1:</label>
                            <input type="text" id="option1_1" name="questions[1][option1]" required>
                        </div>
                        <div class="option">
                            <label for="option2_1">Option 2:</label>
                            <input type="text" id="option2_1" name="questions[1][option2]" required>
                        </div>
                        <div class="option">
                            <label for="option3_1">Option 3:</label>
                            <input type="text" id="option3_1" name="questions[1][option3]" required>
                        </div>
                        <div class="option">
                            <label for="option4_1">Option 4:</label>
                            <input type="text" id="option4_1" name="questions[1][option4]" required>
                        </div>
                    </div>
                    
                    <label for="answer_1">Correct Answer:</label>
                    <input type="text" id="answer_1" name="questions[1][answer]" required>
                </div>
            </div>
            <div class="buttons">
                <button type="button" onclick="addQuestion()">Add Another Question</button>
                <input type="submit" value="Add Questions">
            </div>
        </form>
    </div>
</body>
</html>
