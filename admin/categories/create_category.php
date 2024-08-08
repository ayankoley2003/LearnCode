<?php
include '../../include/db_connection.php';
session_start();
$_SESSION['message']="";
// Check if the form is submitted

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryName = $_POST['category_name'];
    
    $sql = "INSERT INTO categories (category_name) VALUES ('$categoryName')";

    if (mysqli_query($c, $sql)) {
        header("Location: ../admin_portal.php?success=1");
        exit();
    } else {
        header("Location: ../admin_portal.php?error=1");
        exit();
    }

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
        <?php if (isset($_SESSION['message'])) : ?>
        <script type="text/javascript">
            alert("<?php echo $_SESSION['message']; ?>");
        </script>
        <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
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
                <label for="thumbnail">Thumbnail:</label>
                <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit">Create Course</button>
            </div>
        </form>
    </div>
</body>
</html>
