<?php

//Koneksi Database
include('koneksi.php');


//jika tombol simpan diklik
if(isset($_POST['simpan']))
{
	//Pengujian Apakah data akan diedit atau disimpan baru
	if (isset($_GET['hal'])) {
		if($_GET['hal'] == "edit") {
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE tb_mhs set
												nama = '$_POST[nama]',
												jurusan = '$_POST[jurusan]',
												mata_kuliah = '$_POST[mata_kuliah]'
											WHERE id_mhs = '$_GET[id]' 
										");
			if($edit) { //jika edit sukses
				echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
					</script>";
			} else {
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
					</script>";
			}
		}
	} else {
		//Data akan disimpan Baru
		$simpan = mysqli_query($koneksi, "INSERT INTO tb_mhs (nama, jurusan, mata_kuliah)
									  VALUES ('$_POST[nama]', 
											   '$_POST[jurusan]', 
											   '$_POST[mata_kuliah]')
									 ");
		if($simpan) //jika simpan sukses
		{
			echo "<script>
					alert('Simpan data suksess!');
					document.location='index.php';
				 </script>";
		}
		else
		{
			echo "<script>
					alert('Simpan data GAGAL!!');
					document.location='index.php';
				 </script>";
		}
	}


	
}


//Pengujian jika tombol Edit / Hapus di klik
if(isset($_GET['hal']))
{
	//Pengujian jika edit Data
	if($_GET['hal'] == "edit")
	{
		//Tampilkan Data yang akan diedit
		$tampil = mysqli_query($koneksi, "SELECT * FROM tb_mhs WHERE id_mhs = '$_GET[id]' ");
		$data = mysqli_fetch_array($tampil);
		if($data)
		{
			//Jika data ditemukan, maka data ditampung ke dalam variabel
			$nama = $data['nama'];
			$jurusan = $data['jurusan'];
			$mata_kuliah = $data['mata_kuliah'];
		}
	}
	else if ($_GET['hal'] == "hapus")
	{
		//Persiapan hapus data
		$hapus = mysqli_query($koneksi, "DELETE FROM tb_mhs WHERE id_mhs = '$_GET[id]' ");
		if($hapus){
			echo "<script>
					alert('Hapus Data Suksess!!');
					document.location='index.php';
				 </script>";
		}
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
			   
		    	<form  method="POST">
		    		<div class="field mb-3 row">
					  <label class="label">Nama Mahasiswa</label>
					  <div class="control has-icons-left has-icons-right">
							<input class="input is-success" type="text" placeholder="Masukan Nama Mahasiswa" name="nama" value="<?=@$nama?>">
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
						    <input class="input is-info" type="text" placeholder="Masukan Jurusan" name="jurusan" value="<?=@$jurusan?>">
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
						    <input class="input is-link" type="text" placeholder="Masukan Mata Kuliah" name="mata_kuliah" value="<?=@$mata_kuliah?>">
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



<section class="section">
	<div class="container">
		<div class="card">
			<header class="card-header">
			<p class="card-header-title">
				Data Mahasiswa
			</p>
			</header>
			<div class="card-content">
			<a href="form.php" class="button is-link"><span class="fas fa-plus-circle" style="margin-right: 8px;"></span>Tambah Data Mahasiswa</a>
			<a href="importexcel.php" class="button is-success"><span class="fas fa-file-export" style="margin-right: 8px;"></span>Export Ke Excel</a>
			<a href="upload.php" class="button is-primary"><span class="fas fa-file-import" style="margin-right: 8px;"></span>Import Ke Database</a>
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
							include('koneksi.php');
							$no = 1;
							$tampil = mysqli_query($koneksi, "SELECT * FROM tb_mhs order by id_mhs desc");
							while($data = mysqli_fetch_array($tampil)){
						?>
						<tr>
							<td><?=$no++;?></td>
							<td><?=$data['nama']?></td>
							<td><?=$data['jurusan']?></td>
							<td><?=$data['mata_kuliah']?></td>
							<td>
								<a href="index.php?hal=edit&id=<?=$data['id_mhs']?>" class="button is-info is-small">Edit</a>
								<a href="index.php?hal=hapus&id=<?=$data['id_mhs']?>" onclick="return confirm('Apakah Yakin Menghapus Data Ini?')" class="button is-danger is-small" name="hapus">Hapus</a>
							</td>
						</tr>
						<?php } ?>
						
					</tbody>	
				</thead>
			</table>
			</div>
		</div>
	</div>
</section>