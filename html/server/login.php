<meta charset="utf-8">
<?php
require_once 'config.php';

$userID = $_POST['user_id'];
$userPW = $_POST['user_pw'];

$query = 'select user_id, user_pw from userdata where user_id = "'.$userID.'";';
$result = mysqli_query($connect, $query);
$userdata = '';
while ($row = mysqli_fetch_row($result)) {
	$userdata = $row;
}

if ($userdata == '') {
	echo "아이디가 없음";
	exit();
}

if (!password_verify($userPW, $userdata[1])) {
	echo "비번이 다름";
	exit();
}

echo "로그인 성공";