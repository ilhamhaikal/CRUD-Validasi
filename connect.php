<?php 
//koneksi ke database
$conn = mysqli_connect("localhost","root","","mahasiswa");

// inisialisasi SQL sebelum mengambil data tabel dari MYSQL
$result = mysqli_query($conn,"SELECT * FROM bio");
if(!$result){
        die ("Query Error: ".mysqli_errno($conn).
           " - ".mysqli_error($conn));
      }

 //Mengambil data dari database
?>