<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/myaccount.css">
</head>
<body>
	<header>
		<div class="globalwidth">
			<a href="#">
        <div class="brand">
          <div class="brand__bar"></div>
          <div class="brand__watfle">Watfle</div>
        </div>
      </a>
      <!--
          ($is_login)
          <div class="account-box"></div> -->
          <div class="profile-wrapper">
            <div class="profile-img"></div>
            <div class="profile-btn">v</div>
            <div class="profile-popup profile-popup--display-none">
              <div class="profile-info">
                <div class="profile-info__img"></div>
                <div class="profile-info__id">user_id</div>
              </div>
              <ul class="profile-menu">
                <li class="profile-menu__item"><a href="myaccount.html" class="profile-menu__link">내 정보</a></li>
                <li class="profile-menu__item"><a href="server/logout.php" class="profile-menu__link">로그아웃</a></li>
              </ul>
            </div>
          </div>';
          <a href="loginpage.html" class="login-btn">로그인</a>

          <div class="search-box">
            <div class="search-box__search"></div>
            <input type="text" name="query" placeholder="검색" class="search-box__input">
            <ul class="search-list search-list--display-none"></ul>
          </div>
		</div>
	</header>
	<div class="container">
		<div class="globalwidth">
			<div class="info">
				<div class="change-pw">비밀번호 변경</div>
				<input placeholder="Password" id="pwd" type="password"></input>
				<div class="change-pw-check">비밀번호 변경확인</div>
				<input placeholder="Password" id="pwdck" type="password"></input>
			</div>
			<div class="mytag">내가 클릭한 태그들 :</div>
			<div class="tag"></div>
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
</body>
</html>
