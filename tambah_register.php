<?php 
// koneksi database
include 'config.php';
 
// menangkap data yang di kirim dari form
$username = $_POST['username'];
$nim = $_POST['nim'];
$email = $_POST['email'];
$password = md5($_POST['password']);
 
// menginput data ke database
mysqli_query($conn,"insert into mahasiswa values('','$username','$nim','$email','$password')");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>