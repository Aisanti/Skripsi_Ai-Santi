<?php 

  date_default_timezone_set("Asia/Bangkok");
  session_start();
  define('base_url', 'http://localhost/kepegawaian/');

  if(!isset($_SESSION['user'])){
    header('Location: login.php');
  } 


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Kepegawaian</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url; ?>assets/vendor/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row mt-2">
			<div class="col-md-3">
				<img src="<?= base_url; ?>assets/img/logo.jpeg" width="150" height="150">
			</div>
			<div class="col-md-6 text-center">
				<h2>Sistem Informasi Kepegawaian</h2><br>
				<h3>Desa Dayeuhkolot Kabupaten Bandung</h3>
			</div>
		</div>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		      <a class="nav-item nav-link" href="#">Home</a>
		      <a class="nav-item nav-link" href="<?= base_url; ?>pegawai">Data Pegawai</a>
		      <a class="nav-item nav-link" href="<?= base_url; ?>presensi">Presensi</a>
		      <a class="nav-item nav-link" href="<?= base_url; ?>penggajian">Penggajian</a>
		      <a class="nav-item nav-link" href="<?= base_url; ?>logout.php">Logout</a>
		      <!-- <a class="nav-item nav-link" href="<?= base_url; ?>laporan">Laporan</a> -->
		    </div>
		  </div>
		</nav>
	</div>
	