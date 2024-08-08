<?php
include '../../include/db_connection.php';
$sql = "SELECT category_id, category_name FROM categories";
$result = mysqli_query($c, $sql);
$categories = array();
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}
?>
<?php
session_start();
$message = "";
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $courseCategory = $_POST['courseCategory'];
    $courseTitle = $_POST['courseTitle'];
    $courseCode = $_POST['courseCode'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];
    

    

    // Prepare SQL statement to insert data into the courses table
    $sql = "INSERT INTO courses (course_category, course_title, course_code, start_date, end_date, description, capacity)
            VALUES ('$courseCategory', '$courseTitle', '$courseCode', '$startDate', '$endDate', '$description', $capacity)";

    if (mysqli_query($c, $sql)) {
        $_SESSION['message']= "New course created successfully";
        header("Location: email_advertise.php?courseTitle=" . urlencode($courseTitle));
        exit();
    } else {
        $_SESSION['message']= "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($c);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Course</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Create a New Course</h2>
        <form action="create_course.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="courseCategory">Course Category<span class="required"></span>:</label>
                <select id="courseCategory" name="courseCategory" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="courseTitle">Course Title<span class="required"></span>:</label>
                <input type="text" id="courseTitle" name="courseTitle" required>
            </div>
            <div class="form-group">
                <label for="courseCode">Course Code<span class="required"></span>:</label>
                <input type="text" id="courseCode" name="courseCode" required>
            </div>
            <div class="form-group">
                <label for="startDate">Start Date<span class="required"></span>:</label>
                <input type="date" id="startDate" name="startDate" required>
            </div>
            <div class="form-group">
                <label for="endDate">End Date<span class="required"></span>:</label>
                <input type="date" id="endDate" name="endDate" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity<span class="required"></span>:</label>
                <input type="number" id="capacity" name="capacity" required>
            </div>
            <div class="form-group">
                <button type="submit">Create Course</button>
            </div>
        </form>
    </div>
</body>
</html>
