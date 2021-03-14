<?php

require_once 'server/config.php';

// 정상적인 접근인지 확인
session_start();

if (!isset($_GET['piece']) || !isset($_GET['mediaType'])) {
  $_SESSION['message'] = "비정상적인 접근입니다..!";
  header('location:index.php');
  exit();
}

function curlGET($url) {
  // GET 방식
  $ch = curl_init();                                 //curl 초기화
  curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초 
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함

  $headers = [
    'Content-Type: application/json;charset=utf-8'
  ];

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $response = curl_exec($ch);
  curl_close($ch);

  return json_decode($response);
};

$pieceID = $_GET['piece'];
$mediaType = $_GET['mediaType'];

$pieceDetails = curlGET('https://api.themoviedb.org/3/'.$mediaType.'/'.$pieceID.'?api_key='.$api_key.'&language=ko');
$posterPath = $pieceDetails->poster_path;
$pieceTitle = $mediaType == 'movie' ? $pieceDetails->title : ($mediaType == 'tv' ? $pieceDetails->name : null);
// $pieceGenres = $pieceDetails->genres;
?>
<!DOCTYPE html>

<?php
include 'server/login_check.php';
  session_start();
  if (isset($_SESSION['message'])) {
    echo '<script type="text/javascript">alert("'.$_SESSION['message'].'");</script>';
    unset($_SESSION['message']);
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/piece.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  </head>
  <body>
    <!-- header-->
      <div class="header">
        <div class="global-width">
          <a href="index.php">
            <div class="brand">
              <div class="brand__bar"></div>
              <div class="brand__watfle">Watfle</div>
            </div>
          </a>
          <div class="toggle">
            <a href="#">WAT</a>
            /
            <a href="#">NET</a>

            <!-- <input type="checkbox" id="switch1">
            <label for="switch1" class="round">
              <div class="write">
                <div class="one">NET</div>
                <div class="slice"> / </div>
                <div class="two">WAT</div>
              </div>
            </label> -->
          </div>
          <?php
          if($is_login){
          ?>
          <a href="myaccount.html">
          <?php
          }else{
          ?>
            <a href="loginpage.html">
          <?php
          }
          ?>
            <div class="account-box"></div>
          </a>
          <div class="search-box">
            <div class="search-box__search"></div>
            <input type="text" name="query" placeholder="검색">
			      <ul class="search-list search-list--display-none"></ul>
          </div>
        </div>
      </div>
      <!-- content-->
      <!--top-->
      <div class="content">
        <div class="global-width">
          <div class="top-review">
            <div class="poster-box" style="background-image: url(<?= 'https://image.tmdb.org/t/p/original/'.$posterPath ?>);"></div>
            <div class="review-box">
              <div class="review-box__title">
                <div class="review-box__title__movie-name">✨ <?= $pieceTitle ?> ✨</div>
                <div class="review-box__title__tag">
                  <?php
                  // foreach ($pieceGenres as $value) echo ' #'.$value->name;
                  ?>
                  # 태그1 # 태그2
                </div>
              </div>
              <div class="review-box__content">
                <div class="review-box__title__content">
                  얼마나 그들을 있으며, 그들에게 얼마나 이것이다.
                  천지는 수 만천하의 능히 그들은 없으면, 무엇이 힘차게 힘차게 보라.
                  석가는 평화스러운 구할 붙잡아 그것은 가치를 실현에 것이다. 돋고, 꽃이 광야에서 철환하였는가?
                  뜨고, 대한 그들은 옷을 소금이라 별과 만물은 사람은 영원히 봄바람이다.
                  이상의 그들은 용기가 너의 인간의 피어나기 주는 이것이다. 인생을 전인 커다란 커다란 있는가?
                  생의 튼튼하며, 구하기 싸인 장식하는 하였으며, 그림자는 것이다. 수 만물은 보이는 아니더면, 있으랴? 투명하되 것은 하는 대중을 위하여, 황금시대다.
                </div>
                <div class="review-box__title__name">by_minjeong</div>
              </div>
            </div>
          </div>
        <!-- middle-->
          <div class="middle-review">
            <form action="server/write.php" method="POST" class="writer-box">
              <textarea name="content" class="writer__text" placeholder="해당 영화의 리뷰를 작성하세요!" rows="5" cols="90"></textarea>
              <div class="write_review">
                <div class="star-wrap"><br>
                  <span class="star-label">나의 별점: </span>
                  <span class="star">
                    <div id="star-01" class="item-star">★</div>
                    <div id="star-02" class="item-star">★</div>
                    <div id="star-03" class="item-star">★</div>
                    <div id="star-04" class="item-star">★</div>
                    <div id="star-05" class="item-star">★</div>
                  </span><br><br>
                </div>
                <input type="hidden" name="star_rate" value="0">
              </div>
              <input type="hidden" name="piece" value="<?= $pieceID ?>">
              <input type="hidden" name="mediaType" value="<?= $mediaType ?>">
              <input name="submit_insert_review" type="submit" value="📨" class="writer__button">
            </form>
          </div>
        <!--bottom-->
          <div class="bottom-review">
            <div class="sort">
              <a href="#">좋아요순 </a>
              /
              <a href="#"> 최신순</a>
            </div>

            <ul class="review">
                <!-- example of review

                <li class="review-total">
                <div class="front">
                    <div class="review-id">✍🏻 min jeong</div>
                    <div class="review-tag">#Romantic #Musical</div>
                    <div class="review-star">🌟 4 / 5</div>
                </div>
                <div class="back">
                  <div class="review-content">
                    얼마나 그들을 있으며, 그들에게 얼마나 이것이다.
                    천지는 수 만천하의 능히 그들은 없으면, 무엇이 힘차게 힘차게 보라.
                    석가는 평화스러운 구할 붙잡아 그것은 가치를 실현에 것이다. 돋고, 꽃이 광야에서 철환하였는가?
                    뜨고, 대한 그들은 옷을 소금이라 별과 만물은 사람은 영원히 봄바람이다.
                    얼마나 그들을 있으며, 그들에게 얼마나 이것이다.<br>
                    천지는 수 만천하의 능히 그들은 없으면, 무엇이 힘차게 힘차게 보라.
                    석가는 평화스러운 구할 붙잡아 그것은 가치를 실현에 것이다. 돋고, 꽃이 광야에서 철환하였는가?
                    뜨고, 대한 그들은 옷을 소금이라 별과 만물은 사람은 영원히 봄바람이다.<br>
                    얼마나 그들을 있으며, 그들에게 얼마나 이것이다.
                    천지는 수 만천하의 능히 그들은 없으면, 무엇이 힘차게 힘차게 보라.
                    석가는 평화스러운 구할 붙잡아 그것은 가치를 실현에 것이다. 돋고, 꽃이 광야에서 철환하였는가?
                    뜨고, 대한 그들은 옷을 소금이라 별과 만물은 사람은 영원히 봄바람이다.
                    얼마나 그들을 있으며, 그들에게 얼마나 이것이다.
                  </div>
                  <div class="review-date">
                    <div>2021</div>/<div>02</div>/<div>07</div>
                  </div>
              </div>
                </li> -->
                <?php
                /*$query = 'select user_idx, content, created, rating from review where piece_id = "'.$pieceID.'";'
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_row($result)) {
                  $userID = 'user'.$row[0];
                  $query2 = 'select user_id from user where idx = "'.$row[0].'";'
                  $result2 = mysqli_query($connect, $query2);
                  if ($row2 = mysqli_fetch_row($result2)) $userID = $row2[0];
                  echo '<li class="review-total">
                          <div class="front">
                            ';
                }*/
                ?>

                <li class="review-total">
                <div class="front">
                    <div class="review-id">✍🏻 min jeong</div>
                    <div class="review-tag">#Romantic #Musical</div>
                    <div class="review-star">🌟 4 / 5</div>
                </div>
                <div class="back">
                  <div class="review-content">
                    얼마나 그들을 있으며, 그들에게 얼마나 이것이다.
                    천지는 수 만천하의 능히 그들은 없으면, 무엇이 힘차게 힘차게 보라.
                    석가는 평화스러운 구할 붙잡아 그것은 가치를 실현에 것이다. 돋고, 꽃이 광야에서 철환하였는가?
                    뜨고, 대한 그들은 옷을 소금이라 별과 만물은 사람은 영원히 봄바람이다.
                    얼마나 그들을 있으며, 그들에게 얼마나 이것이다.<br>
                    천지는 수 만천하의 능히 그들은 없으면, 무엇이 힘차게 힘차게 보라.
                    석가는 평화스러운 구할 붙잡아 그것은 가치를 실현에 것이다. 돋고, 꽃이 광야에서 철환하였는가?
                    뜨고, 대한 그들은 옷을 소금이라 별과 만물은 사람은 영원히 봄바람이다.
                  </div>
                  <div class="review-date">
                    <div>2021</div>/<div>02</div>/<div>07</div>
                  </div>
              </div>
                </li>

                <li class="review-total">
                <div class="front">
                    <div class="review-id">✍🏻 min jeong</div>
                    <div class="review-tag">#Romantic #Musical</div>
                    <div class="review-star">🌟 4 / 5</div>
                </div>
                <div class="back">
                  <div class="review-content">
                    얼마나 그들을 있으며, 그들에게 얼마나 이것이다.
                    천지는 수 만천하의 능히 그들은 없으면, 무엇이 힘차게 힘차게 보라.
                    석가는 평화스러운 구할 붙잡아 그것은 가치를 실현에 것이다. 돋고, 꽃이 광야에서 철환하였는가?
                    뜨고, 대한 그들은 옷을 소금이라 별과 만물은 사람은 영원히 봄바람이다.
                    얼마나 그들을 있으며, 그들에게 얼마나 이것이다.<br>
                    천지는 수 만천하의 능히 그들은 없으면, 무엇이 힘차게 힘차게 보라.
                    석가는 평화스러운 구할 붙잡아 그것은 가치를 실현에 것이다. 돋고, 꽃이 광야에서 철환하였는가?
                    뜨고, 대한 그들은 옷을 소금이라 별과 만물은 사람은 영원히 봄바람이다.
                  </div>
                  <div class="review-date">
                    <div>2021</div>/<div>02</div>/<div>07</div>
                  </div>
              </div>
                </li>

            </ul>
          </div>
      </div>
      <div class="footer">
        <div class="global-width">
          <div class="watfle">(주)WATFLE</div>
          <div class="information">
            <div class="date">⏰ [2020-2학기] 겨울방학 아이그루스 웹프로젝트</div>
            <div class="member">
                  <div class="member-person">🌲 팀장: 이호영</div>
                  <div class="member-person">🌱 팀원: 김민경 | 김민정 | 김예진</div>
            </div>
          </div>
          <div class="copy">Copyright &copy; 2021 WATFLE</div>
          </div>
        </div>
<!--    </div>
</div> -->

<script type="text/javascript">
// query selector
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const app = {
  init () {
    app.starRating.stopTwinkle();
    $('.star').addEventListener('mouseover', app.starRating.twinkle);
    $('.star').addEventListener('mouseout', app.starRating.stopTwinkle);
    $('.star').addEventListener('click', app.starRating.rate);
    $$('.item-star').forEach(v => {
      v.addEventListener('mouseover', function () {
        app.starRating.mouseover(this);
      });
    });
  },
  starRating : {
    twinkle () {
      let num = app.starRating.hoverID >= app.starRating.id ? app.starRating.hoverID : app.starRating.id;
      let i = 1;
      for (; i <= num; i++) $('#star-0'+i).classList.add('twinkle');
        for (; i <= 5; i++) $('#star-0'+i).classList.remove('twinkle');
      },
    stopTwinkle () {
      let i = 1;
      for (; i <= app.starRating.id; i++) $('#star-0'+i).classList.add('twinkle');
        for (; i <= 5; i++) $('#star-0'+i).classList.remove('twinkle');
      },
    mouseover (obj) {
      let str = obj.id;
      app.starRating.hoverID = str.replace('star-0', '');
    },
    rate () {
      app.starRating.id = app.starRating.hoverID;
      $('input[name=star_rate]').value = app.starRating.id;
      app.starRating.stopTwinkle();
    },
    hoverID : 0,
    id : $('input[name=star_rate]').value
  }
};
document.addEventListener('DOMContentLoaded', app.init);

axios.defaults.baseURL = 'http://watfle2.dothome.co.kr';

const appp = {
  init () {
    $('input[name=query]').addEventListener('keyup', app.sendQuery);
    $('input[name=query]').addEventListener('focusin', app.showSearchList);
    $('input[name=query]').addEventListener('focusout', app.hideSearchList);
  },
  sendQuery () {
    let query = $('input[name=query]').value;
    if (query == '') {
      $('.search-list').innerHTML = '';
      return;
    }
    if (query == app.searchTemp) return;
    $('.search-list').innerHTML = '<div class="preloader"></div>';
    app.searchNum++;
    axios.get('/server/search.php?num='+app.searchNum+'&query='+query)
    .then(function (response) {
      console.log(response.data);
      if (app.searchNum != response.data.num) return;
      let query = $('input[name=query]').value;
      if (query == '') {
        $('.search-list').innerHTML = '';
        return;
      }
      app.searchNum = 0;
      let result = response.data.result;
      let resultTag = '';
      if (result.length == 0) resultTag = '검색 결과가 없습니다 ㅠ0ㅠ';
      else result.forEach(v => {
        let providerTag = '';
        v.provider.forEach(w => { providerTag += '<span class="search-list__tag">'+w+'</span>'; });
        resultTag += '<li><a href="piece.php?piece='+v.id+'" class="search-list__item-link">'+v.title+'<span>'+providerTag+'</span></a></li>'; });
        $('.search-list').innerHTML = resultTag;
        app.searchTemp = query;
      })
    .catch(function (error) {
      console.log(error);
    });
  },
  showSearchList () {
    console.log('focusin');
    $('.search-list').classList.remove('search-list--display-none');
  },
  hideSearchList () {
    console.log('focusout');
    setTimeout(() => { $('.search-list').classList.add('search-list--display-none'); }, 100);
  },
  searchTemp: '',
  searchNum: 0
};

document.addEventListener('DOMContentLoaded', appp.init);
</script>
  </body>
</html>
