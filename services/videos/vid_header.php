<?php
include '../../include/db_connection.php';

$sql1 = "SELECT category_id, category_name FROM categories";
$result1 = mysqli_query($c, $sql1);
$categories = array();
while ($row1 = mysqli_fetch_assoc($result1)) {
    $categories[] = $row1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hf_style.css">
</head>

<header id="header">
		<!-- First Navbar -->
    <nav class="nav">
        <div class="logo">
            <img src="" alt="Logo 1">
        </div>
        <h1 style='color:white'>Available Videos </h1>
        <ul>
            <li><a href="videos.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="favourites.php">Favourites</a></li>
        </ul>
        <div class="srch">
        <form action="search.php" method="get">
                <label> <input type="text" name="query" id="search-bar" placeholder="Search videos..." >
                    <input type="submit" id="search-button" value="Search" placeholder="Search courses..." >
            </form>
        </div>
        
    </nav>

    <!-- Second Navbar -->
    <nav class="second-nav">
        <div class="logo">
           
        </div>
        <ul>
            <?php foreach ($categories as $category): ?>
                <li><a href="search.php?category=<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?></a></li>
            <?php endforeach; ?>
            
        </ul>
        
        </div>
       
    </nav>
	</header>
<html>
       