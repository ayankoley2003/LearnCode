<?php
session_start();
$_SESSION['message'] = "";
include '../include/db_connection.php';

// Fetch categories
$sql = "SELECT category_id, category_name FROM categories";
$result = mysqli_query($c, $sql);
$categories = array();
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

// Fetch total users and active users
$totalUsersQuery = "SELECT COUNT(*) AS total FROM users";
$totalUsersResult = mysqli_query($c, $totalUsersQuery);
$totalUsersRow = mysqli_fetch_assoc($totalUsersResult);
$totalUsers = $totalUsersRow['total'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript">
        function confirmSubmissionCat() {
            return confirm("Are you sure you want to add this category?");
        }
        function confirmSubmissionQuiz() {
            return confirm("Are you sure you want to create this quiz?");
        }
    </script>
</head>
<body>
    <div class="sidebar">
        <header>
            <h1>Admin Dashboard</h1>
        </header>
        <nav>
            <ul>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#manage-category">Manage Category</a></li>
                <li><a href="#manage-courses">Manage Courses</a></li>
                <li><a href="#manage-videos">Manage Videos</a></li>
                <li><a href="#manage-ebook">Manage Ebooks</a></li>
                <li><a href="#manage-quizs">Manage Quizs</a></li>
                <li><a href="#live-users">Live Users</a></li>
                <li><a href="#settings">Settings</a></li>
                <li><a href="#reports">Reports</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <section id="dashboard" class="content-section">
            <h2>Dashboard</h2>
            <p>Welcome, Admin!</p>
            <p><?php echo $_SESSION["ad_username"]; ?></p>
        </section>
        <section id="manage-category" class="content-section">
            <h2>Manage Categories</h2>
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <p style="color: green;">Category successfully added!</p>
            <?php elseif (isset($_GET['error']) && $_GET['error'] == 1): ?>
                <p style="color: red;">There was an error adding the category. Please try again.</p>
            <?php endif; ?>
            <form name="form1" action="categories/create_category.php" method="post" onsubmit="return confirmSubmissionCat();">
                <input type="text" name="category_name" placeholder="Category Name" required>
                <button type="submit">Add New Category</button>
            </form>
            <h3>Existing Categories</h3>
            <a href="categories/view_categories.php">Click here to show categories</a>
        </section>
        <section id="manage-courses" class="content-section">
            <h2>Manage Courses</h2>
            <a href="courses/create_course.php">Click here to add new course</a>
            <h3>Existing Courses</h3>
            <a href="courses/view_course.php">Click here to show all courses</a>
        </section>
        <section id="manage-videos" class="content-section">
            <h2>Manage Videos</h2>
            <a href="videos/upload_video.php">Click here to add new video</a>
            <h3>Existing Videos</h3>
            <a href="videos/show_video.php">Click here to show all videos</a>
        </section>
        <section id="manage-ebook" class="content-section">
            <h2>Manage Books</h2>
            <a href="ebooks/upload_ebook.php">Click here to add new book</a>
            <h3>Existing Books</h3>
            <a href="ebooks/show_ebook.php">Click here to show all books</a>
        </section>
        <section id="manage-quizs" class="content-section">
            <h2>Manage Quizs</h2>
            <form name="form1" action="quizs/create_quiz.php" method="post" onsubmit="return confirmSubmissionQuiz();">
                <label for="quiz_category">Quiz Category :</label>
                <select id="quiz_category" name="quiz_category" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="quiz_name">Quiz Title :</label>
                <input type="text" id="quiz_name" name="quiz_name" required>
                <button type="submit">Create a quiz</button>
            </form>
            <h3>Existing Quizs</h3>
            <a href="quizs/view_quizs.php">Click here to show all quizs</a>
        </section>
        <section id="live-users" class="content-section">
            <h2>Live Users</h2>
            <p>Total Users: <?php echo $totalUsers; ?></p>
            <p>Active Users: <?php echo $totalUsers;; ?></p>
            
        </section>
        <section id="settings" class="content-section">
            <h2>Settings</h2>
            <p>Updated soon</p>
        </section>
        <section id="reports" class="content-section">
            <h2>Reports</h2>
            <a href="../test2/view_message.php">Click here to show all Message</a>
            <p>Reports and analytics will be available here.</p>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 E-Learning Admin Portal</p>
    </footer>
</body>
</html>
