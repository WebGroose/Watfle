<meta charset="utf-8">
<?php
require_once 'config.php';
session_start();
               
                
 $id = $_SESSION['user_id'];                      //Writer
$title = $_GET['title'];                  //Title
$content = $_GET['content'];              //Content
$movie = $_GET['piece'];                //영화명
$rating = $_GET['rating'];              //별점
 
$URL = './index.php';                   //return URL
 
 
$query = 'insert into review (user_idx ,title, content, piece_id, rating) values('.$id.','.$title.', '.$content.', '.$movie.', '.$rating.' );';
 
 
$result = mysqli_query($connect, $query);
if($result){
    $_SESSION['message'] = "리뷰가 등록되었습니다.";
	header('location:piece.html?piece='.$movie);
}
else{
    $_SESSION['message'] = "리뷰 등록에 실패하였습니다.";
	header('location:piece.html?piece='.$movie);
}
 
mysqli_close($connect);
?>

