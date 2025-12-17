<?php
if (isset($_POST["reg_user"])) {
	$user = $_POST["username"];
	$password = $_POST["password_1"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$password_confirm = $_POST["password_2"];
	if ($password == $password_confirm) {
		$conn = mysqli_connect("localhost", "root", "", "shop_db");
		$sql = "INSERT INTO customers (name,phone,email,password) VALUES('$user','$phone','$email','$password')";
		if (mysqli_connect_errno()) {
			echo "Server died" . mysqli_connect_error();
			exit();
		}
		if (mysqli_query($conn, $sql)) {
			echo "<script>window.location.href='index.php'</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html> 

<head>
	<title>Register Form</title>
	<link rel="stylesheet" type="text/css" href="sign-up.css">
</head>

<body>

	<form action="" method="POST">
		<p id="error"></p>
		<label>Username:</label>
		<input type="text" name="username" oninput="validate(event)" id="username"><br><br>

		<label>Email:</label>
		<input type="text" name="email" oninput="validate(event)" id="email"><br><br>

		<label>Phone:</label>
		<input type="text" name="phone" oninput="validate(event)" id="phone"><br><br>

		<label>Password:</label>
		<input type="password" name="password_1" oninput="validate(event)" id="password_1"><br><br>

		<label>Confirm Password:</label>
		<input type="password" name="password_2" oninput="validate(event)" id="password_2"><br><br>

		<button type="submit" id="submit" name="reg_user">Register</button>
	</form>


	<script>
		function validate(event) {
			const element = event.target;
			const value = element.value;
			const userPattern = /^([A-Z]|[a-z])[A-Za-z0-9_]{1,10}$/;
			let phPattern = /^(97|98)\d{8}$/;
			const emailRegex = /^[a-zA-Z]+[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
			const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

			switch (element.name) {

				case "username":
					if (userPattern.test(value)) {
						document.getElementById("error").innerText="";
						document.getElementById("submit").disabled= false;
					} else {
						document.getElementById("error").innerText="username error";
						document.getElementById("submit").disabled= true;
					}
					break;
				case "email":
					if(emailRegex.test(value)){
						document.getElementById("error").innerText="";
						document.getElementById("submit").disabled= false;
					}
					else{
						document.getElementById("error").innerText="email error";
						document.getElementById("submit").disabled= true;
					}
					break;
				case "phone":
					if(phPattern.test(value)){
						document.getElementById("error").innerText="";
						document.getElementById("submit").disabled= false;
					}
					else{
						document.getElementById("error").innerText="phone error";
						document.getElementById("submit").disabled= true;
					}
					break;
					default:
					if(passwordPattern.test(value)){
						document.getElementById("error").innerText="";
						document.getElementById("submit").disabled= false;
					}
					else{
						document.getElementById("error").innerText="password error";
						document.getElementById("submit").disabled= true;
					}
					break;
			}

		}
	</script>

</body>

</html>