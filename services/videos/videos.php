<?php
session_start();

$username=$_SESSION["username"];
$password=$_SESSION["password"];

include '../../include/db_connection.php';




// Query database to get videos
$sql = "SELECT vid, link, title, description, thumbnail FROM video";
$result = mysqli_query($c, $sql);

$videos = array();

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $videos[] = $row;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Videos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'vid_header.php';?>
    <main>
        <div class="video-container">
        <?php foreach ($videos as $video) : ?>
            <div class="video-card">
                <a href="video.php?vid=<?php echo $video['vid']; ?>">
                    <img src="<?php echo $video['thumbnail']; ?>" alt="Video Thumbnail">
                </a>
                <h2><a href="video.php?vid=<?php echo $video['vid']; ?>"><?php echo $video['title']; ?></a></h2>
                <p><?php echo $video['description']; ?></p>
            </div>
        <?php endforeach; ?>
        </div>
    </main>
    <?php include 'vid_footer.php';?>
</body>
</html>

