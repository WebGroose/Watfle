<?php

// 정상적인 접근인지 확인
if (!isset($_POST['user_id']) || !isset($_POST['user_id'])) {
	header('location:index.html');
	exit();
}

require_once 'config.php';
session_start();

$userID = $_POST['user_id'];
$userPW = $_POST['user_pw'];

$query = 'select user_id, user_pw from user where user_id = "'.$userID.'";';
$result = mysqli_query($connect, $query);
$user = 0;
while ($row = mysqli_fetch_row($result)) {
	$user = $row;
}

if ($user == 0) {
	$_SESSION['message'] = "없는 아이디입니다..!";
	header('location:index.html');
	exit();
}

if (!password_verify($userPW, $user[1])) {
	$_SESSION['message'] = "비밀번호가 다릅니다..!";
	header('location:index.html');
	exit();
}

header('location:index.html');