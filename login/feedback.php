
<?php

include "db_connection.php";
include 'authenticate.php';

session_start();
$username=$_SESSION["username"];
$password=$_SESSION["password"];

$auth=authenticate_user($username,$password);
if($auth){
    $fullname=$_GET['fullname'];
    $email=$_GET['mail'];
    $feedback_text=$_GET['feedback_text'];
    
    $sql1 = "insert into feedback(userid,name,email,message) values('$username','$fullname','$email','$feedback_text');";
    $d1=mysqli_query($c,$sql1);
    if($d1)
    {	
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
            <h1>Thank You for Your Review!</h1>
            <p>Your review has been successfully submitted.</p>
            <p>We appreciate your feedback.</p>
        </body>
        </html>
<?php
    }
    header("refresh:3; url= ../loggedIn.php");
    exit;
}
?>

		
		