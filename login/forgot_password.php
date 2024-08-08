
<?php
include 'db_connection.php';
$error="";

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $username = $_POST['username'];
    $sql = "SELECT * FROM users WHERE userid = '$username'";
    $d=mysqli_query($c,$sql);
if (mysqli_num_rows($d)>0) 
{
    header("Location:change_password.php?username=$username");
    exit;
}
else
{
    $error="Wrong Username";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <p>Please enter your registered Username below </p>
        <form action="forgot_password.php" method="post">
            <?php if ($error !== ""): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <label for="username">Username</label>
            <input type="text" id="email" name="username" required>
            <input type="submit" value="Reset_Password">
        </form>
    </div>
</body>
</html>