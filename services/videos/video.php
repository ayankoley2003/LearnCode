<?php
session_start();

$username=$_SESSION["username"];
$password=$_SESSION["password"];
include '../../include/db_connection.php';

// Fetch video ID from query parameter
$vid = $_GET['vid'];

// Query database to get the specific video details
$sql = "SELECT vid, link,category, title, description, thumbnail FROM video WHERE vid = $vid";
$result = mysqli_query($c, $sql);
$video = mysqli_fetch_assoc($result);
$category=$video['category'];
// Query to fetch other videos for the sidebar
$sidebar_sql = "SELECT vid, title, thumbnail FROM video WHERE vid != $vid and category='$category' ";
$sidebar_result = mysqli_query($c, $sidebar_sql);

$sidebar_videos = array();
while ($row = mysqli_fetch_assoc($sidebar_result)) {
    $sidebar_videos[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $video['title']; ?></title>
    <link rel="stylesheet" href="style3.css">
    <script>
        function addToFavourites(event) {
            event.preventDefault();
            if (confirm("Are you sure you want to add this video to your favourites?")) {
                event.target.closest("form").submit();
                event.target.innerText = "Remove from Favorites";
            }
        }
    </script>
</head>
<body>
    <?php include 'vid_header.php';?>
    <main class="main-content">
        <div class="video-page">
            <iframe src="<?php echo $video['link']; ?>" frameborder="0" allowfullscreen></iframe>
            <div class="video-title">
                <h2><?php echo $video['title']; ?></h2>
                <form action="addtofav.php" method="post">
                    <input type="hidden" name="vid" value="<?php echo $video['vid']; ?>">
                    <button type="submit" class="favourite-button" onclick="addToFavourites(event)">Add to Favourites</button>
                </form>
            </div>
            <p><?php echo $video['description']; ?></p>
        </div>
        <aside class="sidebar">
            <h3>Next Videos</h3>
            <?php foreach ($sidebar_videos as $sidebar_video) : ?>
                <div class="video-card">
                    <a href="video.php?vid=<?php echo $sidebar_video['vid']; ?>">
                        <img src="<?php echo $sidebar_video['thumbnail']; ?>" alt="Thumbnail">
                    </a>
                    <div>
                        <h4><a href="video.php?vid=<?php echo $sidebar_video['vid']; ?>"><?php echo $sidebar_video['title']; ?></a></h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </aside>
    </main>
    <?php include 'vid_footer.php';?>
</body>
</html>



<?php
// Close the database connection
mysqli_close($c);
?>
