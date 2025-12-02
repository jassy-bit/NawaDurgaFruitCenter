<?php
session_start();
if (isset($_POST["login_user"])) {
	$user = $_POST["username"];
	$password = $_POST["password"];
		$conn = mysqli_connect("localhost", "root", "", "shop_db");
		$sql = "SELECT * FROM customers where name = '$user'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if($password == $row["password"]) {
				$_SESSION["username"] = $row["name"];
				header("location:index.php");
			}
		}
		else {
			echo "<script>alert('user not found');</script>";
		}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system</title>
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playwrite+NO:wght@100..400&display=swap" rel="stylesheet"> <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>  
	<section>
		<div class="left">
    <img src="images/logo.png" alt="Site Logo" class="logo">
	<p class="logoName"><bold>N</bold>awa<br><bold>D</bold>urga<br><bold>F</bold>uit<br><bold>S</bold>hop</p>
		</div>
	<div class="right">
  <form method="post" action="">
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="sign-up.php">Sign up</a>
  	</p>
  </form>
	</div>
	</section>
</body>
</html>