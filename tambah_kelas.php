<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <h3>Tambah Kelas</h3>
    <form action ="proses_tambah_kelas.php" method="post">
        Nama kelas:
        <input type="text" name="nama_kelas" value="" class="form-control">
        Kelompok:
        <input type="text" name="kelompok" value="" class="form-control">
        <!-- Angkatan:
        <input type="text" name="angkatan" value="" class="form-control"> -->
        <input type="submit" name="simpan" value="Tambah Kelas" class="btn btn-primary">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>