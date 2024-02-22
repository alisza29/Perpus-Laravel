<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <title></title>
</head>
<body>
    <h3> Daftar Akun </h3>
    <form action = "proses_tambah_siswa.php" method = "post">
        Nama Siswa : 
        <input type = "text" name = "nama_siswa" value = "" class = "form-control">
        Tanggal Lahir :
        <input type = "date" name = "tanggal_lahir" value = "" class = "form-control">
        Gender :
        <Select name = "gender" class = "form-control">
            <option></option>
            <option value = "L">Laki-laki</option>
            <option value = "P">Perempuan</option>
        </select>
        Alamat : 
        <textarea name = "alamat" class = "form-control" rows = "4"></textarea>
        Kelas : 
        <select name = "id_kelas" class = "form-control">
            <option></option>
            
            <?php
        include "koneksi.php";
        $qry_kelas = mysqli_query($conn, "select * from kelas");
        while ($data_kelas = mysqli_fetch_array($qry_kelas)){
            echo'<option value = "'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
        }
?>
</select>
Username :
<input type = "text" name = "username" value = "" class = "form-control">
Passsword :
<input type = "password" name = "password" value = "" class = "form-control">
<input type = "submit" name = "simpan" value = "Tambah Siswa" class = "btn btn-primary">
</form>
<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"></script>
</body>
</html>