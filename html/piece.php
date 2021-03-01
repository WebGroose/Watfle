<!DOCTYPE html>
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
          <a href="index.html">
            <div class="brand">
              <div class="brand__bar"></div>
              <div class="brand__watfle">Watfle</div>
            </div>
          </a>
          <div class="toggle">
            <a href="index.html">WAT</a>
            /
            <a href="index.html">NET</a>
            <!--
            <input type="checkbox" id="switch1">
            <label for="switch1" class="round">
              <div class="write">
                <div class="one">NET</div>
                <div class="slice"> / </div>
                <div class="two">WAT</div>
              </div>
            </label>-->
          </div>
          <a href="myaccount.html">
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
            <div class="poster-box"></div>
            <div class="review-box">
              <div class="review-box__title">
                <div class="review-box__title__movie-name">✨ LA LA LAND ✨</div>
                <div class="review-box__title__tag"># Romance # Romantic</div>
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
              <textarea name="content" class="writer__text" placeholder="해당 영화의 리뷰를 작성하세요!" rows="5" cols="100"></textarea>
              <input type="hidden" name="piece" value="<?= $_GET['piece'] ?>">
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
              <div class="plus-front_back">
                <li class="review-total">
                <div class="front">
                    <div class="review-id">✍🏻 min jeong</div>
                    <div class="review-tag">#Romantic #Musical</div>
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
                </li>

                <li class="review-total">
                <div class="front">
                    <div class="review-id">✍🏻 min jeong</div>
                    <div class="review-tag">#Romantic #Musical</div>
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
            </div>

            </ul>
          </div>
      </div>
      <div class="footer">
        <div class="global-width">
          <div class="watfle">(주)WATFLE</div>
          <div class="information">
            <div class="date">⏰ [2020-2학기] 겨울방학 아이그루스 웹프로젝트</div>
            <div class="member">
                  <div class="member-person">🌲 팀장:이호영</div>
                  <div class="member-person">🌱 팀원: 김민경 | 김민정 | 김예진</div>
            </div>
          </div>
          <div class="copy">Copyright &copy; 2021 WATFLE</div>
          </div>
        </div>
<!--    </div>
</div> -->
<script type="text/javascript">
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

axios.defaults.baseURL = 'http://watfle2.dothome.co.kr';

const app = {
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
        resultTag += '<li><a href="piece.html?piece='+v.id+'" class="search-list__item-link">'+v.title+'<span>'+providerTag+'</span></a></li>'; });
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

document.addEventListener('DOMContentLoaded', app.init);
</script>
  </body>
</html>