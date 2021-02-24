<meta charset="utf-8">
<?php
require_once 'config.php';
               
                
                $id = $_GET['name'];                      //Writer
                $title = $_GET['title'];                  //Title
                $content = $_GET['content'];              //Content
                $movie = $_GET['piece'];                //영화명
                $rating = $_GET['rating'];              //별점
 
                $URL = './index.php';                   //return URL
 
 
                $query = 'insert into review (user_idx ,title, content, piece_id, rating) values('.$id.','.$title.', '.$content.', '.$movie.', '.$rating.' );';
 
 
                $result = mysqli_query($connect, $query);
                if($result){
                    echo '<script>
                    alert("<?php echo "리뷰가 등록되었습니다."?>");
                    location.replace("<?php echo $URL?>");
                </script>';
                }
                else{
                        echo "FAIL";
                }
 
                mysqli_close($connect);
?>

