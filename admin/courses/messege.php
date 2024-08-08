<?php
include '../../include/db_connection.php';

$course_id=$_GET['course_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message to Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #007bff;
            border: none;
            color: white;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Send Message to Students</h2>
        <form action="msg.php" method="post">
            <div class="form-group">
                <label for="course">Course ID<span class="required">*</span>:</label>
                <input type="text" id="course" name="course_id" value="<?php echo $course_id; ?>" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject<span class="required">*</span>:</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="body">Message Body<span class="required">*</span>:</label>
                <textarea id="body" name="body" rows="6" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Send Message</button>
            </div>
        </form>
    </div>
</body>
</html>
