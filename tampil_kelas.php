<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title></title>
<style>
</style>
</head>
<body>
<?php include 'navbar.php';?>
    <h3> Data Kelas</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO.</th>
                <th>NAMA KELAS</th>
                <th>KELOMPOK</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "koneksi.php";
            $qry_siswa=mysqli_query($conn,"SELECT * from siswa join kelas on kelas.id_kelas=siswa.id_kelas");
            $no=0;
            while($dt_siswa=mysqli_fetch_array($qry_siswa)){
            $no++;?>
    <tr>              
    <td><?=$no?></td>
    <td><?=$dt_siswa['nama_kelas']?></td>
     <td><?=$dt_siswa['kelompok']?></td>
     
     <td>
    <a href="ubah_siswa.php?id_kelas=<?=$dt_siswa['id_kelas']?>" class="btn btn-success">Ubah</a> | <a href="hapus.php?id_siswa=<?=$dt_siswa['id_kelas']?>" 
    onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
    </tr>
    <?php 
 }
    ?>
</tbody>
    </table>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<a href="tambah_kelas.php"><input type="button" name='' value="Add Kelas" class="btn btn-danger"></a>
</body>
</html>