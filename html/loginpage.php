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
  <title>login Page</title>
  <link rel="stylesheet" href="css/loginpage.css">
</head>
<body>


  <form class="form" name="login" action="server/login.php" method="post">
    <header>
      <div class="top" style="align:center">
        <div class="review" style="text-align:left">
          <a href="index.php">=WATFLE</a> &nbsp;&nbsp;
        </div>
        <div class="oval" style="text-align:center">
          <a href="#" >WAT</a>&nbsp;/
          <a href="#" >NET</a>&nbsp;&nbsp;
        </div>
      </div>
    </header>
    <div class="main-container">
      <div class="main-wrap">
        <section class="login-input-section-wrap">
          <div class = "watfle">WATFLE</div>
          <div class= "login-input-wrap">
             <input name = "user_id"placeholder="Username" id="user_id" type="text"></input>
          </div>
          <div class="login-input-wrap pwd-wrap">
           <input name = "user_pw" placeholder="Password" id="user_pwd" type="password"></input>
          </div>
          <div class="login-btn-wrap">
            <button onclick= "login()" id="login">로그인</button>
          </div>
          <p class="forget-msg">비밀번호를 잊으셨나요?</p>
          <p class="idfind">아이디 찾기 | 비밀번호 찾기 |
            <a class="signup" href="signuppage.php"> 회원 가입</a></p>
          </section>
        </div>
      </div>
    </form>

    <script>
      const $ = document.querySelector.bind(document);
  		const $$ = document.querySelectorAll.bind(document);

      var pattern1 = /[0-9a-zA-Z]/; //숫자+문자
      var pattern2 = /[0-9a-zA-Z.;\-]/; //숫자+문자+특수문자
      var pattern3 = /[~!@#$%^&*()+|<>?:{}]/; //특수문자

      function login(){
        var id = document.fr.user_id.value;
        var pwd = document.fr.user_pwd.value;

        const app = {
          init () {
            $('.form').addEventListener('submit',(e)=>{app.validate(e);});
          },
          validate(e){
            //공백
            if($('input[name=user_id]').value==''||$('input[name=user_pw]').value==''){
              alert('공백을 모두 채워주세요!');
              e.preventDefault();
            }
            //정규식
            for(var i=0; i<id.length; i++){
              if(pattern1.test(id.charAt(i))==false){
                alert("아이디에는 숫자와 영어만 입력하세요!");
                document.fr.id.focus();
                return false;
              }
            }
            for(var i=0; i<pwd.length; i++){
              if(pattern3.test(pwd.charAt(i))==false && pattern4.test(pwd.charAt(i))==false){
                alert("비밀번호에는 숫자, 영어, 특수문자만 입력하세요!");
                document.fr.pwd.focus();
                return false;
              }
            }
            //id, pwd 일치
            if($('input[name=user_pw]').value != '' && $('input[name=user_pwdck]').value != ''){
              if($('input[name=user_pw]').value != $('input[name=user_pwdck]').value){
                alert('비밀번호가 일치하지 않습니다.');
                e.preventDefault();
              }
            }
          }
        };
        document.addEventListener('DOMContentLoaded',app.init);
    }
    </script>
  </body>
  </html>
