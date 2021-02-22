<meta charset="utf-8">
<?php
require_once 'config.php';

$userID = $_POST['user_id'];
$userPW = password_hash($_POST['user_pw'], PASSWORD_DEFAULT);

$query = 'select idx from userdata where user_id = "'.$userID.'";';
$result = mysqli_query($connect, $query);
if ($row = mysqli_fetch_row($result)) {
	echo "아이디 중복";
	exit();
}

$query = 'insert into userdata (user_id, user_pw) values ("'.$userID.'", "'.$userPW.'");';
$result = mysqli_query($connect, $query);
echo "회원가입 성공";