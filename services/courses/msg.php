<?php
include '../../include/db_connection.php';
session_start();
$course_id = $_GET['course_id'];
$sender_id=$_SESSION["username"];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = $_POST['course_id'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (course_id,sender_id,message) VALUES ('$course_id','$sender_id', '$message')";
    
    if ($c->query($sql) === TRUE) {
        echo "Message sent";
    } else {
        echo "Error: " . $sql . "<br>" . $c->error;
    }
}

// Fetch previous messages

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cool Message Interface</title>
<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
  }
  .container {
    width: 800px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-color: #ddd;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }
  .message-display {
    flex: 1;
    padding: 20px;
  }

  .message {
    max-width: 45%;
    margin-bottom: 10px;
    padding: 10px 15px;
    border-radius: 20px;
    position: relative;
    word-wrap: break-word;
  }

  .message.user {
    background-color: #1e90ff;
    margin-left: auto;
    color: white;
  }

  .message.incoming {
    background-color: #444;
    color: white;
    max-width: 45%;
  }

  .timestamp {
    display: block;
    font-size: 12px;
    margin-top: 5px;
    color: lightgray;
  }
  .username {
    display: block;
    font-size: 15px;
    margin-bottom: 5px;
    color: White;
    font-weight:bold;
  }

  .message-input {
    display: flex;
    padding: 20px;
    background: rgba(0, 0, 0, 0.8);
    border-top: 1px solid #444;
    border-radius: 8px;
  }

  .input-field {
    flex: 1;
    padding: 10px;
    border-radius: 20px;
    border: none;
    background: #333;
    color: white;
    font-size: 16px;
    outline: none;
  }

  .send-button {
    margin-left: 10px;
    padding: 10px 20px;
    border-radius: 20px;
    border: none;
    background: #1e90ff;
    color: white;
    font-size: 16px;
    cursor: pointer;
    outline: none;
  }
</style>
</head>
<body>
<div class="container">
<center><h2>Messages</h2></center>
<?php
$course_id = $_GET['course_id'];
$sql = "SELECT * FROM messages WHERE course_id = '$course_id' order 
by timestamp;";
$result = $c->query($sql);

?>
 
<?php while ($row = $result->fetch_assoc()): ?>
  <?php if ($result->num_rows > 0): ?>
    <?php if ($sender_id==$row['sender_id']): ?>
      <div class="message-display">
        <div class="message user">
          <div class="username"><?php echo $row['sender_id']; ?></div>
          <div class="body"><?php echo $row['message']; ?></div>
          <div class="timestamp"><?php echo $row['timestamp']; ?></div>
        </div>   
      </div>
    <?php else: ?>
      <div class="message incoming">
          <div class="username"><?php echo $row['sender_id']; ?></div>
          <div class="body"><?php echo $row['message']; ?></div>
          <div class="timestamp"><?php echo $row['timestamp']; ?></div>          
      </div>
    <?php endif; ?>
  <?php endif; ?>
<?php endwhile; ?>

<form method="post">
        <div class="message-input">
        <input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id; ?>" required>
        <input type="text" class="input-field" name="message" placeholder="Type a message..." required>
        <button class="send-button">Send</button>
        </div>
    </form>
</div>
  
</div>


</body>
</html>
