<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<?php 
include 'navbar.php';?>
    <h3>Tambah Buku</h3>
    <form action="proses_tambah_buku.php" method="post" enctype="multipart/form-data">
        Nama Buku:
        <input type="text" name="nama_buku" value="" class="form-control">
        Deskripsi :
        <textarea name="deskripsi" cols = 147 class="form-control"></textarea>
        Foto :
        <input type="file" name="foto" class="form-control">
        <br>
        <input type="submit" name="submit" value="Tambah Produk" class="btn btn-dark text-light">
    </form>
</body>
</html>