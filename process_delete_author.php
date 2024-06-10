<?php
$conn = mysqli_connect("localhost", "testuser", "12345", "test");

settype($_POST['id'],'integer');
$filtered = array(
    'id' => mysqli_real_escape_string($conn,$_POST['id']),
);

$sql = "delete from author where id = {$filtered['id']}";
$result = mysqli_query($conn, $sql);

if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
    error_log(mysqli_error($conn));
} else {
    header("Location: author.php");
}
?>