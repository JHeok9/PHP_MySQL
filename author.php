<?php
$conn = mysqli_connect("localhost", "testuser", "12345", "test");
$sql = "select * from author";
$result = mysqli_query($conn, $sql);

$author_list = '';
while($row = mysqli_fetch_array($result)){
    $filterde = array(
        'id' => htmlspecialchars($row['id']),
        'name' => htmlspecialchars($row['name']),
        'profile' => htmlspecialchars($row['profile'])
    );
    $author_list .= '<tr>';
    $author_list .= '<td>'.$filterde['id'].'</td>';
    $author_list .= '<td>'.$filterde['name'].'</td>';
    $author_list .= '<td>'.$filterde['profile'].'</td>';
    $author_list .= '</tr>';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>WEB</title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <p><a href="index.php">topic</a></p>
        <table border="1">
            <tr>
                <td>id</td>
                <td>name</td>
                <td>profile</td>
            </tr>
            <?=$author_list?>
        </table>
        <form action="process_create_author.php" method="post">
            <p><input type="text" name="name" placeholder="name"></p>
            <p><textarea name="profile" placeholder="profile"></textarea></p>
            <p><input type="submit" value="Create author"></p>
        </form>
    </body>
</html>