<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data mahasiswa.xls");


?>

<h3 style="text-align: center;">Data Mahasiswa</h3>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Mata Kuliah</th>
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
            </tr>
            <?php } ?>
            
        </tbody>	
    </thead>
</table>