<?php

include ('connect_db.php');
include ('header.php');

$result=$mysqli->query("SELECT * FROM posts ORDER BY date DESC");

if(!$result){
    die("Cannot read `posts` table from MySQL");
}

echo "<h4>POSTS</h4>";
echo "<table border='2'>\n";
echo "<tr><th>Post Title</th><th>Post Content</th><th>Publish Date and Time</th>
<th>Edit Post</th><th>Delete Post</th></tr>";
while ($row=$result->fetch_assoc()){
    $title=htmlspecialchars($row['title']);
    $content=htmlspecialchars($row['content']);
    $date=htmlspecialchars($row['date']);
    $id=htmlspecialchars($row['post_id']);
    echo "<tr><td>$title</td><td>$content</td><td>$date</td>
    <td><a href='editPost.php?id=$id'>Edit</a></td>
    <td><a href='deletePost.php?id=$id'>Delete</a></td></tr>";
}
echo "</table>";

?>