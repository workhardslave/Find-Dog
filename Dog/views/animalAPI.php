 <?php
 	include_once "./config.php";
 	include_once "./authentication/loginCheck.php";
    $start_y=isset($_POST["start_y"])?$_POST["start_y"]:"";
    $start_m=isset($_POST["start_m"])?$_POST["start_m"]:"";
    $start_d=isset($_POST["start_d"])?$_POST["start_d"]:"";
    $end_y=isset($_POST["end_y"])?$_POST["end_y"]:"";
    $end_m=isset($_POST["end_m"])?$_POST["end_m"]:"";
    $end_d=isset($_POST["end_d"])?$_POST["end_d"]:"";
    $upr_cd=isset($_POST["upr_cd"])?$_POST["upr_cd"]:"";
    $upkind=isset($_POST["upkind"])?$_POST["upkind"]:"";
    $state=isset($_POST["state"])?$_POST["state"]:"";

   
    $pageNo=1;
    $numOfRows=100;
    $start_bgn="$start_y$start_m$start_d";
    $endde="$end_y$end_m$end_d";

    $ch = curl_init();
    $url = 'http://openapi.animal.go.kr/openapi/service/rest/abandonmentPublicSrvc/abandonmentPublic'; 
    $queryParams = '?' . 
    urlencode('bgnde').'='.$start_bgn.'&' . 
    urlencode('endde').'='.$endde.'&'.
    urlencode('upkind').'='.$upkind.'&'.
    urlencode('upr_cd').'='.$upr_cd.'&'.
    urlencode('state').'='.$state.'&'.
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
 <html lang="en">

<head>
 <?php include_once "./fragment/head.php" ?>
  <link href="/FindDog/Dog/css/animalAPI.css" rel="stylesheet"> 

</head>

