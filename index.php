<?php 
require 'connect.php';

session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;	
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tugas Rekayasa Web</title>
	<link rel="stylesheet" type="text/css" href="style_index.css">
</head>
<body>
	<a href="logout.php">Logout</a> <br>

	<p>Selamat Datang : <span class=""><?php echo $_SESSION["user"];?></span> </p>
	

	<div class="wrapper">
		
	<h1>DATA MAHASISWA</h1>
	<h2><a href="tambah.php">[+] Tambah Data</a></h2>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr class="judul">
			<td>No.</td>
			<td>Nama</td>
			<td>NRP</td>
			<td>Jurusan</td>
			<td>Email</td>
			<td>Pilihan</td>
		</tr>

<?php while ( $row = mysqli_fetch_assoc($result)): ?>
	<tr>
		<td><?= $row["id"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["nrp"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td>
			<a href="update.php?id= <?= $row["id"]; ?>">Update</a> |
			<a href="hapus.php?id= <?= $row["id"]; ?>">Hapus</a>
		</td>
	</tr>
<?php endwhile; ?>
	</table>

	</div>
</body>
</html>