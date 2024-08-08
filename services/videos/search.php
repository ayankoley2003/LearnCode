<?php
include '../../include/db_connection.php';


if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}



$query = '';
$category = '';
if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($c, $_GET['query']);
    $sql = "SELECT * FROM video WHERE title LIKE '%$query%' OR description LIKE '%$query%' ";
    $result = mysqli_query($c, $sql);

    $videos = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $videos[] = $row;
        }
    } 
}
if (isset($_GET['category'])) {

    $category=$_GET['category'];
    $sql = "SELECT * FROM video WHERE category='$category' ";
    $result = mysqli_query($c, $sql);

    $videos = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $videos[] = $row;
        }
    } 
}
mysqli_close($c);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'vid_header.php';?>
    <main>
        <div class="video-container">
        <?php if (!empty($videos)) : ?>
            <?php foreach ($videos as $video) : ?>
                <div class="video-card">
                    <a href="video.php?vid=<?php echo $video['vid']; ?>">
                        <img src="<?php echo $video['thumbnail']; ?>" alt="Video Thumbnail">
                    </a>
                    <h2><a href="video.php?vid=<?php echo $video['vid']; ?>"><?php echo $video['title']; ?></a></h2>
                    <p><?php echo $video['description']; ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No results found for </p>
        <?php endif; ?>
        </div>
    </main>
</body>
</html>
