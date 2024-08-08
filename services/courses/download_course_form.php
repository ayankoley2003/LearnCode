<?php 
include '../../include/db_connection.php';
session_start();

$username=$_SESSION["username"];
$password=$_SESSION["password"];
$sql = "SELECT fullname,email FROM users where userid='$username'";
$result2 = mysqli_query($c, $sql);
$row2 = mysqli_fetch_assoc($result2);
$enrollment_id=$_GET['enrollment_id'];
$sql2 = "SELECT * FROM enrollment join courses where enrollment_id='$enrollment_id' and courses.course_id=enrollment.course_id";
$result = mysqli_query($c, $sql2);
$row = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Confirmation</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.confirmation-container {
    max-width: 600px;
    margin: auto;
    background: white;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

h3 {
    color: #333;
    font-size: 25px;
}

p {
    line-height: 1.6;
    margin: 10px 0;
}

strong {
    color: #333;
}

.thank-you {
    font-size: 1.2em;
    font-weight: bold;
    color: #28a745;
    text-align: center;
    margin-top: 20px;
}



    </style>
</head>
<body>
    <div class="confirmation-container">
        <center><h1>Enrollment Confirmation</h1></center>
        <div class="confirmation-details">
            <h3>Personal Information</h3>
            <p><strong>Full Name:</strong> <?php echo $row2['fullname']; ?></p>
            <p><strong>Email Address:</strong> <?php echo $row2['email']; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $row['phone']; ?></p>
            <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $row['dob']; ?></p>
            <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
            
            <h3>Course Information</h3>
            <p><strong>Enrollment Id:</strong> <?php echo $row['enrollment_id']; ?></p>
            <p><strong>Course Id:</strong> <?php echo $row['course_id']; ?></p>
            <p><strong>Course Title:</strong> <?php echo $row['course_title']; ?></p>
            <p><strong>Course Code:</strong> <?php echo $row['course_code']; ?></p>
            <p><strong>Start Date:</strong> <?php echo $row['start_date']; ?></p>
            <p><strong>End Date:</strong> <?php echo $row['end_date']; ?></p>
            
            <h3>Educational Background</h3>
            <p><strong>Highest Level of Education Completed:</strong> <?php echo $row['education_level']; ?></p>
            <p><strong>Field of Study:</strong> <?php echo $row['field_of_study']; ?></p>
            <p><strong>Relevant Courses Completed:</strong> <?php echo $row['relevant_courses']; ?></p>
            
            <h3>Professional Background</h3>
            <p><strong>Current Job Title:</strong> <?php echo $row['job_title']; ?></p>
            <p><strong>Company/Organization:</strong> <?php echo $row['company']; ?></p>
            <p><strong>Years of Experience:</strong> <?php echo $row['experience']; ?></p>
            <p><strong>Relevant Skills and Expertise:</strong> <?php echo $row['skills']; ?></p>
            
            <h3>Project Interests</h3>
            <p><strong>Area of Interest:</strong> <?php echo $row['interest']; ?></p>
            <p><strong>Type of Projects Interested In:</strong> <?php echo $row['project_type']; ?></p>
            
            <h3>Learning Goals</h3>
            <p><strong>Main Goals for Taking this Course:</strong> <?php echo $row['learning_goals']; ?></p>
            <p><strong>Specific Skills or Knowledge to Gain:</strong> <?php echo $row['skills_to_gain']; ?></p>
            
            <h3>Availability</h3>
            <p><strong>Preferred Learning Schedule:</strong> <?php echo $row['schedule']; ?></p>
            
            <h3>Additional Information</h3>
            <p><strong>How Did You Hear About This Course:</strong> <?php echo $row['referral']; ?></p>
            <p><strong>Additional Comments or Questions:</strong> <?php echo $row['comments']; ?></p>
            
            <p class="thank-you">Thank you for enrolling in our course!</p>
        </div>
    </div>
</body>
</html>




<?php
// Close the database connection
mysqli_close($c);
?>
