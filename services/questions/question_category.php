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
<html>
    <head>
        <title>Question Set</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <div class="title">
        <span>Question Set</span>
    </div>
    <div class="title2" id="title2">
        <span>Popular Subjects</span>
        <div class="shortdesc2">
            <p>click the icons to view the Questions</p>
        </div>
    </div>
    <div class="course">
        <center>
            <div class="cbox">
                
                <?php foreach ($categories as $category): ?>
                    <div class="det"><a href="question_set.php?category=<?php echo $category['category_name']; ?>"><img src="icons_img/book.png"><?php echo $category['category_name']; ?></a></div>
                <?php endforeach; ?>
            </div>
        </center>
    </div>


</body>



</html>
