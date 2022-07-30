<?php 
require 'connect.php';


function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM bio WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function update($data){
	global $conn;

	$id = $_POST["id"];
	$nama = htmlspecialchars($_POST["nama"]);
	$nrp = htmlspecialchars($_POST["nrp"]);
	$email = htmlspecialchars($_POST["email"]);
	$jurusan = htmlspecialchars($_POST["jurusan"]);

	$query = "UPDATE bio 
			  SET nama = '$nama', nrp = '$nrp', email = '$email', jurusan = '$jurusan'
			  WHERE id = $id";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

 ?>