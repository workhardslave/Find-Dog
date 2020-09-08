<?php


$file_dir="C:/jupyter_project/image_data/";
$file_path=$file_dir.$_FILES["upload"]["name"];
if(move_uploaded_file($_FILES["upload"]["tmp_name"],$file_path)){
    $img_path="data/".$_FILES["upload"]["name"];
}

$result=exec('cd / && cd jupyter_project && python Result.py',$out,$erre);
//exec('python test.py',$out,$erre);
//C:\xampp\htdocs\findDog\views>
//print_r($out);
$result=iconv("EUC-KR", "UTF-8", $result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>찾아독</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="/Dog/img/favicon.png" rel="icon">
  <link href="/Dog/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/Dog/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/Dog/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/Dog/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/Dog/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/Dog/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/Dog/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/Dog/css/style.css" rel="stylesheet">
  <link href="/Dog/css/upload.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
     <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="/Dog/views/index.php"><span>Find Dog</span></a></h1> 
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="/Dog/views/index.php">메인 화면</a></li>
          <li><a href="/Dog/views/animalAPI.php">모든 유기동물 검색</a></li>
          <li><a href="#services">마이페이지</a></li>
          <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->
  <body>
  <section id="portfolio" class="clearfix">
      <div class="container">
 <br><br><br><br><br>
       
        <header class="section-header">
          <center><h4 class="section-title"a><?=$result?>이 강아지가 맞나요?</h4></center>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active" style="background:#007bff;">All</li>
              <li data-filter=".강아지">강아지</li>
              <li data-filter=".고양이">고양이</li>
              <li data-filter=".기타">기타</li>
            </ul>
          </div>
        </div>
        
        <div class="row portfolio-container">

						
							<?php
          
    $db_id = "user1";
	$db_pw = "12345";
	$db_name = "finddog";
	$db_domain = "localhost";
	$con = mysqli_connect($db_domain, $db_id, $db_pw, $db_name);
    
    $sql= "select * from dog where kind like '%".$result."%'";
    $res=mysqli_query($con, $sql); 
    
    while($row=mysqli_fetch_array($res)){
    $kind = $row["kind"];   
    $img_url = $row["img_url"];             
    $petId = $row["petid"];             
    $happenPlace = $row["happenplace"];             
            
                                 
                                 if(strpos($kind,'개')!==false)
										$category='강아지';
                                $categoryDetail=substr($kind,strrpos($kind,"&nbsp "));
															?>
	  <div class="col-lg-3 col-md-6 portfolio-item <?=$category?> wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?=$img_url?>"  alt="" width="260" height="260">
                <a href="<?=$img_url?>" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="/Dog/views/animaldetail.php?petId=<?=$petId?>" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h6><a href="#"><?=$category?></a></h6>
                <p><?=$categoryDetail?></p>
              </div>
            </div>
          </div>
<?php } ?>

      
        </div>

      </div>
    </section>

		 <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>찾아독</h3>
            
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Menu Link</h4>
            <ul>
              <li><a href="/Dog/views/index.php">메인화면</a></li>
              <li><a href="/Dog/views/animalAPI.php">모든 유기동물 조회</a></li>
              <li><a href="#">마이페이지</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              서울특별시 <br>
              성남대로<br>
              가천대학교 <br>
              <strong>Phone:</strong> 010-4751-8402<br>
              <strong>Email:</strong> hoon1759@naver.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          

        </div>
      </div>
    </div>


  </footer>
					
					<a href="#" class="scrollUp"><i class="fa fa-angle-Up active"></i></a>
					<!-- javascript
    ================================================== -->
					<!-- Placed at the end of the document so the pages load faster -->
<script src="/Dog/lib/jquery/jquery.min.js"></script>
  <script src="/Dog/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/Dog/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/Dog/lib/easing/easing.min.js"></script>
  <script src="/Dog/lib/mobile-nav/mobile-nav.js"></script>
  <script src="/Dog/lib/wow/wow.min.js"></script>
  <script src="/Dog/lib/waypoints/waypoints.min.js"></script>
  <script src="/Dog/lib/counterup/counterup.min.js"></script>
  <script src="/Dog/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/Dog/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="/Dog/lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="/Dog/contactform/contactform.js"></script>
 
  <!-- Template Main Javascript File -->
  <script src="/Dog/js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script  src="/Dog/js/select.js"></script>

</body>
</html>
