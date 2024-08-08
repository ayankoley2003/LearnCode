<?php
include '../../include/db_connection.php';
session_start();
$message = "";
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and escape special characters
    $category = mysqli_real_escape_string($c, $_POST['category']);
    $title = mysqli_real_escape_string($c, $_POST['title']);
    $author = mysqli_real_escape_string($c, $_POST['author']);
    $description = mysqli_real_escape_string($c, $_POST['description']);

    $file_path = '';
    if (isset($_FILES['file_path']) && $_FILES['file_path']['error'] == 0) {
        $file_path = '../../admin/ebooks/local_books/' . basename($_FILES['file_path']['name']);
        
        if (!move_uploaded_file($_FILES['file_path']['tmp_name'], $file_path)) {
            $_SESSION['message'] = "Failed to upload ebook file.";
        }
    }
    $file_path = mysqli_real_escape_string($c, $file_path);
    
    $front_page_img = '';
    if (isset($_FILES['front_page_img']) && $_FILES['front_page_img']['error'] == 0) {
        $front_page_img = '../../admin/ebooks/front_page/' . basename($_FILES['front_page_img']['name']);
        if (!move_uploaded_file($_FILES['front_page_img']['tmp_name'], $front_page_img)) {
            $_SESSION['message'] = "Failed to upload front page image.";
        }
    }
    $front_page_img = mysqli_real_escape_string($c, $front_page_img);
    
    if (empty($_SESSION['message'])) {
        $sql = "INSERT INTO ebooks (category, title, author, description, file_path, front_page_img) 
                VALUES ('$category', '$title', '$author', '$description', '$file_path', '$front_page_img');";

        if (mysqli_query($c, $sql)) {
            $_SESSION['message'] = "Ebook uploaded successfully.";
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
    <link rel="stylesheet" href="../style3.css">
    <title>Upload Books</title>
</head>
<body>
    <?php if (isset($_SESSION['message'])) : ?>
        <script type="text/javascript">
            alert("<?php echo $_SESSION['message']; ?>");
        </script>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <div class="container">
        <h2>Upload EBooks</h2>
        <form action="upload_ebook.php" method="POST" enctype="multipart/form-data">
            <label for="category">Category :</label>
            <select id="category" name="category" required>
                <option value="others">Others</option>
                <option value="c">C</option>
                <option value="python">Python</option>
                <option value="java">Java</option>
                <option value="mysql">MySQL</option>
                <option value="os">Operating System</option>
                <option value="dbms">DBMS</option>
                <option value="sw">Software Engineering</option>
                <option value="ds">Data Structure</option>
                <option value="algorithm">Algorithm</option>
                <option value="system_design">System Design</option>
                <option value="Computer_architecture"> Computer architecture</option>
                <option value="networking"> Data Communication & Networking</option>
                <option value="Computational_Mathematics">Computational Mathematics</option>
                <option value="automata">Automata</option>
                <option value="multimedia">Multimedia</option>
            </select>

            <label for="title">Title :</label>
            <input type="text" id="title" name="title" required>

            <label for="author">Author :</label>
            <input type="text" id="author" name="author" required>

            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>

            <label for="file_path">Ebook File ( .pdf ) :</label>
            <input type="file" id="file_path" name="file_path" accept=".pdf" required>

            <label for="front_page_img">Front Page Image :</label>
            <input type="file" id="front_page_img" name="front_page_img" accept="image/*" required>

            <button type="submit">Upload Book</button>
        </form>
    </div>
</body>
</html>
