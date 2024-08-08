
<?php
session_start();

$username=$_SESSION["username"];
$password=$_SESSION["password"];

include "login/db_connection.php";
        $sql = "Select fullname,userid,email from users WHERE userid='$username' ";
        $d=mysqli_query($c,$sql);
        while($row=mysqli_fetch_assoc($d)) 
		{
			$fullname=$row['fullname'];
            $username=$row['userid'];
            $email=$row['email'];
        }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="images/icon/favicon.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>LearnCode</title>
	<meta name="desciption" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
        p{
            line-height: 1.5;
            margin-bottom: 20px;
        }
.modal {
	display: none; /* Hidden by default */
	position: fixed; /* Stay in place */
	z-index: 1; /* Sit on top */
	left: 0;
	top: 0;
	width: 100%; /* Full width */
	height: 100%; /* Full height */
	overflow: auto; /* Enable scroll if needed */
	background-color: rgb(0,0,0); /* Fallback color */
	background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	padding-top: 40px;
	
}

/* Modal content */
.modal-content {
	background-color: #fefefe;
	margin: 3% auto; /* 5% from the top and centered */
	padding: 35px;
	border: 1px solid #888;
	width: 30%; /* Could be more or less, depending on screen size */
}
input[type="text"] {
            width: 200px; /* Adjust the width as needed */
            padding: 5px; /* Optional: adds some padding inside the input */
            box-sizing: border-box; /* Ensures padding and border are included in the width */
            border: 1px solid #ccc; /* Optional: adds a border around the input */
        }
/* Close button */
.close {
	color: #aaa;
	float: right;
	font-size: 28px;
	font-weight: bold;
}

.close:hover,
.close:focus {
	color: black;
	text-decoration: none;
	cursor: pointer;
}
</style>



</head>
<body>
<!-- Navigation Bar -->
	<header id="header">
		<nav>
			<div class="logo"><img src="Images/logo3.png" alt="logo"></div>
			<ul>
				<li><a href="">Home</a></li>
				<li><a href="#portfolio_section">Explore</a></li>
				<li><a href="#team_section">Team</a></li>
				<li><a href="#services_section">Services</a></li>
				<li><a href="#contactus_section">Contact</a></li>
			</ul>
			<div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="icons_img/search.png" alt="search" onclick=slide()></div>
			<ul>
				<li><button class="get-started" onclick="openModal()">Profile </button></li>
            	<li><button class="get-started" onclick="sign_out()">Sign Out</button></li>
			</ul>
                <script>
                    function sign_out() {
                        window.location.href = 'index.html';
                    }
                </script>
			<img src="images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
		</nav>
		<div class="head-container">
			<div class="quote">
				<p>Grow Your Skills To Advance Your Career Path.</p>
				<h5>Education is the process of facilitating learning, or the acquisition of knowledge, skills, values, beliefs, and habits. Educational methods include teaching, training, storytelling, discussion and directed research!</h5>
				<div class="play">

				</div>
			</div>
			<div class="svg-image">
				<img src="Images/h.webp" alt="svg">
			</div>
		</div>
		<div class="side-menu" id="side-menu">
			<div class="close" onclick="sideMenu(1)"><img src="images/icon/close.png" alt=""></div>
			<div class="user">
				<img src="images/creator/roshan.jpeg" alt="Username">
				<p>roshank9419</p>
			</div>
			<ul>
				<li><a href="#about_section">About</a></li>
				<li><a href="#portfolio_section">Portfolio</a></li>
				<li><a href="#team_section">Team</a></li>
				<li><a href="#services_section">Services</a></li>
				<li><a href="#contactus_section">Contact</a></li>
				<li><a href="#feedBACK">Feedback</a></li>
			</ul>
		</div>
	</header>


<!-- Some Popular Subjects -->
	<div class="title">
		<span>Popular Subjects on Edu Tech</span>
	</div>
	<br><br>
	<div class="course">
		<center><div class="cbox">
		<div class="det"><a href="subjects/jee.html"><img src="icons_img/book.png">JEE Preparation</a></div>
		<div class="det"><a href="subjects/gate.html"><img src="icons_img/algo.png">GATE Preparation</a></div>
		<div class="det"><a href="subjects/jee.html#sample_papers"><img src="icons_img/d1.png">Sample Papers</a></div>
		<div class="det"><a href="subjects/quiz.html"><img src="icons_img/data.png">Daily Quiz</a></div>
		</div></center>
		<div class="cbox">
		<div class="det"><a href="subjects/computer_courses.html"><img src="images/courses/computer.png">Computer Courses</a></div>
		<div class="det"><a href="subjects/computer_courses.html#data"><img src="images/courses/data.png">Data Structures</a></div>
		<div class="det"><a href="subjects/computer_courses.html#algo"><img src="images/courses/algo.png">Algorithm</a></div>
		<div class="det det-last"><a href="subjects/computer_courses.html#projects"><img src="images/courses/projects.png">Projects</a></div>
		</div>
	</div>

	
