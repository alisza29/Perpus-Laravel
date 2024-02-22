<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <?php
    include "koneksi.php";
    $qry_get_siswa = mysqli_query ($conn," select * from siswa where id_siswa ='".$_GET['id_siswa']."'");
    $dt_siswa = mysqli_fetch_array($qry_get_siswa);
    ?>
    <h3>Tambah Siswa</h3>
    <form action="proses_tambah_siswa.php" method="post">
        <input type="hidden" name="id_siswa" value="<?=$dt_siswa['id_siswa']?>">
        nama siswa :
        <input type="text" name="nama_siswa" value="<?=$dt_siswa['nama_siswa']?>" class="form-control">
        tanggal lahir :
        <input type="date" name="tanggal_lahir" value="<?=$dt_siswa['tanggal_lahir']?>" class="form-control">
        gender :
        <?php
        $arr_gender=array('L'=>'Laki-Laki','P','Perempuan');
        ?>
        <select name="gender" class="form-control">
            <option></option>
            <?php foreach ($arr_gender as $key_gender => $val_gender) :
            if ($key_gender==$dt_siswa['gender']){
                $selek="selected";
            } else {
                $selek="";
            }
            ?>
            <option value="<?=$key_gender?>"
            <?=$selek?>><?=$val_gender?></option>
            <?php endforeach ?>
        </select>
        Alamat :
        <textarea name="alamat" class="form-control" rows="4"><? $dt_siswa['alamat']?></textarea>
        kelas : 
        <select name="id_kelas" class="form-control">
        <option></option>
        
        <?php
        include "koneksi.php";
        $qry_kelas=mysqli_query($conn, "select * from kelas");
        while ($data_kelas=mysqli_fetch_array($qry_kelas)){
            if ($data_kelas['id_kelas']==$dt_siswa['id_kelas']){
                $selek="sleected";
            } else {
                $selek="";
            } echo '<option value="'.$data_kelas['id_kelas'].'"'.$selek.'>'.$data_kelas['nama_kelas'].'</option>';
        }
        ?>
        </select>
        username :
        <input type="text" name="username" value="<?=$dt_siswa['username']?>" class="form-control">
        Password :
        <input type="password" name="password" value="" class="form-control">
        <input type="submit" name="simpan" value="Ubah siswa" class="btn btn-primary">
        
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>