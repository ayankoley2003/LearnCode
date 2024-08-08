<?php
// Include the database connection
include '../../include/db_connection.php';
$sql = "SELECT category_id, category_name FROM categories";
$result = mysqli_query($c, $sql);
$categories = array();
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}
// Start the session to manage messages
session_start();

// Fetch video details based on vid parameter
if (isset($_GET['vid'])) {
    $vid = mysqli_real_escape_string($c, $_GET['vid']);
    $sql = "SELECT vid, category, title, description, thumbnail FROM video WHERE vid=$vid";
    $result = mysqli_query($c, $sql);
    $video = mysqli_fetch_assoc($result);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    // Get form data and escape special characters
    $vid = mysqli_real_escape_string($c, $_POST['vid']);
    $category = mysqli_real_escape_string($c, $_POST['category']);
    $title = mysqli_real_escape_string($c, $_POST['title']);
    $description = mysqli_real_escape_string($c, $_POST['description']);
    $thumbnail = $video['thumbnail']; 


    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $thumbnailDir = '../../admin/videos/thumbnail/';
        $thumbnail = $thumbnailDir . basename($_FILES['thumbnail']['name']);

        if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnail)) {
            $_SESSION['message'] = "Failed to upload thumbnail image.";
        } else {
            $thumbnail = mysqli_real_escape_string($c, $thumbnail);
        }
    }

    // Update video record in the database
    $sql = "UPDATE video SET category='$category', title='$title', description='$description', thumbnail='$thumbnail' WHERE vid=$vid";
    if (mysqli_query($c, $sql)) {
        $_SESSION['message'] = "Video updated successfully.";
    } else {
        $_SESSION['message'] = "Error updating video: " . mysqli_error($c);
    }
    // Redirect to the same page to display the message and avoid resubmission on refresh
    header("Location: update_video.php?vid=$vid");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Video</title>
    <link rel="stylesheet" href="styles4.css">
</head>
<body>
    <div class="container">
        <h2>Update Video</h2>
        <?php if (isset($_SESSION['message'])): ?>
            <script>
                alert("<?php echo $_SESSION['message']; unset($_SESSION['message']); ?>");
            </script>
        <?php endif; ?>
        <form action="update_video.php?vid=<?php echo $video['vid']; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="vid" value="<?php echo $video['vid']; ?>">
            
            <label for="category">Category :</label>
            <select id="category" name="category" required>
                    <option value="<?php echo $video['category']; ?>"><?php echo $video['category']; ?></option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></option>
                    <?php endforeach; ?>
            </select>

            <label for="title">Title :</label>
            <input type="text" id="title" name="title" value="<?php echo $video['title']; ?>" required>

            <label for="description">Description :</label>
            <textarea id="description" name="description" ><?php echo $video['description']; ?></textarea>

            <label for="thumbnail">Thumbnail :</label>
            
            <img src="<?php echo $video['thumbnail']; ?>" alt="Video Thumbnail" class="thumbnail-image">

            <input type="file" id="thumbnail" name="thumbnail" accept="image/*">

            <button type="submit" name="update">Update Video</button>
        </form>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($c);
?>
