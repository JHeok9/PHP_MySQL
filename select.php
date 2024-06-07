<?php
$conn = mysqli_connect("localhost", "testuser", "12345", "test");
$sql = "select * from topic";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
{
    echo '<h2>'.$row['title'].'</h2>';
    echo $row['description'];
}

?>