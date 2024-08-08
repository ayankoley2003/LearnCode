<?php
include '../../include/db_connection.php';
$category=$_GET['category'];
// Query database to get books
$sql = "SELECT id, title, author, description, file_path,front_page_img FROM ebooks where category='$category'";
$result = mysqli_query($c, $sql);

$books = array();

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Available Books</h1>
        <?php foreach ($books as $book) : ?>
            <div class="book">
                <img src="<?php echo $book["front_page_img"] ?>" alt="Book Cover">
                <div class="book-content">
                    <h2 class="book-title"><?php echo $book["title"]; ?></h2>
                    <p class="book-author"><?php echo $book["author"]; ?></p>
                    <p class="book-description"><?php echo $book["description"]; ?></p>
                    <div class="book-actions">
                        <a href="<?php echo $book["file_path"] ?>" target="_blank" download>Download</a>
                        <a href="<?php echo $book["file_path"] ?>">View</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
