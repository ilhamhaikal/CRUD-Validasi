<?php 
require 'connect.php';

session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;	
}

$emailErr = "";

	//cek apakah tombol submit sudah ditekan
	if(isset($_POST["submit"]) ){
		//ambil data dari tiap elemen
		$nama = htmlspecialchars($_POST["nama"]);
		$nrp = htmlspecialchars($_POST["nrp"]);
		$email = htmlspecialchars($_POST["email"]);
		$jurusan = htmlspecialchars($_POST["jurusan"]);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 			 $emailErr = "Invalid email format";
		}else {
		//query insert data
		$query = "INSERT INTO bio VALUES ('','$nama','$nrp','$jurusan','$email')";

		mysqli_query($conn,$query);

		header("location:index.php");

		}

	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<link rel="stylesheet" type="text/css" href="style_tambah.css">
</head>
<body style="text-decoration: none;">

<h1>TAMBAH DATA MAHASISWA</h1>
<div class="wrapper">
		
	<div class="form-style">
		<form action="" method="post" >
			<div class="input-form">
						Nama<br>
						<input type="text" name="nama" id="nama" required placeholder="Nama Lengkap">
						NRP<br>
						<input type="text" name="nrp" id="nrp" required placeholder="Nomer Induk Mahasiswa">
						Email
						<span class="error">* <?php echo $emailErr;?></span>
						<br>
						<input type="text" name="email" id="email" placeholder="E-mail">

			</div>
			<div class="jur">
						Jurusan:<br>
						<select name="jurusan">
							<option value="NULL">Pilih Jurusan</option>
							<option value="Informatika">Informatika</option>
							<option value="Sistem Informasi">Sistem Informasi</option>
							<option value="Teknik Mesin">Teknik Mesin</option>
						</select>
			</div>
			<div class="btn">
						<input type="submit" name="submit" value="Submit Data">
						<!-- <button type="submit" name="submit">Tambah</button> -->
			</div>
		</form>
	</div>

</div>	

</body>
</html>