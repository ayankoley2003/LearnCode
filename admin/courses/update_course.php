<?php
include '../../include/db_connection.php';
session_start();
$sql = "SELECT category_id, category_name FROM categories";
$result = mysqli_query($c, $sql);
$categories = array();
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    $sql = "SELECT * FROM courses WHERE course_id = $course_id";
    $result = mysqli_query($c, $sql);
    $course = mysqli_fetch_assoc($result);

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $course_id=$_GET['course_id'];;
    $courseCategory = $_POST['courseCategory'];
    $courseTitle = $_POST['courseTitle'];
    $courseCode = $_POST['courseCode'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];
    $sql = "UPDATE courses SET course_category='$courseCategory', course_title='$courseTitle', course_code='$courseCode', start_date='$startDate', end_date='$endDate', description='$description', capacity=$capacity WHERE course_id=$course_id";

    if (mysqli_query($c, $sql)) {
        $_SESSION['message']= "Course updated successfully.";
    } else {
        $_SESSION['message']= "Error updating course: " . mysqli_error($c);
    }

    mysqli_close($c);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Update Course</title>
</head>
<body>
<div class="form-container">
    
    <h2>Update Course</h2>
        <?php if (isset($_SESSION['message'])): ?>
            <script>
                alert("<?php echo $_SESSION['message']; unset($_SESSION['message']); ?>");
            </script>
        <?php endif; ?>
    <form action="update_course.php?course_id=<?php echo $course_id; ?>" method="post">
        <div class="form-group">
            <label for="courseCategory">Course Category:</label>
                <select id="courseCategory" name="courseCategory" required>
                    <option value="<?php echo $course['course_category']; ?>"><?php echo $course['course_category']; ?></option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        <div class="form-group">
            <label for="courseTitle">Course Title:</label>
            <input type="text" id="courseTitle" name="courseTitle" value="<?php echo $course['course_title']; ?>" required>
        </div>
        <div class="form-group">
            <label for="courseCode">Course Code:</label>
            <input type="text" id="courseCode" name="courseCode" value="<?php echo $course['course_code']; ?>" required>
        </div>
        <div class="form-group">
            <label for="startDate">Start Date:</label>
            <input type="date" id="startDate" name="startDate" value="<?php echo $course['start_date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="endDate">End Date:</label>
            <input type="date" id="endDate" name="endDate" value="<?php echo $course['end_date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4"><?php echo $course['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" value="<?php echo $course['capacity']; ?>" required>
        </div>
        <div class="form-group">
            <button type="submit">Update Course</button>
        </div>
    </form>
</div>
</body>
</html>
