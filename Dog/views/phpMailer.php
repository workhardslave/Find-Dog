<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./php_mailer/src/PHPMailer.php";
require "./php_mailer/src/SMTP.php";
require "./php_mailer/src/Exception.php";
$email=$_POST['email'];
$pass=$_POST['pass'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$mail = new PHPMailer(true);

try {

    // 서버세팅    
    $mail -> SMTPDebug = 0;    // 디버깅 설정
    $mail -> isSMTP();               // SMTP 사용 설정

    $mail -> Host = "smtp.naver.com";                      // email 보낼때 사용할 서버를 지정
    $mail -> SMTPAuth = true;                                // SMTP 인증을 사용함
    $mail -> Username = $email;  // 메일 계정
    $mail -> Password = $pass;                   // 메일 비밀번호
    $mail -> SMTPSecure = "ssl";                             // SSL을 사용함
    $mail -> Port = 465;                                        // email 보낼때 사용할 포트를 지정
    $mail -> CharSet = "utf-8";                                // 문자셋 인코딩

    // 보내는 메일
    $mail -> setFrom($email, "transmit");

    // 받는 메일
    $mail -> addAddress("hoon1759@naver.com", "receive01");
    
    // 첨부파일
//     $mail -> addAttachment("./0.jpg");
//     $mail -> addAttachment("./1.jpg");

    // 메일 내용
    $mail -> isHTML(true);                                                         // HTML 태그 사용 여부
    $mail -> Subject = $subject;                  // 메일 제목
    $mail -> Body = $message;    // 메일 내용
    
    // 메일 전송
    $mail -> send();
    
    echo "
	      <script>
    	      alert('메세지 전송 완료.');
	          location.href = 'emailTest.php';
	      </script>
	  ";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error : ", $mail -> ErrorInfo;
}
?>