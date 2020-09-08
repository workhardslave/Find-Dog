<?php 
	include_once "../config.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "../fragment/head.php" ?>
	</head>
	<body>
		<header id="header" class="fixed-top">
    		<?php include_once "../fragment/header.php" ?>
 		</header>
 		<div class="card align-middle" style="width:20rem; border-radius:20px; margin-top:150px; margin-bottom:50px; margin-left:600px;">
			<div class="card-title" style="margin-top:30px;">
				<h2 class="card-title text-center" style="color:#113366;">회원가입</h2>
			</div>
		<div class="card-body">
      <form class="form-signin" method="POST" action="register.php">
	      	<h5 class="form-signin-heading text-center">회원가입 정보를 입력하세요</h5>
	      	<label for="inputEmail" class="sr-only">Your ID</label>
	        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus><BR> 
	        <label for="inputPassword" class="sr-only">Password</label>
	        <input type="password" name="pass" class="form-control" placeholder="Password" required><br>
	        <label for="inputName" class="sr-only">Password</label>
	        <input type="text" name="name" class="form-control" placeholder="Name" required><br>
	        <label for="inputPhone" class="sr-only">Password</label>
	        <input type="text" name="phone" class="form-control" 
	        	maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
	        	placeholder="Phone" required><br>
	    
	        <button id="btn-Yes" class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:15px;">
	        	회 원 가 입
	        </button>
      </form>
      
		</div>
	</div>

	<div class="modal">
	</div>
		
		<?php include_once "../fragment/footer.php" ?>
	</body>
</html>