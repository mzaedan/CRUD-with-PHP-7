<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "dbmhs";

$koneksi = mysqli_connect($server,$username,$password,$database)or die(mysqli_error($koneksi));

?>
