<?php
	include_once "./config.php";
	include_once "./authentication/loginCheck.php";
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
	
	if(!empty($pageNo) && $pageNo !==1){
	        $pageNo=3;
	    }else{
	        $pageNo=1;}
	    $numOfRows=5000;
	
	    $ch = curl_init();
	    $url = 'http://openapi.animal.go.kr/openapi/service/rest/abandonmentPublicSrvc/abandonmentPublic'; 
	    $queryParams = '?' . 
	    
	    urlencode('upkind').'=417000&'.
	    urlencode('pageNo').'='.$pageNo.'&'.
	    urlencode('numOfRows').'='.$numOfRows.'&'.
	    urlencode('ServiceKey') . '=zaJnyE3Aobwhy8csFwSTIuNo84En4UDHPDeeUDUX3NYzpZw7P3uxDUk1G6957wa4l%2Bd%2Bz%2BbD%2FMzAhNoqZ9kgVg%3D%3D'; 
	
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
     <header id="header" class="fixed-top">
    	<?php include_once "./fragment/header.php" ?>
  </header><!-- #header -->
  <body>
  <section id="portfolio" class="clearfix">
      <div class="container">
 <br><br><br><br><br>
        <header class="section-header">
          <center><h4 class="section-title">이 강아지가 맞나요?</h4></center>
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
                            if($object->body->totalCount !== 0 ){
                              $data=$object->body;  
						     foreach($data->items->item as $store){
                                  $kind=$store->kindCd;
                                 if(strpos($kind,$result)!==false){
                                
                                 $img_url=$store->popfile;
                                 $petId=$store->desertionNo;
                                             
                                 $happenPlace=$store->happenPlace;    
                                 $category='';
                                 $categoryDetail='';
                                 
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
<?php }}} ?>

      
        </div>

      </div>
    </section>

		<?php include_once "./fragment/footer.php" ?>
 
  <!-- Template Main Javascript File -->
  <script src="/Dog/js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script  src="/Dog/js/select.js"></script>

</body>
</html>
