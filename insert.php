<?php
$conn = mysqli_connect("localhost", "testuser", "12345", "test");
$sql = "insert into topic
(title, description, created)
values
('MySQL', 'MySQL is...', NOW())";
$result = mysqli_query($conn, $sql);

if($result === false){
    echo mysqli_error($conn);
}
?>