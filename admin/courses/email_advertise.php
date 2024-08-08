<?php
include '../../include/db_connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function sendEmail($courseTitle,$userEmail) {
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
        $mail->addAddress($userEmail, $userEmail);
        // Content
        $message = "<html><body>";
        $message .= "<h1>A new course has been added to the catalog!</h1>";
        $message .= "<p><strong>Course Name:</strong> " . htmlspecialchars($courseTitle) . "</p>";
        $message .= "<p>We hope you enjoy the learning experience!</p>";
        $message .= "<p><a href='" . htmlspecialchars("http://localhost/project_work/") . "'>Click here to log in and explore the new course</a></p>";
        $message .= "</body></html>";
        $mail->isHTML(true);
        $mail->Subject = 'New Course Added';
        $mail->Body    = $message;

        $mail->send();
} catch (Exception $e) {
    
}
}






if (isset($_GET['courseTitle'])) {
    $courseTitle = urldecode($_GET['courseTitle']);
    $sql = "SELECT DISTINCT email FROM users";
    $result = mysqli_query($c, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            sendEmail($courseTitle,$row["email"]);
        }
    } else {
        echo "0 results";
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #DF2771;
        }
    </style>
    </head>
    <body>
        <h1>Thank You for Your Create a Course!</h1>
        <p>Course advertisement successfully sent to all users.</p>
        <p>We appreciate your effort.</p>
    </body>
    </html>
    <?php
// Close connection
mysqli_close($c);



} else {
    echo "";
}
?>