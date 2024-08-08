
<?php

include "db_connection.php";
include 'authenticate.php';

session_start();
$username=$_SESSION["username"];
$password=$_SESSION["password"];

$auth=authenticate_user($username,$password);
if($auth){
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $email=$_GET['email'];
    $message=$_GET['message'];
    $additional_details=$_GET['additional'];
    $fullname=$fname." ".$lname;
    
    $sql1 = "insert into contactus(userid,name,email,message,ad_details) values('$username','$fullname','$email','$message','$additional_details');";
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
            <h1>Thank You for Your Contact Us!</h1>
            <p>Your message has been successfully submitted.</p>
            <p>We appreciate your effort.</p>
            <p>We will contact you shortly via your given email address.</p>
        </body>
        </html>
<?php
    }
    
}
?>

		
		