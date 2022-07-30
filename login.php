<?php 
session_start();
require 'connect.php';

//mengecek apakah cookie masih ada
if (isset($_COOKIE['login'])) {
	if ($_COOKIE['login']=='true') {

		$_SESSION['login']=true;
	}
}
 
if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}
 
if(isset($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];

		//cek password dan username
	$result = mysqli_query($conn, "SELECT * FROM user WHERE user = '$username' AND pass = '$password' ");

	if( mysqli_num_rows($result) === 1 ) {

		//set [session]
		$_SESSION["login"] = true;

		$_SESSION["user"] = $username;

		//ingat saya [cookie]
		if (isset($_POST["ingat"]) ) {
			//buat cookie
			setcookie('login', 'true', time()+60);
		}

		echo "<script> alert('Selamat datang $username');
			  document.location.href = 'index.php';
			  </script>";

		exit;
	}
	echo "Password/Username Salah";
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="style_login.css">
</head>
<body>
	<div class="wrapper">
	<h1>LOGIN</h1>
	<form action="" method="post" >
		<div class="textbox">
			<!-- Username <br> -->
			<input type="text" name="username" id="username" placeholder="Username">
		</div>
		
		<div class="textbox">
			<!-- Password<br> -->
			<input type="Password" name="password" id="password" placeholder="Password">
		</div>

		<div class="ingat">
		<input type="checkbox" name="ingat" id="ingat">
		<label> Ingat Saya  </label>
		</div>

		<br>
		<div class="btn">
		<!-- <input type="submit" name="login" value="Login"> -->
		</div>
		<button type="submit" name="login">Login</button>
	</form>
	</div>
</body>
</html>