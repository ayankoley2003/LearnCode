<?php
session_start();
include 'db_connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$succ = "";
$error = "";
$otp_error = "";
$otp_sent = false;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['signup'])) 
{
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $sql3 = "select * from users where userid='$username';";
    $d = mysqli_query($c, $sql3);

    if (mysqli_num_rows($d) > 0) 
    {
        $error = "Username already exists";
    } 
    else 
    {
        if ($password === $confirm_password)            // For send the Otp 
        {
            // Generate OTP
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            // Send OTP via email
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                $mail->SMTPAuth = true;
                $mail->Username = 'ayankoley339@gmail.com'; // SMTP username
                $mail->Password = 'zjnivnjxkslxzicu'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('ayankoley339@gmail.com', 'Mailer');
                $mail->addAddress($email, $fullname);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'OTP Verification';
                $mail->Body    = 'Your OTP is: ' . $otp;

                $mail->send();
                $otp_sent = true;
            } catch (Exception $e) {
                $error = "OTP could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } 
        else 
        {
            $error = "Password and confirm password mismatch";
        }
    }
} 
elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['verify_otp'])) 
{
    $entered_otp = $_POST['otp'];
    if ($entered_otp == $_SESSION['otp']) 
    {
        $fullname = $_SESSION['fullname'];
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        $sql1 = "INSERT INTO users (userid, fullname, email) VALUES ('$username', '$fullname', '$email')";
        $sql2 = "INSERT INTO login (userid, password) VALUES ('$username', '$password')";

        if (mysqli_query($c, $sql1) && mysqli_query($c, $sql2)) 
        {
            $succ = "Sign Up Successful";
            unset($_SESSION['otp']);
            unset($_SESSION['fullname']);
            unset($_SESSION['username']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
        } 
        else 
        {
            
            $error = "Error in storing data";
        }
    } 
    else 
    {
        $otp_sent = true;
        $otp_error = "Invalid OTP";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <?php if ($otp_sent && $error == ""): ?>
            <form action="signup.php" method="post">
                <p style="color: green;">OTP has been sent to your email. Please enter it below:</p>
                <label for="otp">Enter OTP</label>
                <input type="text" id="otp" name="otp" required>
                <input type="submit" name="verify_otp" value="Verify OTP">
                <?php if ($otp_error !== ""): ?>
                    <p style="color: red;"><?php echo $otp_error; ?></p>
                <?php endif; ?>
            </form>
        <?php else: ?>
            <form action="signup.php" method="post">
                <?php if ($succ !== ""): ?>
                    <p style="color: green;"><?php echo $succ; ?></p>
                <?php elseif ($error !== ""): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="name">Name</label>
                <input type="text" id="name" name="fullname" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <input type="submit" name="signup" value="Sign Up">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
