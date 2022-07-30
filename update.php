<?php 

require 'connect.php';
require 'function.php';

//ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM bio WHERE id = $id")[0];
// var_dump($mhs);

if(isset($_POST["submit"]) ){

//ambil data dari tiap elemen
		$nama = htmlspecialchars($_POST["nama"]);
		$nrp = htmlspecialchars($_POST["nrp"]);
		$email = htmlspecialchars($_POST["email"]);
		$jurusan = htmlspecialchars($_POST["jurusan"]);

		//query insert data
		$query = "UPDATE bio 
			  SET nama = '$nama', nrp = '$nrp', email = '$email', jurusan = '$jurusan'
			  WHERE id = $id";


		mysqli_query($conn,$query);

		header("location:index.php");
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
	<link rel="stylesheet" type="text/css" href="style_update.css">
</head>
<body style="text-decoration: none;">

<h1>Update Data</h1>
<div class="wrapper">
	
	<div class="form-style">
		
		<form action="" method="post" >
			<div class="input-form">
				
			<input type="hidden" name="id" value="<?= $data["id"]?>">
			Nama<br>
			<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?> ">
			NRP<br>
			<input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?> ">
			Email<br>
			<input type="text" name="email" id="email" value="<?= $mhs["email"]; ?> ">
			</div>
			
			<div class="jur">	
			Jurusan<br>
			<select name="jurusan">
				<option value="Informatika" <?php if($mhs["jurusan"]=='Informatika'){echo 'selected';};?>>Informatika</option>
				<option value="Sistem Informasi" <?php if($mhs["jurusan"]=='Sistem Informasi'){echo 'selected';};?>>Sistem Informasi</option>
				<option value="Teknik Mesin" <?php if($mhs["jurusan"]=='Teknik Mesin'){echo 'selected';};?>>Teknik Mesin</option>
			</select>
			</div>
			<div class="btn">
				<input type="submit" name="submit" value="Submit Data">	
				<!-- <button type="submit" name="submit">Update Data</button> -->
			</div>
		</form>

	</div>
</div>

</body>
</html>