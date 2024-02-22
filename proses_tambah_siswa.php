<?php
if($_POST){
    $nama_siswa=$_POST['nama_siswa'];
    $tanggal_lahir=$_POST['tanggal_lahir'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $id_kelas=$_POST['id_kelas'];
    if(empty($nama_siswa)){
        echo"<script>alert('Data tidak boleh ada yang kosong!');location.href='tambah_siswa.php';</script>";
    } elseif(empty($tanggal_lahir)){
        echo"<script>alert('Data tidak boleh ada yang kosong!');location.href='tambah_siswa.php';</script>";
    } elseif(empty($alamat)){
        echo"<script>alert('Data tidak boleh ada yang kosong!');location.href='tambah_siswa.php';</script>";
    } elseif(empty($gender)){
        echo"<script>alert('Data tidak boleh ada yang kosong!');location.href='tambah_siswa.php';</script>";
    } elseif(empty($username)){
        echo"<script>alert('Data tidak boleh ada yang kosong!');location.href='tambah_siswa.php';</script>";
    } elseif(empty($password)){
        echo"<script>alert('Data tidak boleh ada yang kosong!');location.href='tambah_siswa.php';</script>";
    } elseif(empty($id_kelas)){
        echo"<script>alert('Data tidak boleh ada yang kosong!');location.href='tambah_siswa.php';</script>";
    }else{
        include "koneksi.php";
        $insert=mysqli_query($conn,"INSERT INTO siswa (nama_siswa,tanggal_lahir,gender,alamat,username,password,id_kelas) VALUE 
        ('".$nama_siswa."','".$tanggal_lahir."','".$gender."','".$alamat."','".$username."','".$password."','".$id_kelas."')")or
        die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan siswa');location.href='tambah_siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan siswa');location.href='tambah_siswa.php';</script>";
        }
    }

}
?>