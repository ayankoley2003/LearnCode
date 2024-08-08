<?php
session_start();

$username=$_SESSION["username"];
$password=$_SESSION["password"];
include '../../include/db_connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Check connection
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $courseId = $_POST['courseId'];
    $courseTitle = $_POST['courseTitle'];
    $courseCode = $_POST['courseCode'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $educationLevel = $_POST['educationLevel'];
    $fieldOfStudy = $_POST['fieldOfStudy'];
    $relevantCourses = $_POST['relevantCourses'];
    $jobTitle = $_POST['jobTitle'];
    $company = $_POST['company'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];
    $interest = isset($_POST['interest']) ? implode(", ", $_POST['interest']) : "";
    $projectType = isset($_POST['projectType']) ? implode(", ", $_POST['projectType']) : "";
    $learningGoals = $_POST['learningGoals'];
    $skillsToGain = $_POST['skillsToGain'];
    $schedule = isset($_POST['schedule']) ? implode(", ", $_POST['schedule']) : "";
    $referral = $_POST['referral'];
    $comments = $_POST['comments'];
    $confirm = isset($_POST['confirm']) ? 1 : 0;
    $agree = isset($_POST['agree']) ? 1 : 0;

    $sql = "INSERT INTO enrollment (username,full_name, email, phone, address, dob, gender, course_id, education_level, field_of_study, relevant_courses, job_title, company, experience, skills, interest, project_type, learning_goals, skills_to_gain, schedule, referral, comments)
    VALUES ('$username','$fullName', '$email', '$phone', '$address', '$dob', '$gender', '$courseId','$educationLevel', '$fieldOfStudy', '$relevantCourses', '$jobTitle', '$company', '$experience', '$skills', '$interest', '$projectType', '$learningGoals', '$skillsToGain', '$schedule', '$referral', '$comments')";


    if (mysqli_query($c, $sql)) {
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
                <h1>Thank You for joining our course!</h1>
                <p>You recieve an email on the registered email.</p>
                <p>We appreciate your effort.</p>
            </body>
            </html>
    <?php
        }
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
                $mail->addAddress($email, $fullName);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Enrollment of course';
                $mail->Body    = 'Thank you for joining our course . You have get the further notice through email ';

                $mail->send();
                $otp_sent = true;
            } catch (Exception $e) {
                $error = "Messge not be sent. Mailer Error: {$mail->ErrorInfo}";
            }


        header("refresh:5; url= view_course.php");
        exit;
    }
}
    ?>
