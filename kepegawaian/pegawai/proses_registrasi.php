<?php 
	
	require '../function/koneksi.php';
	session_start();

	$nama = $_POST['nama'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tanggal_masuk = $_POST['tanggal_masuk'];
	$jabatan = $_POST['jabatan'];
	$gaji = $_POST['gaji'];

	$sql = "INSERT INTO pegawai(nama, tempat_lahir, tanggal_lahir, alamat, jenis_kelamin, tanggal_masuk, jabatan, gaji) VALUES ('$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$jenis_kelamin', '$tanggal_masuk', '$jabatan', '$gaji')";
	mysqli_query($koneksi, $sql);
	$_SESSION['berhasil'] = 'Data berhasil disimpan';
	header('Location: index.php');

 ?>