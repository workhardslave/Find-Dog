<?php 
	include_once "../config.php";
	include_once "../../db/dbcon.php";
	
	$sql = "SELECT *
			FROM member";
	
	$result = mysqli_query($con, $sql);
	$member = mysqli_fetch_array($result);

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
				<h2 class="card-title text-center" style="color:#113366;">회원정보수정</h2>
			</div>
		<div class="card-body">
      <form class="form-signin" method="POST" action="modify.php">
	      	<h5 class="form-signin-heading text-center">회원정보를 수정하세요</h5>
	      	<label for="inputEmail" class="sr-only">Your Email</label>
	        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?=$member['email'] ?>" required autofocus><BR> 
	        <label for="inputPassword" class="sr-only">Password</label>
	        <input type="password" name="pass" class="form-control" placeholder="Password" required><br>
	        <label for="inputName" class="sr-only">Password</label>
	        <input type="text" name="name" class="form-control" placeholder="Name" value="<?=$member['name'] ?>"required><br>
	        <label for="inputPhone" class="sr-only">Password</label>
	        <input type="text" name="phone" class="form-control" 
	        	maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
	        	placeholder="Phone" value="<?=$member['phone'] ?>" required><br>
	    
	        <button id="btn-Yes" class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:15px;">
	        	수 정 완 료
	        </button>
      </form>
      
		</div>
	</div>

	<div class="modal">
	</div>
		
		<?php include_once "../fragment/footer.php" ?>
	</body>
</html>