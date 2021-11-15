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
			      Data Mahasiswa
			    </p>
			  </header>
			  <div class="card-content">
			  	<a href="create.php" class="button is-link"><span class="fas fa-plus-circle" style="margin-right: 8px;"></span>Tambah Data Mahasiswa</a>
			  	<table class="table is-striped mt-3 center" style="text-align:center; margin: 0px auto;">
			  		<thead>
			  			<tr>
				  			<th>No</th>
				  			<th>Nama</th>
				  			<th>Jurusan</th>
				  			<th>Mata Kuliah</th>
				  			<th>OPSI</th>
			  			</tr>
			  			<tbody>
			  				<?php
							  $no = 1;
							  $tampil = mysqli_query($koneksi, "SELECT * FROM tb_mhs order by id_mhs desc");
							  while($data = mysqli_fetch_array($tampil)):
							?>
							<tr>
								<td><?=$no++;?></td>
								<td><?=$data['nama']?></td>
								<td><?=$data['jurusan']?></td>
								<td><?=$data['mata_kuliah']?></td>
								<td>
									<a href="edit.php?&id=<?=$data['id_mhs']?>" class="button is-info is-small">Edit</a>
									<a href="#" class="button is-danger is-small">Hapus</a>
								</td>
							</tr>
							<?php endwhile; ?>
			  				
			  			</tbody>	
			  		</thead>
				</table>
			  </div>
			</div>
		</div>
	</section>
</body>
</html>