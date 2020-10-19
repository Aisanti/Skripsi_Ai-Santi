<?php 
	
	require '../function/koneksi.php';
	session_start();

	$id = $_GET['id'];
	mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai = $id");
	$_SESSION['berhasil'] = "Data berhasil dihapus";
	header('Location: index.php');
 ?>