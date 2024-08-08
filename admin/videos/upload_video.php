<?php
include '../../include/db_connection.php';
$sql = "SELECT category_id, category_name FROM categories";
$result = mysqli_query($c, $sql);
$categories = array();
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}
session_start();
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = mysqli_real_escape_string($c, $_POST['category']);
    $title = mysqli_real_escape_string($c, $_POST['title']);
    $description = mysqli_real_escape_string($c, $_POST['description']);
    
    // Handle File Upload
    $video_file = '';
    if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] == 0) {
        $video_file = '../../admin/videos/local_videos/' . basename($_FILES['video_file']['name']);
        if (!move_uploaded_file($_FILES['video_file']['tmp_name'], $video_file)) {
            $_SESSION['message'] = "Failed to upload video file.";
        }
    }
    $video_file = mysqli_real_escape_string($c, $video_file);

    $thumbnail = '';
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $thumbnail = '../../admin/videos/thumbnail/' . basename($_FILES['thumbnail']['name']);
        if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnail)) {
            $_SESSION['message'] = "Failed to upload thumbnail image.";
        }
    }
    $thumbnail = mysqli_real_escape_string($c, $thumbnail);

    if (empty($_SESSION['message'])) {
        $sql = "INSERT INTO video (link, category, title, description, thumbnail) 
                VALUES ('$video_file', '$category', '$title', '$description', '$thumbnail');";

        if (mysqli_query($c, $sql)) {
            $_SESSION['message'] = "Video uploaded successfully.";
        } else {
            $_SESSION['message'] = "Error: " . mysqli_error($c);
        }
    }

    mysqli_close($c);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Videos</title>
    <link rel="stylesheet" href="styles4.css">
</head>
<body>
    <?php if (isset($_SESSION['message'])) : ?>
        <script type="text/javascript">
            alert("<?php echo $_SESSION['message']; ?>");
        </script>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <div class="container">
        <h2>Upload Videos</h2>
        <form action="upload_video.php" method="POST" enctype="multipart/form-data">
            <label for="category">Category :</label>
            <select id="category" name="category" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></option>
                    <?php endforeach; ?>
            </select>

            <label for="title">Title :</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>

            <label for="video_file">Video File:</label>
            <input type="file" id="video_file" name="video_file" accept="video/*" required>

            <label for="thumbnail">Thumbnail :</label>
            <input type="file" id="thumbnail" name="thumbnail" accept="image/*" required>

            <button type="submit">Upload Video</button>
        </form>
    </div>
</body>
</html>
