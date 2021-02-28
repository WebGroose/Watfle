<?php

// 정상적인 접근인지 확인
if (!isset($_POST['user_id']) || !isset($_POST['user_pw'])) {
	header('location:index.html');
	exit();
}

require_once 'config.php';
session_start();

$userID = $_POST['user_id'];
$userPW = password_hash($_POST['user_pw'], PASSWORD_DEFAULT);

$query = 'select idx from user where user_id = "'.$userID.'";';
$result = mysqli_query($connect, $query);
if ($row = mysqli_fetch_row($result)) {
	$_SESSION['message'] = "이미 있는 아이디입니다..!";
	header('location:index.html');
	exit();	
}

$query = 'insert into user (user_id, user_pw) values ("'.$userID.'", "'.$userPW.'");';
$result = mysqli_query($connect, $query);

var_dump($result);// $result 확인용

/*
$_SESSION['user_id'] = $userID;

header('location:index.html');
*/