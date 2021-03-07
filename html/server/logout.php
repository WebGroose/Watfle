<?php

session_start();

unset($_SESSION['user_idx']);

$_SESSION['message'] = "로그아웃 성공..!";

header('location:../index.php');