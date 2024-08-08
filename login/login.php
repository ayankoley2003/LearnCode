<?php
session_start(); 
include 'authenticate.php';
$error = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $_SESSION["username"] = $_POST['username'];
    $_SESSION["password"] = $_POST['password'];
    $auth=authenticate_user($_SESSION["username"],$_SESSION["password"]);
    if($auth)
    {
        header("Location: ../loggedIn.php");
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
    <link rel="stylesheet" type="text/css" href="style2.css"> 
   
</head>
<body>
    <div class="container">
            <h2>Login</h2>
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
