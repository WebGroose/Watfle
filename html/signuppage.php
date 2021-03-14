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
  <form name="write_form_member" action="server/signup.php"method="post">
  <header>
    <div class="top">
    <a href="index.html">=WATFLE </a>&nbsp;&nbsp;
        <a href="index.html" > WAT</a>&nbsp;/
        <a href="index.html" >NET</a>&nbsp;&nbsp; 
        </div>
        </div>
</header>
<div class="main-container">
<div class="main-wrap">
<section class="signup-input-section-wrap">
<div class = "watfle">WATFLE</div>
<label>아이디</label>	
<div class = "id">
            <div class= "signup-input-wrap">
				<input placeholder="아이디" name="user_id" type="text"></input>
        </div>
                <div class="id-btn">
                <button onclick= "idbtn()" id="idbtn">아이디 중복확인</button>
            </div>
            </div>
             <label>비밀번호</label>
            <div class="signup-input-wrap pwd-wrap">
				<input placeholder="비밀번호" name="user_pwd" type="password"></input>
			</div>
      <label>비밀번호 확인</label>
            <div class="signup-input-wrap user_pwdck-wrap">
				<input placeholder="비밀번호확인" name="user_pwdck" type="password"></input>
			</div>
            <div class="email">
            <tr>
              <th>이메일</th>
              <td>
                <input type='text' name="email1">@
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
            <tr>
            <th>선호하는 장르:</th>
            <td>
            <div classs= "genre">
            <select name='genre1' size='1'>
              <option value='1'>선택하세요</option>
              <option value='2'>a</option>
              <option value='3'>b</option>
              <option value='4'>c</option>
              </select>
              <select name='genre2' size='1'>
              <option value='1'>선택하세요</option>
              <option value='2'>a</option>
              <option value='3'>b</option>
              <option value='4'>c</option>
              </select>
               <select name='genre3' size='1'>
              <option value='1'>선택하세요</option>
              <option value='2'>a</option>
              <option value='3'>b</option>
              <option value='4'>c</option>
              </select>
               <select name='genre4' size='1'>
              <option value='1'>선택하세요</option>
              <option value='2'>a</option>
              <option value='3'>b</option>
              <option value='4'>c</option>
              </select>
              </div>
           </td>
         </tr>
			<div class="signup-btn-wrap">
       <input type="submit" name="submit" value="회원가입"></input>
            </div>
            </section>
            
	</div>
    </form>
    <script type="text/javascript">
		const $ = document.querySelector.bind(document);
		const $$ = document.querySelectorAll.bind(document);

		const app = {
            
            
            init () {

             var pwd = $("#password").val();
             var num = pwd.search(/[0-9]/g);
             var eng = pwd.search(/[a-zA-Z]/ig);
             var spe = pwd.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

				$('.form').addEventListener('submit', (e) => { app.validate(e); });
			},
			validate (e) {
				if ($('input[name=user_id]').value == '' || $('input[name=user_pwd]').value == '') {
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
                if($('input[name=user_pwd]').value.length < 8){
                    alert('비밀번호는 최소 8자리 이상입니다.');
                    e.preventDefault();
                }
                if(num<0||eng<0||spe<0){
                    alert("영문,숫자, 특수문자를 혼합하여 입력해주세요.");
                    e.preventDefault();
                }
                if(document.getElementById('user_pwd').value !='' && document.getElementById('user_pwdck').value!=''){
                if(document.getElementById('user_pwd').value==document.getElementById('user_pwdck').value){
                    alert('비밀번호가 일치합니다.');
                    e.preventDefault();

                } else{
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
