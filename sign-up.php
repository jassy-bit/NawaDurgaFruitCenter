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
			echo "fucking server died" . mysqli_connect_error();
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
	<meta charset="utf-8">
	<link rel="stylesheet" href="sign-up.css">
	<script>
		function validate() {
			var x = document.getElementById("nm").value;
			if (x == "") {
				alert("Name is mandatory");
				document.getElementById("nm").value = "";
				return false;
			} else {
				if (x.match('[a-zA-Z ]*$') == false) {
					alert("Name must contain alphabets only");
					document.getElementById("nm").value = "";
					return false;
				}
			}
			var email = document.getElementById("eml").value;
			if (email == "") {
				alert("Email is mandatory");
				document.getElementById("eml").value = "";
				return false;
			} else {
				if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) == false) {
					alert("Invalid Email-Id");
					document.getElementById("eml").value = "";
					return false;
				}
			}
			var phno = document.getElementById("pno").value;
			if (phno == "") {
				alert("Contact number is mandatory");
				document.getElementById("pno").value = "";
				return false;
			} else {
				if (/^[0-9]{10}$/.test(phno) == false) {
					alert("Invalid Contact number");
					document.getElementById("pno").value = "";
					return false;
				}
			}
			var pass = document.getElementById("ps").value;
			if (pass == "") {
				alert("Password is mandatory");
				document.getElementById("ps").value = "";
				return false;
			} else {
				if (/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,15}$/.test(pass) == false) {
					alert("Invalid Password");
					document.getElementById("ps").value = "";
					return false;
				}
			}
			var cpass = document.getElementById("cps").value;
			if (cpass == "") {
				alert("Kindly retype password");
				document.getElementById("cps").value = "";
				return false;
			} else {
				if (cpass != pass) {
					alert("Password not Matching!");
					document.getElementById("cps").value = "";
					return false;
				}
			}
			if (document.getElementById('st') == "") {
				alert("Please provide Address");
				document.getElementById("st").value = "";
				return false;
			}
			if (document.getElementById('cy') == "") {
				alert("Please provide City name");
				document.getElementById("cy").value = "";
				return false;
			}
			if (document.getElementById('stt') == "") {
				alert("Please provide State name");
				document.getElementById("stt").value = "";
				return false;
			}
			return true;
		}
	</script>
</head>

<body>
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="">
		<div class="input-group">
			<label>Username</label>
			<input type="text" id="nm" name="username">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" id="email">
		</div>
		<div class="input-group">
			<label>Phone</label>
			<input type="text" name="phone" id="phone">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" id="ps" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" id="cps">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Sign-up</button>
		</div>
	<p>
		Already a member? <a href="index.php">Login</a>
	</p>
	</form>
</body>

</html>