<!-- ABOUT -->
	<div class="diffSection" id="about_section">
		<center><p style="font-size: 50px; padding: 50px;">About</p></center>
		<div class="head-container2">
            <div class="svg-image">
				<img src="Images/video.png" alt="svg">
			</div>
			<div class="quote">
				<p>A New Way to Learn</p>
				<h5>Learncode is the best platform to help you enhance your skills, expand your knowledge and prepare for technical interviews.Explore is a well-organized tool that helps you get the most out of LeetCode by providing structure to guide your progress towards the next step in your programming career. </h5>
				<div class="play">
				</div>
			</div>
	</div>

    


<!-- SERVICES -->
	<div class="service-swipe">
		<div class="diffSection" id="services_section">
		<center><p style="font-size: 50px; padding: 100px; padding-bottom: 40px; color: #fff;">Services</p></center>
		</div>
		<a href="services/courses/view_course.php"><div class="s-card"><img src="icons_img/computer-courses.png"><p>Free Online Computer Courses</p></div></a>
		<a href="services/videos/videos.php"><div class="s-card"><img src="icons_img/online-tutorials.png"><p>Online Video Lectures</p></div></a>
		<a href="services/questions/question_category.php"><div class="s-card"><img src="icons_img/brainbooster.png"><p>Sample Questions for Various Exams</p></div></a>
		<a href="services/ebooks/ebook.html"><div class="s-card"><img src="icons_img/q1.png"><p>Free Available Books for Popular Subjects</p></div></a>
		<a href="services/ranking/all_quiz.php"><div class="s-card"><img src="icons_img/3.png"><p>Performance and Ranking Report</p></div></a>
		<a href="services/discussion/view_mentors.php"><div class="s-card"><img src="icons_img/discussion.png"><p>Discussion with Our Tutors & Mentors</p></div></a>
		<a href="services/quizs/view_quizs.php"><div class="s-card"><img src="icons_img/4.jpeg"><p>Daily Brain Teasing Questions to Improve IQ</p></div></a>
		<a href="#contactus_section"><div class="s-card"><img src="icons_img/help.png"><p>24x7 Online Support</p></div></a>
	</div>


<!-- TEAM -->
<div class="diffSection" id="team_section">
    <center><p style="font-size: 50px; padding-top: 100px; padding-bottom: 60px;">We're the Creators</p></center>
    <div class="totalcard">
        <div class="card">
            <center><img src="images/creator/roshan1.jpeg"></center>
            <center><div class="card-title">Shirshendu sen</div>
            <div id="detail">
                <p>“ You can teach a student a lesson for a day; but if you can teach him to learn by creating curiosity, he will continue the learning process as long as he lives “</p>
                <div class="duty"></div>
                <a href="https://www.linkedin.com/in/roshan-kumar-a18b76179/" target="_blank"><button class="btn-roshan">Follow +</button></a>
            </div>
            </center>
        </div>
        <div class="card">
            <center><img src="images/creator/roshan2.jpeg"></center>
            <center><div class="card-title">Ayan koley</div>
            <div id="detail">
                <p>“ Real education should consist of drawing the goodness and the best out of our own students. What better books can there be than the book of humanity “</p>
                <div class="duty"></div>
                <a href="https://www.linkedin.com/in/roshan-kumar-a18b76179/" target="_blank"><button class="btn-akhil">Follow +</button></a>
            </div>
            </center>
        </div>
    </div>
</div>



