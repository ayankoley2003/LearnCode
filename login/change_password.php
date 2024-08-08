<?php
include 'db_connection.php';
$succ="";
$error="";
error_reporting(0);
$username=$_GET['username'];

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    
    $username=$_POST['username'];
    $current_password = $_POST['current_password'];
    $new_password=$_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $sql1="select password from login where userid='$username';";
    $d=mysqli_query($c,$sql1);
    while($row=mysqli_fetch_assoc($d)) {
        $pass1=$row['password'];
    }
    if($pass1==$current_password)
    {
        if ($new_password === $confirm_password) 
        {
            $sql = "UPDATE login SET password='$new_password' WHERE userid='$username'";
            $d1=mysqli_query($c,$sql);
            $succ="Password successfully changed";
        }
        else
        {

            $error="New password and confirm password missmatch";
        }
    }
    else
    {
        $error="Your registered password missmatch";
    }
}
?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style2.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password</title>
    </head>
    <body>
        <div class="container">
            <h2>Change Password</h2>
            <form action="change_password.php" method="post">
                <?php if ($succ !== ""): ?>
                    <p style="color: green;"><?php echo $succ; ?></p>
                <?php elseif ($error !== ""): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo $username;?>"readonly required>
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" required>
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" required>
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <input type="submit" value="Change Password">
            </form>
        </div>
    </body>
    </html>
    