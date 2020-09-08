 <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="/Dog/views/index.php"><span>Find Dog</span></a></h1> 
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li><a href="/Dog/views/index.php">메인 화면</a></li>
          <li><a href="/Dog/views/animalAPI.php">모든 유기동물 검색</a></li>
          <?php 
          	if(!$userid) {
          ?>
          <li><a href="/Dog/views/authentication/loginPage.php">로그인</a></li>
          <?php 
          	} else {
          ?>
          <li class="drop-down"><a href="">마이페이지</a>
            <ul>
              <li><a href="./authentication/modifyPage.php">회원정보수정</a></li>
              <li><a href="#">유기견매칭내역</a></li>
              <li><a href="./authentication/logout.php">로그아웃</a></li>
            </ul>
          </li>
        </ul>
        <?php }?>
      </nav><!-- .main-nav -->
      
    </div>