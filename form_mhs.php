<?php

include('koneksi.php');


//Simpan Data
if(isset($_POST['simpan']))
{
	if($_GET['hal'] == "edit")
	{

	}else
	{
		$edit = mysqli_query($koneksi, "UPDATE tb_mhs set nama = $_POST 
		VALUES 	('$_POST[nama]',
				'$_POST[jurusan]',
				'$_POST[mata_kuliah]')
		");
		if($simpan)
		{
			echo "<script>
				alert(Simpan data Sukses!);
				document.location = form_mhs.php;
				</script>";
		}
		else
		{
			echo "<script>
				alert(Simpan Data Gagal);
				document.location = form_mhs.php;
				<script>";
		}
	}

}

//edit
if(isset($_GET['hal']))
{
	//Pengujuan jika edit data
	if($_GET['hal'] == "edit")
	{
		//Tampilkan Data Yang Akan Diedit
		$tampil = mysqli_query($koneksi, "SELECT * FROM tb_mhs WHERE id_mhs = '$_GET[id]'");
		$data = mysqli_fetch_array($tampil);
		if($data)
		{
			//jika data ditemukan, maka data ditampung ke dalam variabel
			$vnama = $data['nama'];
			$vjurusan = $data['jurusan'];
			$vmata_kuliah = $data['mata_kuliah'];
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
							<input class="input is-success" type="text" placeholder="Masukan Nama Mahasiswa" id="nama" name="nama" value="<?=@$vnama?>">
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
						    <input class="input is-info" type="text" placeholder="Masukan Jurusan" id="nama" name="jurusan" value="<?=@$vjurusan?>">
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
						    <input class="input is-link" type="text" placeholder="Masukan Mata Kuliah" value="" id="mata_kuliah" name="mata_kuliah" value="<?=$vmata_kuliah?>">
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
								<a href="form_mhs.php?=hal=edit&id=<?=$data['id_mhs']?>" class="button is-info is-small">Edit</a>
								<a href="form_mhs.php?hal=hapus&id=<?=$data['id_mhs']?>" onclick="return confirm('Apakah Yakin Menghapus Data Ini?')" class="button is-danger is-small" name="hapus">Hapus</a>
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