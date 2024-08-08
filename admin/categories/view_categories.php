<?php
include '../../include/db_connection.php';

// Check connection
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch courses from the database
$sql = "SELECT * FROM categories";
$result = mysqli_query($c, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Existing Categories</title>
        <link rel='stylesheet' href='style.css'>
        <script type='text/javascript'>
        function confirmDeletion() {
            return confirm('Are you sure you want to delete this category?');
        }
        </script>
    </head>
    <header>
        <div class='header-content'>
            <h1>Existing Categories</h1>
           
        </div>
</header>
    <body>
        <div class='table-container'>
            <table>
                <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Actions</th></tr>
                </thead>
                <tbody>";
    
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['category_id'] . '</td>';
            echo '<td>' . $row['category_name'] . '</td>';
            echo "
                <td>
                    <form action='delete_category.php' method='post' onsubmit='return confirmDeletion();' style='display:inline;'>
                        <input type='hidden' name='category_id' value='".$row['category_id']."'>
                        <button type='submit' class='edit-btn'>Delete</button>
                    </form>
                </td>";
            echo '</tr>';
        }
    echo "</tbody>
            </table>
        </div>
    </body>
    <footer>
        <div class='footer-content'>
            <p>Copyright © 2024 Created By Shirshendu sen , All Rights Reserved.</p>
            <ul>
                <li><a href='#'>Privacy Policy</a></li>
                <li><a href='#'>Terms of Service</a></li>
            </ul>
        </div>
    </footer>
    </html>";
    
} else {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Video List</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <div class='no-category'>No Category found.</div>
    </body>
    </html>";
}