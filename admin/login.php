

<?php
include '../include/db_connection.php';
session_start(); 
$error = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $_SESSION["ad_username"] = $_POST['username'];
    $_SESSION["ad_password"] = $_POST['password'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $q="SELECT * FROM admin WHERE (ad_userid='$username' AND ad_password='$password')";   // Check the username and password
    $d=mysqli_query($c,$q);
    if(mysqli_num_rows($d) == 1){
        header("Location: admin_portal.php");
        exit;
    }
    else 
    {
        $error = "Invalid username or password. Please try again."; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../login/style2.css"> 
</head>
<body>
    
    <div class="container">
            <h2>Admin Login</h2>
            <form action="login.php" method="post">
                <?php if ($error !== ""): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Login">
            </form>
            <div class="options">
                <a href="signup.php">Sign Up</a>
                <a href="forgot_password.php">Forgot Password?</a>
            </div>
    </div>
</body>
</html>
