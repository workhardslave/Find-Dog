 <?php
  
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
    $numOfRows=100000;
    $start_bgn="$start_y$start_m$start_d";
    $endde="$end_y$end_m$end_d";

    $ch = curl_init();
    $url = 'http://openapi.animal.go.kr/openapi/service/rest/abandonmentPublicSrvc/abandonmentPublic'; 
    $queryParams = '?' . 
    urlencode('bgnde').'='.$start_bgn.'&' . 
    urlencode('endde').'='.$endde.'&'.
    urlencode('upkind').'=417000&'.
    urlencode('upr_cd').'='.$upr_cd.'&'.
    urlencode('state').'='.$state.'&'.
    urlencode('pageNo').'='.$pageNo.'&'.
    urlencode('numOfRows').'='.$numOfRows.'&'.
    urlencode('ServiceKey') . '=CIb1v%2FudKVcJ%2B4WNbj%2FsSUAXjPw84rv%2FOLALcs35IssYRHkRJjp%2FpIladS99iuHzzkFr4sVIL4AR6iOzZW0ehg%3D%3D'; 

    curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

    $response = curl_exec($ch);
    curl_close($ch);

    $object = simplexml_load_string($response);

    $db_id = "user1";
	$db_pw = "12345";
	$db_name = "finddog";
	$db_domain = "localhost";
	$con = mysqli_connect($db_domain, $db_id, $db_pw, $db_name);

    if($object->body->totalCount !== 0 ){
      $data=$object->body;  
     foreach($data->items->item as $store){
        
         $kind=$store->kindCd;
         $img_url=$store->popfile;
         $petId=$store->desertionNo;   
         $happenPlace=$store->happenPlace;  
         
      $sql = "insert 
				dog 
			set 
				kind = '$kind' , 
				img_url = '$img_url', 
				petid = '$petId', 
				happenplace = '$happenPlace'
			";  
          mysqli_query($con, $sql); 
     }}
    
    mysqli_close($con);     

     
?>
