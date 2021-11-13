<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "dbmhs";

$koneksi = mysqli_connect($server,$username,$password,$database);
if(!$koneksi){
	die("Database Tidak Terkoneksi");
}else{
	echo "Koneksi Berhasil";
}

?>
