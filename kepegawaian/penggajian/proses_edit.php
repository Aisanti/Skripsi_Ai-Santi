<?php 

	require '../function/koneksi.php';
	session_start();

	$id = $_POST['id'];
	$gaji = $_POST['gaji'];

	$sql = "UPDATE pegawai SET gaji = '$gaji' WHERE id_pegawai = $id";
	mysqli_query($koneksi, $sql);
	$_SESSION['berhasil'] = 'Data berhasil diubah';
	header('Location: index.php');

 ?>