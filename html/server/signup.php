<?php

// 정상적인 접근인지 확인
session_start();
if (!isset($_POST['user_id']) || !isset($_POST['user_pw'])) {
	$_SESSION['message'] = "비정상적인 접근입니다..!";
	header('location:../index.php');
	exit();
}

require_once 'config.php';

$userID = $_POST['user_id'];
$userPW = password_hash($_POST['user_pw'], PASSWORD_DEFAULT);

$query = 'select idx from user where user_id = "'.$userID.'";';
$result = mysqli_query($connect, $query);
if ($row = mysqli_fetch_row($result)) {
	$_SESSION['message'] = "이미 있는 아이디입니다..!";
	header('location:../signuppage.php');
	exit();
}

$query = 'insert into user (user_id, user_pw) values ("'.$userID.'", "'.$userPW.'");';
$result = mysqli_query($connect, $query);

if (!$result) {
	$_SESSION['message'] = "회원가입 오류..!";
	header('location:../signuppage.php');
	exit();
}

$query = 'select idx from user where user_id = "'.$userID.'";';
$result = mysqli_query($connect, $query);
$user = 0;
while ($row = mysqli_fetch_row($result)) {
	$user = $row;
}

$_SESSION['message'] = "회원가입 성공..!";
$_SESSION['user_idx'] = $user[0];

header('location:../index.php');