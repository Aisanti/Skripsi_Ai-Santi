<?php 
	
	require '../function/koneksi.php';
	session_start();

	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tanggal_masuk = $_POST['tanggal_masuk'];
	$jabatan = $_POST['jabatan'];

	$sql = "UPDATE pegawai SET nama = '$nama', 
								tempat_lahir = '$tempat_lahir', 
								tanggal_lahir = '$tanggal_lahir', 
								alamat = '$alamat', 
								jenis_kelamin = '$jenis_kelamin', 
								tanggal_masuk = '$tanggal_masuk', 
								jabatan = '$jabatan' 
								WHERE id_pegawai = $id";
	mysqli_query($koneksi, $sql);
	$_SESSION['berhasil'] = 'Data berhasil diubah';
	header('Location: index.php');

 ?>