<?php
require_once 'config.php';
include 'login_check.php';
session_start();

if (
	!isset($_SESSION['user_idx'])||
	!isset($_POST['content'])||
	!isset($_POST['piece'])||
	!isset($_POST['star_rate'])||
	!isset($_POST['mediaType'])
) {
  $_SESSION['message'] = "비정상적인 접근입니다..!";
  header('location:../index.php');
  exit();
}
                
$idx = $_SESSION['user_idx'];           //Writer idx
$title = 'title';                  		//Title
$content = $_POST['content'];           //Content
$movie = $_POST['piece'];               //영화명
$rating = $_POST['star_rate'];          //별점
$mediaType = $_POST['mediaType'];		//종류
 
$query = 'insert into review (user_idx, title, content, piece_id, rating) values ("'.$idx.'", "'.$title.'", "'.$content.'", "'.$movie.'", "'.$rating.'");';
$result = mysqli_query($connect, $query);

if($result){
    $_SESSION['message'] = "리뷰가 등록되었습니다.";
	header('location:../piece.php?mediaType='.$mediaType.'&piece='.$movie);
}
else{
    $_SESSION['message'] = "리뷰 등록에 실패하였습니다.";
	header('location:../piece.php?mediaType='.$mediaType.'&piece='.$movie);
}