<body>

	<div id="wrapper">

		<!-- start header -->
		 <header id="header" class="fixed-top">
    		<?php include_once "./fragment/header.php" ?>
  </header><!-- #header -->
		<!-- end header -->
		<br><br><br>
		<section class="secondSection" >
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="heading"></h4>
						<form name='animal' method="post" action="animalAPI.php">
							<div class=' list_map_search_div'>
							<div class='selects_box'>
							<div class="col-sm-6 col-lg-12">
								<table class="table">
                                        <tr>
										<td class='list_map_search_text'>시작 날짜</td>
										<td class='list_map_search_td_input'>
										<div class="cus-select" style="width:80px;float:left;margin-right:20px;">
											<select name="start_y" >
												<option value="" selected>Year</option>
												<option value='2017' >2017
												</option>
												<option value='2018' >2018
												</option>
												<option value='2019' >2019
												</option>
                                            </select></div> 
                                            <div class="cus-select" style="width:90px;float:left;margin-right:20px;">
											<select name='start_m' class='list_search_ani_select_1'>
												<option value="" selected>Month</option>
												<option value='01'>01</option>
												<option value='02'>02</option>
												<option value='03'>03</option>
												<option value='04'>04</option>
												<option value='05'>05</option>
												<option value='06'>06</option>
												<option value='07'>07</option>
												<option value='08'>08</option>
												<option value='09'>09</option>
												<option value='10'>10</option>
												<option value='11'>11</option>
												<option value='12'>12</option>
                                                </select> </div>
                                                <div class="cus-select" style="width:80px;float:left;margin-right:20px;">
											<select name='start_d' class='list_search_ani_select_1'>
													<option value="" selected>Day</option>
												<option value='01'>01</option>
												<option value='02'>02</option>
												<option value='03'>03</option>
												<option value='04'>04</option>
												<option value='05'>05</option>
												<option value='06'>06</option>
												<option value='07'>07</option>
												<option value='08'>08</option>
												<option value='09'>09</option>
												<option value='10'>10</option>
												<option value='11'>11</option>
												<option value='12'>12</option>
												<option value='13'>13</option>
												<option value='14'>14</option>
												<option value='15'>15</option>
												<option value='16'>16</option>
												<option value='17'>17</option>
												<option value='18'>18</option>
												<option value='19'>19</option>
												<option value='20'>20</option>
												<option value='21'>21</option>
												<option value='22'>22</option>
												<option value='23'>23</option>
												<option value='24'>24</option>
												<option value='25'>25</option>
												<option value='26'>26</option>
												<option value='27'>27</option>
												<option value='28'>28</option>
												<option value='29'>29</option>
												<option value='30'>30</option>
												<option value='31'>31</option>
                                                    </select> </div>
                                        </td>
                                    </tr>
                                </table>
											</div>
											
											<div class="col-sm-6 col-lg-12">
								<table class="table">
									<tr>
										<td class='list_map_search_text'>완료 날짜</td>
										<td class='list_map_search_td_input'>
								<div class="cus-select" style="width:80px;float:left;margin-right:20px;">

											<select name='end_y' class='list_search_ani_select_1'>
													<option value="" selected>Year</option>
												<option value='2017'>2017
												</option>
												<option value='2018'>2018
												</option>
												<option value='2019'>2019
												</option>
                                    </select> </div>
                                     <div class="cus-select" style="width:90px;float:left;margin-right:20px;">
											<select name='end_m' class='list_search_ani_select_1'>
													<option value="" selected>Month</option>
												<option value='01'>01</option>
												<option value='02'>02</option>
												<option value='03'>03</option>
												<option value='04'>04</option>
												<option value='05'>05</option>
												<option value='06'>06</option>
												<option value='07'>07</option>
												<option value='08'>08</option>
												<option value='09'>09</option>
												<option value='10'>10</option>
												<option value='11'>11</option>
												<option value='12'>12</option>
                                         </select> </div>
								    <div class="cus-select" style="width:80px;float:left;margin-right:20px;">

											<select name='end_d' class='list_search_ani_select_1'>
													<option value="" selected>Day</option>
												<option value='01'>01</option>
												<option value='02'>02</option>
												<option value='03'>03</option>
												<option value='04'>04</option>
												<option value='05'>05</option>
												<option value='06'>06</option>
												<option value='07'>07</option>
												<option value='08'>08</option>
												<option value='09'>09</option>
												<option value='10'>10</option>
												<option value='11'>11</option>
												<option value='12'>12</option>
												<option value='13'>13</option>
												<option value='14'>14</option>
												<option value='15'>15</option>
												<option value='16'>16</option>
												<option value='17'>17</option>
												<option value='18'>18</option>
												<option value='19'>19</option>
												<option value='20'>20</option>
												<option value='21'>21</option>
												<option value='22'>22</option>
												<option value='23'>23</option>
												<option value='24'>24</option>
												<option value='25'>25</option>
												<option value='26'>26</option>
												<option value='27'>27</option>
												<option value='28'>28</option>
												<option value='29'>29</option>
												<option value='30'>30</option>
												<option value='31'>31</option>
                                        </select> </div>
										</td>
									</tr>
                                    
								</table>

								<table>
									<tr>
                                       <td class='list_map_search_text'>&nbsp;시/도&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td width='110px' class='list_map_search_td_input'>
										 <div class="cus-select" style="width:120px;float:left;margin-right:20px;">
											<select name="upr_cd" class='list_search_ani_select_1'>
													<option value="" selected>Location</option>
												<option value='6110000'>서울특별시</option>
												<option value='6260000'>부산광역시</option>
												<option value='6270000'>대구광역시</option>
												<option value='6280000'>인천광역시</option>
												<option value='6290000'>광주광역시</option>
												<option value='5690000'>세종특별자치시</option>
												<option value='6300000'>대전광역시</option>
												<option value='6310000'>울산광역시</option>
												<option value='6410000'>경기도</option>
												<option value='6420000'>강원도</option>
												<option value='6430000'>충청북도</option>
												<option value='6440000'>충청남도</option>
												<option value='6450000'>전라북도</option>
												<option value='6460000'>전라남도</option>
												<option value='6470000'>경상북도</option>
												<option value='6480000'>경상남도</option>
												<option value='6500000'>제주특별자치도</option>
                                             </select></div>
										</td>
									</tr>
									<tr>

									</tr>
								</table>
								<br>
								<table>
									<tr>
										<td class='list_map_search_text'>&nbsp;축종&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td width='360px' class='list_map_search_td_input'>
								 <div class="cus-select" style="width:120px;float:left;margin-right:20px;">

											<select name="upkind" class='list_search_ani_select_1'>
												<option value="" selected>Kind</option>
												<option value='417000'>강아지</option>
												<option value='422400'>고양이</option>
												<option value='429900'>기타</option>
                                     </select></div>
										</td>
										<td class='list_map_search_text'>상태&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td class='list_map_search_td_input'>
								<div class="cus-select" style="width:120px;float:left;margin-right:20px;">

											<select name='state' class='list_search_ani_select_3'>
													<option value="" selected>State</option>
												<option value='notice'>공고중</option>
												<option value='protect'>보호중</option>
                                    </select></div>
										</td>
									</tr>
									<tr>
										<td colspan='4' class='list_map_search_td_line2'></td>
									</tr>
								</table>
								<br>
								<br>
								<div class='list_search_ani_btn_div'>
								 <button for="input" class="btn-dog" >검색</button>
									<input type='submit' value='검색' class="btn-services scrollto" style="background-color:#757575;color:#fff;position: relative; width: 1px;height: 1px;padding: 0;margin: -1px;overflow: hidden;clip:rect(0,0,0,0);border: 0;">
								</div>
							</div>
					</div>
                            </div>
					</form>
				</div>
			</div>
	</div>
	</section>
	
        
	<section id="portfolio" class="clearfix">
      <div class="container">
 <?php 
                        $data=$object->body;
                        $totalCount=$data->totalCount;
                    ?>
        <header class="section-header">
          <center><h4 class="section-title">조회결과: <?= $totalCount ?>건</h4></center>
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
                                 $img_url=$store->popfile;
                                 $petId=$store->desertionNo;
                                             
                                 $happenPlace=$store->happenPlace;    
                                 $category='';
                                 $categoryDetail='';
                                 
                                 if(strpos($kind,'개')!==false)
										$category='강아지';
									else if(strpos($kind,'고')!==false)
										$category='고양이';
									else $category='기타';
                                $categoryDetail=substr($kind,strrpos($kind,"&nbsp "));
															?>
	  <div class="col-lg-3 col-md-6 portfolio-item <?=$category?> wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?=$img_url?>"  alt="" width="260" height="260">
                <a href="<?=$img_url?>" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="/FindDog/Dog/views/animalDetail.php?petId=<?=$petId?>" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h6><a href="#"><?=$category?></a></h6>
                <p><?=$categoryDetail?></p>
              </div>
            </div>
          </div>
<?php }} ?>

        </div>

      </div>
    </section>

 <?php include_once "./fragment/footer.php" ?>
 
  <!-- Template Main Javascript File -->
  <script src="/FindDog/Dog/js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script  src="/FindDog/Dog/js/select.js?ver=3"></script>

</body>

</html>