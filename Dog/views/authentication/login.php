<?php
	include_once "../../db/dbcon.php";
    $email   = $_POST['email'];
    $pass = $_POST['pass']; 
    
   $sql = "SELECT * 
   		   FROM member 
           WHERE email='$email'
          ";

   $result = mysqli_query($con, $sql);

   $num_match = mysqli_num_rows($result);

   if(!$num_match) {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             location.href = 'loginPage.php';
           </script>
         ");
    } else {
        $row = mysqli_fetch_array($result);
        $db_pass = $row['pass'];

        mysqli_close($con);
		/* 로그인 화면에서 전송된 $pass와 DB의 $db_pass의 해쉬값 비교 */
        if(!password_verify($pass, $db_pass)){
        	echo("
	              <script>
	                window.alert('비밀번호가 틀립니다!')
	                location.href = 'loginPage.php';
	              </script>
	           ");
	           exit;
        }else {
            session_start();
            $_SESSION["userid"] = $row["email"];
            $_SESSION["username"] = $row["name"];        
            echo("
              <script>
                location.href = '../index.php';
              </script>
            ");
        }
     }        
?>
