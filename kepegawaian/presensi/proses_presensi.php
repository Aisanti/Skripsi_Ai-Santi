<?php 

	require '../function/koneksi.php';
	date_default_timezone_set("Asia/Bangkok");
	session_start();


	for($i=0; $i<count($_POST['id_pegawai']); $i++)
	{
		$id_pegawai = $_POST['id_pegawai'][$i];
		$keterangan = $_POST['keterangan'][$i];
		$tanggal = $_POST['tanggal'];
		$jam = date('H:i:s');
		if($keterangan != ''){
			$cek_presensi = mysqli_query($koneksi, "SELECT * FROM presensi WHERE id_pegawai = '$id_pegawai' AND tanggal = '$tanggal'");
			if(mysqli_num_rows($cek_presensi) == 0){
				$sql = "INSERT INTO presensi(id_pegawai, keterangan, tanggal, jam) VALUES('$id_pegawai', '$keterangan', '$tanggal', '$jam')";
				$query = mysqli_query($koneksi, $sql);
			}else{
				$sql = "UPDATE presensi SET keterangan = '$keterangan',
											tanggal = '$tanggal'
											WHERE id_pegawai = '$id_pegawai'";
				$query = mysqli_query($koneksi, $sql);							
			}
		}

	}

	$_SESSION['berhasil'] = 'Data berhasil disimpan';
	header('Location: index.php');

 ?>
