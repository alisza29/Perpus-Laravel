<?php 
session_start();
if($_SESSION['status_login']!=true){
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Perpustakaan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="buku.php">Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="histori_peminjaman.php">Transaksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tampil_siswa.php">Settings</a>
      </ul>
    </div>
  </div>
</nav>
    <div class="container bg-light rounded" style="margin-top:10px">