<?php

///display
$conn = new mysqli("localhost", "root", "", "your_database_name");
$query = "SELECT * FROM videos";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
    echo "<video controls width='320'>
            <source src='" . htmlspecialchars($row['file_path']) . "' type='video/mp4'>
          </video><hr>";
}
$conn->close();

?>
