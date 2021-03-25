<!DOCTYPE html>

<?php
    session_start();
  if (isset($_SESSION['message'])) {
    echo '<script type="text/javascript">alert("'.$_SESSION['message'].'");</script>';
    unset($_SESSION['message']);
  }
  ?>

<html>

<head>
  <meta charset="UTF-8"/>
  <title>signuppage</title>
  <link rel="stylesheet" href="css/signuppage.css">
</head>
<body>
  <form name="write_form_member" action="server/signup.php"method="post" class="form">
    <div class="header">
      <div class="global-width">
        <a href="#">
          <div class="brand">
            <div class="brand__bar"></div>
            <div class="brand__watfle">Watfle</div>
          </div>
        </a>
          <!--
            ($is_login)
            <div class="account-box"></div> -->
            <?php
            if ($is_login) echo '<div class="profile-wrapper">
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
            else echo '<a href="loginpage.html" class="login-btn">로그인</a>';
            ?>
            <div class="search-box">
              <div class="search-box__search"></div>
              <input type="text" name="query" placeholder="검색" class="search-box__input">
              <ul class="search-list search-list--display-none"></ul>
            </div>
          </div>
        </div>
  <div class="main-container">
    <div class="main-wrap">
      <section class="singup-input-section-wrap">
        <div class = "watfle">WAFLE</div>
        <div class= "signup-input-wrap">
          <input placeholder="아이디" name="user_id" type="text"></input>
          <div class="id-btn">
            <button onclick= "idbtn()" id="idbtn">아이디 중복확인</button>
          </div>
        </div>
        <div class="signup-input-wrap pwd-wrap">
          <input placeholder="비밀번호" name="user_pw" type="password"></input>
        </div>
        <div class="signup-input-wrap pwd-wrap">
          <input placeholder="비밀번호확인" name="user_pwdck" type="password"></input>
        </div>
        <div class="email">
          <tr>
            <th>이메일</th>
            <td>
              <input type='text' name="email">@
              <input type='text' name="email_dns">
              <select name="emailaddr">
                <option value="">직접입력</option>
                <option value="daum.net">daum.net</option>
                <option value="empal.com">empal.com</option>
                <option value="gmail.com">gmail.com</option>
                <option value="hanmail.net">hanmail.net</option>
                <option value="msn.com">msn.com</option>
                <option value="naver.com">naver.com</option>
                <option value="nate.com">nate.com</option>
              </select>
            </td>
          </tr>
        </div>
        <div class="genre">
          <tr>
            <th>선호하는 장르:</th>
            <td>
              <select name='job' size='1'>
               <option value='1'>선택하세요</option>
               <option value='2'>a</option>
               <option value='3'>b</option>
               <option value='4'>c</option>
             </select>
           </td>
         </tr>
       </div>
       <div class="signup-btn-wrap">
         <input type="submit" name="submit" value="회원가입">
       </div>
     </section>
   </div>
 </div>
</form>
<script type="text/javascript">
  const $ = document.querySelector.bind(document);
  const $$ = document.querySelectorAll.bind(document);

  /*var pwd = $("input[name=user_pw]").value;
  var num = pwd.search(/[0-9]/g);
  var eng = pwd.search(/[a-z]/ig);
  var spe = pwd.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);*/

  const app = {


   init () {
    $('.form').addEventListener('submit', (e) => { app.validate(e); });
  },
  validate (e) {
    if ($('input[name=user_id]').value == '' || $('input[name=user_pw]').value == '') {
     alert('공백을 모두 채워주세요!');
     e.preventDefault();
   }
   if ($('input[name=user_id]').value.length < 6) {
     alert('아이디는 최소 6자 이상입니다.');
     e.preventDefault();
   }
   if ($('input[name=user_id]').value.length > 20) {
     alert('아이디는 최대 20자 이하입니다.');
     e.preventDefault();
   }
   if($('input[name=user_pw]').value.length < 8){
    alert('비밀번호는 최소 8자리 이상입니다.');
    e.preventDefault();
  }
  /*if(num<0||eng<0||spe<0){
    alert("영문,숫자, 특수문자를 혼합하여 입력해주세요.");
    e.preventDefault();
  }*/
  if($('input[name=user_pw]').value != '' && $('input[name=user_pwdck]').value != ''){
    if($('input[name=user_pw]').value != $('input[name=user_pwdck]').value){
      alert('비밀번호가 일치하지 않습니다.');
      e.preventDefault();

    }
  }

  // 공백 체크, 길이 체크, 정규식 체크
}
};

document.addEventListener('DOMContentLoaded', app.init);
</script>
</body>
</section>
</div>
</div>
</form>
</body>
</html>
