<?php
$conn = mysqli_connect("localhost", "testuser", "12345", "test");
$sql = "select * from topic";
$result = mysqli_query($conn, $sql);
$list ='';
while($row = mysqli_fetch_array($result)){
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
    'title' => "Welcome",
    'description' => "Hello, web",
);

$update_link = '';
$delete_link = '';
$author = '';

if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "select * from topic t left join author a on t.author_id = a.id where t.id = {$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $article['name'] = htmlspecialchars($row['name']);

    $update_link = "<a href=\"update.php?id={$_GET['id']}\">update</a>";
    $delete_link = '
        <form action="process_delete.php" method="post">
          <input type="hidden" name="id" value="'.$_GET['id'].'">
          <input type="submit" value="delete">
        </form>
    ';
    $author = "<p>by {$article['name']}</p>";
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
        <p><a href="author.php">author</a></p>
        <ol>
            <?=$list?>
        </ol>
        <p><a href="create.php">create</a></p>
        <?=$update_link?>
        <?=$delete_link?>
        <h2><?=$article['title']?></h2>
        <?=$article['description']?>
        <?=$author?>
    </body>
</html>