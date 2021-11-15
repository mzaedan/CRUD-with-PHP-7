<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "dbmhs";

$koneksi = mysqli_connect($server,$username,$password,$database)or die(mysqli_error($koneksi));

if(isset($_POST['simpan']))
{
	$simpan = mysqli_query($koneksi, "INSERT INTO tb_mhs (nama,jurusan,mata_kuliah) 
		VALUES 	('$_POST[nama]',
				'$_POST[jurusan]',
				'$_POST[mata_kuliah]')
	");

	if($simpan)
	{
		echo "<script>
				alert('Simpan Data Sukses');
				documnet.location='form_mhs.php;
				</script>";
	}
	else
	{
		echo "<script>
				alert('Simpan Data Gagal');
				documnet.location='form_mhs.php;
				</script>";

	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
	<section class="section">
	    <div class="container">
			<div class="card">
			  <header class="card-header">
			    <p class="card-header-title">
			      Tambah Data Mahasiswa
			    </p>
			  </header>
			  <div class="card-content">
			   
		    	<form action="form_mhs.php" method="POST">
		    		<div class="field mb-3 row">
					  <label class="label">Nama Mahasiswa</label>
					  <div class="control has-icons-left has-icons-right">
							<input class="input is-success" type="text" placeholder="Masukan Nama Mahasiswa" id="nama" name="nama" valu="">
							<span class="icon is-small is-left">
							    <i class="fas fa-user"></i>
							</span>
						</div>
						<p class="help is-success">Masukan Nama Mahasiswa</p>  
					</div>
					<div class="field mb-3 row">
					  <label class="label">Jurusan</label>
					  <div class="control has-icons-left has-icons-right">
					  	<div class="col-sm-10">
						    <input class="input is-info" type="text" placeholder="Masukan Jurusan" valu="" id="nama" name="jurusan">
						    <span class="icon is-small is-left">
						      <i class="fas fa-school"></i>
						    </span>
						  </div>
						  <p class="help is-info">Masukan Jurusan</p>
						</div>
					</div>
					<div class="field mb-3 row">
					  <label class="label">Mata Kuliah</label>
					  <div class="control has-icons-left has-icons-right">
					  	<div class="col-sm-10">
						    <input class="input is-link" type="text" placeholder="Masukan Mata Kuliah" value="" id="mata_kuliah" name="mata_kuliah">
						    <span class="icon is-small is-left">
						      <i class="fas fa-chalkboard-teacher"></i>
						    </span>
						  </div>
						  <p class="help is-link">Masukan Mata kuliah</p>
						</div>
					</div>
					<footer class="card-footer">
					   <button class="button is-success mt-3" style="margin-right: 10px;" name="simpan">Simpan</button>
					   <a href="form_mhs.php" class="button is-warning mt-3">Kembali</a>
					</footer>
				</form>
			</div>
		</div>
	</div>
</section>
</body>
</html>
