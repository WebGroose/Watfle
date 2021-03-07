<?php
require_once 'config.php';

// 정상적인 접근인지 확인
if (!isset($_POST['user_id']) || !isset($_POST['user_pw'])) {
	$_SESSION['message'] = "비정상적인 접근입니다..!";
	header('location:../index.php');
	exit();
}

session_start();


$userID = $_POST['user_id'];
$userPW = $_POST['user_pw'];

$query = 'select idx, user_id, user_pw from user where user_id = "'.$userID.'";';
$result = mysqli_query($connect, $query);
$user = 0;
while ($row = mysqli_fetch_row($result)) {
	$user = $row;
}

if ($user == 0) {
	$_SESSION['message'] = "없는 아이디입니다..!";
	//header('location:../loginpage.php');
	echo 'if문 들어옴';
	exit();
}

if (!password_verify($userPW, $user[2])) {
	$_SESSION['message'] = "비밀번호가 다릅니다..!";
	//header('location:../loginpage.php');
	exit();
}

$_SESSION['user_idx'] = $user[0];
$_SESSION['message'] = "로그인 성공..!";

//header('location:../index.php');