<?php
	include_once "../../db/dbcon.php";
    $email   = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); // 입력받은 패스워드를 해쉬값으로 암호화
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    
    $sql1 = "SELECT *
		    FROM member
		    WHERE email='$email'
		    ";
    $sql2 = "insert into member(email, pass, name, phone)
    		values('".$email."','".$pass."','".$name."','".$phone."')";
		    		
    
    $result = mysqli_query($con, $sql1);
    
    $num_match = mysqli_num_rows($result);
    
    if(!$num_match) {
    	mysqli_query($con, $sql2);
	    echo "
		      <script>
	    	      alert('회원가입이 완료 되었습니다.');
		          location.href = 'loginPage.php';
		      </script>
		  ";
    } else {
    	echo "
		      <script>
	    	      alert('이미 사용중인 이메일입니다.');
		          history.back();
		      </script>
		  ";
    }         
    
?>

   
