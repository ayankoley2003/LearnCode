<?php

include '../../include/db_connection.php';


$sql = "SELECT vid, category, title, description FROM video";
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
            return confirm('Are you sure you want to delete this video?');
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
                        <th>Description</th>
                        <th colspan=2>Action</th>
                    </tr>
                </thead>
                <tbody>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row['vid']."</td>
                <td>".$row['category']."</td>
                <td>".$row['title']."</td>
                <td>".$row['description']."</td>
                <td><a href='update_video.php?vid=".$row['vid']."' class='edit-btn'>Edit</a></td>
                <td>
                    <form action='delete_video.php' method='post' onsubmit='return confirmDeletion();' '>
                        <input type='hidden' name='vid' value='".$row['vid']."'>
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
        <div class='no-videos'>No videos found.</div>
    </body>
    </html>";
}


mysqli_close($c);
?>
