<?php

include '../../include/db_connection.php';


$sql = "SELECT id, category, title,author, description FROM ebooks";
$result = mysqli_query($c, $sql);


if (mysqli_num_rows($result) > 0) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Video List</title>
        <link rel='stylesheet' href='styles4.css'>
        <script type='text/javascript'>
        function confirmDeletion() {
            return confirm('Are you sure you want to delete this book?');
        }
        </script>
    </head>
    <body>
        <div class='table-container'>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['category']."</td>
                <td>".$row['title']."</td>
                <td>".$row['author']."</td>
                <td>".$row['description']."</td>
                <td>
                    <form action='delete_ebook.php' method='post' onsubmit='return confirmDeletion();' '>
                        <input type='hidden' name='id' value='".$row['id']."'>
                        <button type='submit' class='edit-btn'>Delete</button>
                    </form>
                </td>
            </tr>";
    }
    echo "</tbody>
            </table>
        </div>
    </body>
    </html>";
} else {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Video List</title>
        <link rel='stylesheet' href='styles4.css'>
    </head>
    <body>
        <div class='no-videos'>No Books found.</div>
    </body>
    </html>";
}


mysqli_close($c);
?>
