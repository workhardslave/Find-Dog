<?php
	include_once "./config.php";
	include_once "./authentication/loginCheck.php";
    $petId=$_GET["petId"];
    $pageNo=1;
    $numOfRows=5000;
    $ch = curl_init();
    $url = 'http://openapi.animal.go.kr/openapi/service/rest/abandonmentPublicSrvc/abandonmentPublic'; 
    $queryParams = '?' . 
    urlencode('pageNo').'='.$pageNo.'&'.
    urlencode('numOfRows').'='.$numOfRows.'&'.
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
 	
</head>
<body>
	<div id="wrapper">
		<!-- start header -->
		<header id="header" class="fixed-top">
    		<?php include_once "./fragment/header.php" ?>
  </header><!-- #header -->
	<?php
    
        $data=$object->body;    
                foreach($data->items->item as $store){
                    $desertionNo= $store->desertionNo;
                    if($desertionNo == $petId){
                    $kind=$store->kindCd;
                    $img_url=$store->popfile;
                    $happenPlace=$store->happenPlace;
                    $colorCd=$store->colorCd;
                    $age=$store->age;
                    $weight=$store->weight;
                    $happenDt=$store->happenDt;
                    $noticeNo=$store->noticeNo;
                    $specialMark=$store->specialMark;
                    $careNm=$store->careNm;
			        $careTel=$store->careTel;
			        $careAddr=$store->careAddr;
			        $officeTel=$store->officetel;
			        $sexF=$store->sexCd;
			        $processState=$store->processState;
                    
                    if($sexF == 'M')
                    $sex="수컷";
			        else if($sexF=='F')
			        $sex="암컷";
                    else
                    $sex="미상";
                    $neuterYn=$store->neuterYn;
                    if($neuterYn=="Y")
                    $ny="예";
                    else if($neuterYn=="N")
                    $ny="아니요";
                    else
                    $ny="미상";  
                       
                } }
        ?>
	
	<section id="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
				<br><br><br><br>
				<div class="col-lg-6" style="float:left;margin-top:30px;margin-bottom:60px;bo">
					<img src="<?=$img_url?>" alt="" class="img-responsive" width="500" height="500" style="border-radius:30px"/>
                </div>
    
     <br><br><br>
      <div class="row">
        <div class="col-lg-12" style="float:left;margin-top:-30px;">
          <ul class="list-group">
            <li class="list-group-item active"><?=$kind?></li>
            <li class="list-group-item">색상 : <?=$colorCd?></li>
            <li class="list-group-item">성별 : <?=$sex?></li>
            <li class="list-group-item">중성화 여부 : <?=$ny?></li>
            <li class="list-group-item">나이 / 체중 : <?=$age?> / <?=$weight?></li>
            <li class="list-group-item">발견 일시 : <?=$happenDt?></li>
            <li class="list-group-item">발견 장소 : <?=$happenPlace?></li>
            <li class="list-group-item">특징 : <?=$specialMark?></li>
            <li class="list-group-item">상태 : <?=$processState?></li>
          </ul>
        </div>
      </div>
    
                    
				</div>
			</div>
        </div>
            
	</section>
<section id="contact">
      <div class="container-fluid" >

        <div class="section-header" style="margin-top:-30px;">
          <h3>Email Contact</h3>
        </div>
    
        <div class="row wow fadeInUp" >
         <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-8 info">
                <i class="ion-ios-location-outline"></i>
                <p><span id="shelterLocation" style="cursor: pointer;" data-action="https://map.naver.com/v5/search/<?=$careAddr?>">
                	<?=$careAddr?>
                </span></p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-telephone-outline"></i>
                <p><?=$careTel?></p>
              </div>
            </div>

            

      </div>
    </section><!-- #contact -->
		<?php include_once "./fragment/footer.php" ?>
        
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        </body>
    </div>
    <script>
	    $(function(){
		    $("#shelterLocation").click(function(){
			    var action_url = $(this).attr("data-action");
			    console.log(action_url);
			    $(location).attr("href",action_url);
			});
		});
    </script>
    
    
    </body>
</html>