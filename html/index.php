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
  <link rel="stylesheet" href="css/index.css">
  <!-- axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
  <!-- header-->
  <div class="header">
    <div class="global-width">
      <a href="#">
        <div class="brand">
          <div class="brand__bar"></div>
          <div class="brand__watfle">Watfle</div>
        </div>
      </a>
      <div class="toggle">
        <span id="watcha" class="toggle-item">WAT</span>
        /
        <span id="netflix" class="toggle-item">NET</span>
            <!--
            <input type="checkbox" id="switch1">
            <label for="switch1" class="round">
              <div class="write">
                <div class="one">NET</div>
                <div class="slice"> / </div>
                <div class="two">WAT</div>
              </div>
            </label>-->
          </div><!-- 
          ($is_login)
          <div class="account-box"></div> -->
          <div class="profile-wrapper">
            <div class="profile-img"></div>
            <div class="profile-btn">v</div>
            <div class="profile-popup">
              <div class="profile-info">
                <div class="profile-info__img"></div>
                <div class="profile-info__id"></div>
              </div>
              <ul>
                <li><a href="myaccount.html">내 정보</a></li>
                <li><a href="server/logout.php">로그아웃</a></li>
              </ul>
            </div>
          </div>
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
          <div class="top-content">
            <a href="#">
              <div class="poster-box">
                <div class="poster-box__crown"></div>
                <div class="poster-box__poster"></div>
              </div>
            </a>
            <div class="review-box">
              <div class="review-box__title">🎉 최고의 리뷰 한줄평</div>
              <div class="review-box__content">
                열락의 인생의 불어 원대하고, 봄바람이다. 주며, 그들의 고행을 이성은 방지하는 뛰노는 하는 수 것이다.
                투명하되 얼마나 광야에서 인도하겠다는 내려온 이 실로 속에서 말이다. 할지니, 무엇을 불어 우리 이 노년에게서 모래뿐일 것이다. 가는 때까지 곳으로 일월과 풍부하게 아니더면, 고행을 청춘 길지 칼이다.
                힘차게 끓는 할지라도 만물은 그들은 뛰노는 보이는 일월과 부패뿐이다.
                미묘한 놀이 열락의 것이다. 고동을 밝은 풀밭에 끓는다. 스며들어 용기가 있는 방지하는 할지니, 사람은 불어 아니다.
              </div>
            </div>
          </div>
          <div class="bottom-content">
            <div class="bottom-content__title">The Best Film</div>
            <div class="film-box">
              <a href="#"><div class="film-box__poster film-box__poster--1"></div></a>
              <a href="#"><div class="film-box__poster film-box__poster--2"></div></a>
              <a href="#"><div class="film-box__poster film-box__poster--3"></div></a>
              <a href="#"><div class="film-box__poster film-box__poster--4"></div></a>
            </div>
          </div>
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
          </div>
          <div class="copy">Copyright &copy; 2021 WATFLE</div>
        </div>
      </div>
      <script type="text/javascript">
        /*토글*/
    /*var toggle=false;

      btn.addEventListener('click',function(){
        toggle = !toggle;
        if(toggle==true) selector.classList.add('on');
        else selector.classList.remove('on');
      },false);*/

      const $ = document.querySelector.bind(document);
      const $$ = document.querySelectorAll.bind(document);

      axios.defaults.baseURL = 'http://watfle2.dothome.co.kr';

      const app = {
       init () {
        $$('.toggle-item').forEach(v => {
          v.addEventListener('click', () => {
            app.values.toggleValue[v.id] = !app.values.toggleValue[v.id];
            app.toggle();
          });
        });

        $('input[name=query]').addEventListener('keyup', app.sendQuery);
        $('input[name=query]').addEventListener('focusin', app.showSearchList);
        $('input[name=query]').addEventListener('focusout', app.hideSearchList);

        app.toggle();
      },
      toggle () {
        for (const property in app.values.toggleValue) {
          if (app.values.toggleValue[property]) $('#'+property).classList.add('toggle-item--on');
          else $('#'+property).classList.remove('toggle-item--on');
        }
      },
      sendQuery () {
        let query = $('input[name=query]').value;
        if (query == '') {
         $('.search-list').innerHTML = '';
         return;
       }
       if (query == app.values.searchTemp) return;
       $('.search-list').innerHTML = '<div class="preloader"></div>';
       app.values.searchNum++;
       axios.get('/server/search.php?num='+app.values.searchNum+'&query='+query)
       .then(function (response) {
					// console.log(response.data);
					if (app.values.searchNum != response.data.num) return;
					let query = $('input[name=query]').value;
					if (query == '') {
						$('.search-list').innerHTML = '';
						return;
					}
					app.values.searchNum = 0;
					let result = response.data.result;
					let resultTag = '';
					if (result.length == 0) resultTag = '검색 결과가 없습니다 ㅠ0ㅠ';
					else result.forEach(v => {
						let providerTag = '';
						v.provider.forEach(w => { providerTag += '<span class="search-list__tag">'+w+'</span>'; });
						resultTag += '<li class="search-list__item"><a href="piece.php?piece='+v.id+'" class="search-list__item-link">'+v.title+'<span class="search-list__tag">'+providerTag+'</span></a></li>'; });
						$('.search-list').innerHTML = resultTag;
						app.values.searchTemp = query;
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
    values: {
      toggleValue: {
        watcha: true,
        netflix: true
      },
      searchTemp: '',
      searchNum: 0
    }
  };

  document.addEventListener('DOMContentLoaded', app.init);
</script>
</body>
</html>
