<?php 
include_once "./config.php";
$year=date("Y");
$month=date("n");
$day=date("j");
$eday='31'; $sday='01';
$bgnde="$year$month$sday";
$endded="$year$month$eday";

    
$del_directory = "C:/jupyter_project/image_data"; // 절대경로
$del_handle = opendir($del_directory);
while ($del_file = readdir($del_handle)) {
    @unlink($del_directory."/".$del_file);
}
closedir($del_handle);

$ch = curl_init();
$url = 'http://openapi.animal.go.kr/openapi/service/rest/abandonmentPublicSrvc/abandonmentPublic'; 
$queryParams = '?' . 
    urlencode('bgnde').'='.$bgnde.'&' . 
    urlencode('endde').'='.$endded.'&'.
    urlencode('pageNo').'=3&'.
    urlencode('numOfRows').'=12&'.
    urlencode('ServiceKey') . '=zaJnyE3Aobwhy8csFwSTIuNo84En4UDHPDeeUDUX3NYzpZw7P3uxDUk1G6957wa4l%2Bd%2Bz%2BbD%2FMzAhNoqZ9kgVg%3D%3D'
    ; 
curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);
$object = simplexml_load_string($response);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once "./fragment/head.php" ?>
	 <link href="/Dog/css/index.css" rel="stylesheet"> 
</head>

<body>

  <header id="header" class="fixed-top">
  
    <?php include_once "./fragment/header.php" ?>
    
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">
     
      <div class="intro-info" style="margin-top: 50px;margin-left: 70px;">
        <h2>찾아독만의<br><span >AI Solution</span><br><p></p>유기견 찾기 서비스</h2>
        <div>
          <a href="#services" class="btn-get-started scrollto">이용 방법</a> 
          <a href="#why-us" class="btn-services scrollto">유기동물 수</a>
        </div>
      </div>
 
    
    <div class="avatar-upload" >
       <form name="form1" method="post" action="found.php" enctype="multipart/form-data">
       
        <?php 
        	if($userid && $username) {
        ?>
        <div class="avatar-edit" style="margin-right: -280px;">
            <input type='file' name="upload" id="imageUpload" accept=".png, .jpg, .jpeg" required autofocus/>
            <label for="imageUpload"></label>
            
        </div>
        <?php } ?>
        <div class="avatar-preview" style="margin-left: 140px;margin-top: -100px;">
            <div id="imagePreview" style="background-image: url('/Dog/img/1.Beagle-On-White-07.jpg')">
            </div>
            <?php 
            	if($userid && $username) {
            ?>
            <button for="input-file" class="btn-dog" style="cursor: pointer;">강아지 찾기</button>
             <input type="submit" value="강아지 찾기" id="input-file" class="btn-services scrollto" 
             	style="background-color:#757575;color:#fff;position: relative; width: 1px;height: 
             	1px;padding: 0;margin: -1px;overflow: hidden;clip:rect(0,0,0,0);border: 0;">
             <?php }?>	
        </div>
        </form>
    </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About Us</h3>
          <p>찾아독만의 기술력으로 당신의 소중한 유기견을 찾을 수 있도록 돕겠습니다.</p><br>
        </header>

        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <p>
             평균적으로 매년 유기동물의 수는 약 10만 마리에 달한다고 합니다.<br>
             하지만 이 많은 유기견중 나의 유기견을 찾기에는 어려움이 있습니다. <br>
             찾아독에서 도와드리겠습니다.<br>
            </p>

            <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-eye"></i></div>
              <h4 class="title"><a href="">AI기술로 유기견 인식</a></h4>
              <p class="description">당신의 유기견 사진을 업로드하면 등록된 모든 유기견 중 내 유기견과 유사한 유기견을 추려내어 보여줍니다.</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-handshake-o"></i></div>
              <h4 class="title"><a href="">간단한 보호자와의 연결</a></h4>
              <p class="description">당신이 찾는 유기견을 찾았을 때 보호자 및 보호소와 쉽게 연결하여 곧바로 전화연결 및 이메일 전송을 할 수 있습니다.</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-search-plus"></i></div>
              <h4 class="title"><a href="">모든 유기동물 검색</a></h4>
              <p class="description">강아지 외에도 고양이 및 기타 유기동물을 검색 조건을 설정하여 조회 및 연결할 수 있습니다.</p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
            <img src="/Dog/img/about-img.svg" class="img-fluid" alt="">
          </div>
        </div>

       

      

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Service 이용방법</h3>
          <p>처음 이용하시는 분은 아래의 메뉴얼을 따라해주세요.</p><br>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-images" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">1. 유기견 사진 업로드</a></h4>
              <p class="description">잃어버린 자신의 유기견 모습이 잘 담긴 사진을 메인화면 상단의 돋보기 버튼이나 사진업로드 버튼을 클릭하여 업로드 합니다.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-search-strong" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">2. 찾기 버튼 클릭</a></h4>
              <p class="description">자신의 유기견 사진이 잘 업로드 된 것을 확인 후 찾아보기 버튼을 클릭합니다.</p><br>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-paw-outline" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">3. 유사한 유기견들 확인</a></h4>
              <p class="description">분석된 자신의 유기견과 유사한 유기견들 결과 화면에서 자신의 유기견을 찾습니다.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-checkmark-outline" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">4. 자신의 유기견 발견시 사진 클릭</a></h4>
              <p class="description">유기견을 찾았을 시 사진을 클릭하여 상세 정보 확인과 보호자와 연결할 수 있는 페이지로 이동합니다. </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-telephone-outline" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">5. 보호자와의 연결</a></h4>
              <p class="description">보호자 및 보호소에 전화걸기 버튼을 클릭하여 전화연결을 하거나 이메일 주소 및 비밀번호를 입력하면 보호소에 메일을 보낼 수 있습니다.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-heart-outline" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">6. 마이페이지</a></h4>
              <p class="description">자신이 찾은 유기견의 정보를 마이페이지에 저장하고 언제든 유기견의 정보및 보호소 정보를 볼 수 있습니다.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>How many lost?</h3>
          <p>전국의 실시간 유기동물의 수 입니다.</p>
        </header>
        
        <div class="row counters" style="margin-left:440px;">
          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">421</span>
            <p>이번달 구조된 유기동물 </p>
          </div>

        </div>

      </div>
    </section>
  </main>

  <?php include_once "./fragment/footer.php" ?>
  
  <!-- Template Main Javascript File -->
  <script src="/Dog/js/main.js"></script>
    <script  src="/Dog/js/upload.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
</body>
</html>