<!-- CONTACT US -->
	<div class="diffSection" id="contactus_section">
		<center><p style="font-size: 50px; padding: 100px">Contact Us</p></center>
		<div class="csec"></div>
		<div class="back-contact">
			<div class="cc">
			<form action="login/contactUs.php">
				<label>First Name <span class="imp">*</span></label><label style="margin-left: 185px">Last Name <span class="imp">*</span></label><br>
				<center>
				<input type="text" name="fname" style="margin-right: 10px; width: 175px" required="required"><input type="text" name="lname" style="width: 175px" required="required"><br>
				</center>
				<label>Email <span class="imp">*</span></label><br>
				<input type="email" name="email" style="width: 100%" required="required"><br>
				<label>Message <span class="imp">*</span></label><br>
				<input type="text" name="message" style="width: 100%" required="required"><br>
				<label>Additional Details</label><br>
				<textarea name="additional"></textarea><br>
				<button type="submit" id="csubmit">Send Message</button>
			</form>
			</div>
		</div>
	</div>

<!-- FEEDBACK -->
	<div class="title2" id="feedBACK">
		<span>Give Feedback</span>
		<div class="shortdesc2">
			<p>Please share your valuable feedback to us</p>
		</div>
	</div>

	<div class="feedbox">
		<div class="feed">
			<form action="login/feedback.php" enctype="text/plain">
				<label>Your Name</label><br>
				<input type="text" name="fullname" class="fname" required="required"><br>
				<label>Email</label><br>
				<input type="email" name="mail" required="required"><br>
				<label>Additional Details</label><br>
				<textarea name="feedback_text"></textarea><br>
				<input type="submit" value="Send Message" id="csubmit">
			</form>
		</div>
	</div>

<!-- Sliding Information -->
	<marquee style="background: linear-gradient(to right, #FA4B37, #DF2771); margin-top: 50px;" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="20"><div class="marqu">“Education is the passport to the future, for tomorrow belongs to those who prepare for it today.” “Your attitude, not your aptitude, will determine your altitude.” “If you think education is expensive, try ignorance.” “The only person who is educated is the one who has learned how to learn …and change.”</div></marquee>


<!-- FOOTER -->
<div class="sub-Foot"> 
    <div class="sub-logo">
        <img src="Images/logo3.png" alt="" style="height: 50px; width: 220px;">
    </div>  
    <div class="fclass" id="f1">
        <h1>Product</h1>
        <ul>
            <li>Overview</li>
            <li>Pricing</li>
            <li>UsabilityHub panel</li>
            <li>Customers</li>
            <li>Status page</li>
            <li>Sign up</li>
            <li>Book a demo</li>
        </ul>
    </div>
    <div class="fclass" id="f2">
        <h1>Resources</h1>
        <ul>
            <li>Blog</li>
            <li>Examples</li>
            <li> Testing guides</li>
            <li>Customers</li>
            <li> Help center</li>
            <li>Contact</li>
            <li>Careers</li>
        </ul>
    </div>
    <div class="fclass" id="f3">
        <h1>Methodologies</h1>
        <ul>
            <li>Card sorting</li>
            <li>Prototype testing</li>
            <li>First click tests</li>
            <li> Preference tests</li>
            <li>Five second tests</li>
            <li>Design surveys</li>
        </ul>
    </div>
</div>
<div class="foot">
<div class="txt">
    <ul>
        <li> Privacy policy</li>
        <li>Terms & conditions</li>
        <li>Security information</li>
        <li>Copyright © 2024 Created By Shirshendu sen , All Rights Reserved.</li>
    </ul>
</div>
</div>

<div id="profileModal" class="modal">
        <!-- Modal content -->
       
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>User Profile</h2><br>
            <div class="profile-info">
				<table>
					<tr>
						<td>Name </td>
						<td><input type="text" value="<?php echo $fullname?>" readonly required></td>
					</tr>
					<tr>
						<td>Username&nbsp;</td>
						<td><input type="text" value="<?php echo $username?>" readonly required></td>
					</tr>
					<tr>
						<td>Email </td>
						<td><input type="text" value="<?php echo $email?>" readonly required></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><p> <button onclick="redirectToAnotherPage3()" style="color:red">Sign Out</button> </p></td>
						<td><p> <button onclick="redirectToAnotherPage4()" style="color:green">Change Password</button> </p></td>
					</tr>
				</table>	
                
                <script>
                    function redirectToAnotherPage4() {
                        window.location.href = 'forgot_password.html';
                    }
                    function redirectToAnotherPage3() {
                        window.location.href = '../index.html';
                    }
                </script>
            </div>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("profileModal");

        // Function to open the modal
        function openModal() {
            modal.style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // Close the modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>




</body>
</html>



