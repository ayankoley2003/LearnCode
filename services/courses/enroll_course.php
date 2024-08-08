<?php 
include '../../include/db_connection.php';
session_start();

$username=$_SESSION["username"];
$password=$_SESSION["password"];
$sql = "SELECT fullname,email FROM users where userid='$username'";
$result2 = mysqli_query($c, $sql);
$row2 = mysqli_fetch_assoc($result2);

$course_id=$_GET['course_id'];
$sql2 = "SELECT course_id, course_category, course_title, course_code, start_date, end_date, description, capacity FROM courses where course_id='$course_id'";
$result = mysqli_query($c, $sql2);
$row = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Course Enrollment Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Online Course Enrollment Form</h2>
        <form action="put_enrolled_data.php" method="post">
            <!-- Personal Information -->
            <div class="form-group">
                <label for="fullName">Full Name<span class="required"></span>:</label>
                <input type="text" id="fullName" name="fullName" value="<?php echo $row2['fullname'];?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address<span class="required"></span>:</label>
                <input type="email" id="email" name="email" value="<?php echo $row2['email'];?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number<span class="required"></span>:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address<span class="required"></span>:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth<span class="required"></span>:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label>Gender<span class="required"></span>:</label>
                <select id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <!-- Course Information -->
            <div class="form-group">
                <label for="courseId">Course Id<span class="required"></span>:</label>
                <input type="text" id="courseId" name="courseId" value="<?php echo $row['course_id'];?>" required readonly>
            </div>
            <div class="form-group">
                <label for="courseTitle">Course Title<span class="required"></span>:</label>
                <input type="text" id="courseTitle" name="courseTitle" value="<?php echo $row['course_title'];?>" required readonly>
            </div>
            <div class="form-group">
                <label for="courseCode">Course Code<span class="required"></span>:</label>
                <input type="text" id="courseCode" name="courseCode" value="<?php echo $row['course_code'];?>" required readonly>
            </div>
            <div class="form-group">
                <label for="startDate">Preferred Start Date<span class="required"></span>:</label>
                <input type="date" id="startDate" name="startDate" value="<?php echo $row['start_date'];?>" required readonly>
            </div>
            <div class="form-group">
                <label for="endDate">Expected End Date<span class="required"></span>:</label>
                <input type="date" id="endDate" name="endDate" value="<?php echo $row['end_date'];?>" required readonly>
            </div>

            <!-- Educational Background -->
            <div class="form-group">
                <label for="educationLevel">Highest Level of Education Completed<span class="required"></span>:</label>
                <select id="educationLevel" name="educationLevel" required>
                    <option value="High School">High School</option>
                    <option value="Associate Degree">Associate Degree</option>
                    <option value="Bachelor’s Degree">Bachelor’s Degree</option>
                    <option value="Master’s Degree">Master’s Degree</option>
                    <option value="Doctorate">Doctorate</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fieldOfStudy">Field of Study:</label>
                <input type="text" id="fieldOfStudy" name="fieldOfStudy" >
            </div>
            <div class="form-group">
                <label for="relevantCourses">Relevant Courses Completed:</label>
                <textarea id="relevantCourses" name="relevantCourses" rows="3"></textarea>
            </div>

            <!-- Professional Background -->
            <div class="form-group">
                <label for="jobTitle">Current Job Title:</label>
                <input type="text" id="jobTitle" name="jobTitle" >
            </div>
            <div class="form-group">
                <label for="company">Company/Organization:</label>
                <input type="text" id="company" name="company" >
            </div>
            <div class="form-group">
                <label for="experience">Years of Experience:</label>
                <input type="text" id="experience" name="experience" >
            </div>
            <div class="form-group">
                <label for="skills">Relevant Skills and Expertise:</label>
                <textarea id="skills" name="skills" rows="3"></textarea>
            </div>

            <!-- Project Interests -->
            <div class="form-group">
                <label>Area of Interest:</label>
                <input type="checkbox" id="technology" name="interest[]" value="Technology">
                <label for="technology">Technology</label>
                <input type="checkbox" id="science" name="interest[]" value="Science">
                <label for="science">Science</label>
                <input type="checkbox" id="arts" name="interest[]" value="Arts">
                <label for="arts">Arts</label>
                <input type="checkbox" id="business" name="interest[]" value="Business">
                <label for="business">Business</label>
                <input type="checkbox" id="engineering" name="interest[]" value="Engineering">
                <label for="engineering">Engineering</label>
                <input type="checkbox" id="otherInterest" name="interest[]" value="Other">
                <label for="otherInterest">Other</label>
                <input type="text" id="otherInterestText" name="otherInterestText">
            </div>
            <div class="form-group">
                <label>Type of Projects Interested In:</label>
                <input type="checkbox" id="individual" name="projectType[]" value="Individual Projects">
                <label for="individual">Individual Projects</label>
                <input type="checkbox" id="group" name="projectType[]" value="Group Projects">
                <label for="group">Group Projects</label>
                <input type="checkbox" id="research" name="projectType[]" value="Research Projects">
                <label for="research">Research Projects</label>
                <input type="checkbox" id="practical" name="projectType[]" value="Practical/Hands-On Projects">
                <label for="practical">Practical/Hands-On Projects</label>
                <input type="checkbox" id="theoretical" name="projectType[]" value="Theoretical Projects">
                <label for="theoretical">Theoretical Projects</label>
            </div>

            <!-- Learning Goals -->
            <div class="form-group">
                <label for="learningGoals">What are your main goals for taking this course?</label>
                <textarea id="learningGoals" name="learningGoals" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="skillsToGain">What specific skills or knowledge do you hope to gain?</label>
                <textarea id="skillsToGain" name="skillsToGain" rows="3"></textarea>
            </div>

            <!-- Availability -->
            <div class="form-group">
                <label>Preferred Learning Schedule:</label>
                <input type="checkbox" id="weekdays" name="schedule[]" value="Weekdays">
                <label for="weekdays">Weekdays</label>
                <input type="checkbox" id="weekends" name="schedule[]" value="Weekends">
                <label for="weekends">Weekends</label>
                <input type="checkbox" id="evenings" name="schedule[]" value="Evenings">
                <label for="evenings">Evenings</label>
                <input type="checkbox" id="flexible" name="schedule[]" value="Flexible">
                <label for="flexible">Flexible</label>
            </div>

            <!-- Additional Information -->
            <div class="form-group">
                <label for="referral">How did you hear about this course?</label>
                <select id="referral" name="referral" required>
                    <option value="Our Site">Our Site</option>
                    <option value="Online Search">Online Search</option>
                    <option value="Social Media">Social Media</option>
                    <option value="Referral">Referral</option>
                    <option value="Advertisement">Advertisement</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comments">Any additional comments or questions:</label>
                <textarea id="comments" name="comments" rows="3"></textarea>
            </div>

            <!-- Agreement -->
            <div class="form-group">
                <input type="checkbox" id="confirm" name="confirm" required>
                <label for="confirm">I confirm that the information provided is accurate and complete.</label>
            </div>
            <div class="form-group">
                <input type="checkbox" id="agree" name="agree" required>
                <label for="agree">I agree to the terms and conditions of the course.</label>
            </div>

            <!-- Submit -->
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>



<?php
// Close the database connection
mysqli_close($c);
?>
