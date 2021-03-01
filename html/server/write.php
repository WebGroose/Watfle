<?php
require_once 'config.php';
include 'login_check.php';
session_start();
               
                
$idx = $_SESSION['user_idx'];           //Writer idx
$title = 'title';                  		//Title
$content = $_POST['content'];           //Content
$movie = $_POST['piece'];               //영화명
$rating = 5;              				//별점
 
$query = 'insert into review (user_idx, title, content, piece_id, rating) values ("'.$idx.'", "'.$title.'", "'.$content.'", "'.$movie.'", "'.$rating.'");';
$result = mysqli_query($connect, $query);

if($result){
    $_SESSION['message'] = "리뷰가 등록되었습니다.";
	header('location:../piece.html?piece='.$movie);
}
else{
    $_SESSION['message'] = "리뷰 등록에 실패하였습니다.";
	header('location:../piece.html?piece='.$movie);
}
 
mysqli_close($connect);
?>

