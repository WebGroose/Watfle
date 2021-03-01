<?php

session_start();

unset($_SESSION['user_id']);

$_SESSION['message'] = "로그아웃 성공..!";