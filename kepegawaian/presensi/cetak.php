<?php 

	require_once '../function/koneksi.php';
	require_once '../pdf.php';

	$dari = isset($_POST['dari']) ? $_POST['dari'] : '';
	$sampai = isset($_POST['sampai']) ? $_POST['sampai'] : '';

	$query = mysqli_query($koneksi, "SELECT * FROM presensi WHERE tanggal BETWEEN '$dari' AND '$sampai'");


	
	$pdf = 
	'<style>
	 	@page { 
	 		margin: 20px; 
	 	}
	 	table {
		  width: 100%;
		  border-collapse: collapse;
		  font-size: 12px;
		}
	 </style>

	 <h3 align="center">Laporan Prensesi '.date('d-M-Y', strtotime($dari)).' sampai '.date('d-M-Y', strtotime($sampai)).'</h3><br/><br/>
	';

	$pdf .=  
	'<table border="1" cellpadding="5" cellspacing="0">
		<tr align="center">
			<th>NO</th>
			<th>NAMA</th>
			<th>JABATAN</th>
			<th>KETERANGAN</th>
	';

	$pdf .= '</tr>'; 

	$no = 1;
	while($data = mysqli_fetch_assoc($query)){
		$query_pegawai = mysqli_query($koneksi, "SELECT nama, jabatan FROM pegawai WHERE id_pegawai = '$data[id_pegawai]'");
		$pegawai = mysqli_fetch_assoc($query_pegawai); 
		$pdf .= 
		'<tr align="center">
			<td>'.$no.'</td>
			<td>'.$pegawai['nama'].'</td>
			<td>'.$pegawai['jabatan'].'</td>
			<td>'.$data['keterangan'].'</td>
		';

		$pdf .= '</tr>';

		$no++;
	}

	$pdf .= '</table>';

	$filename = 'Laporan-Presensi-'.$dari.'-'.$sampai.'.pdf';
	$print = new Pdf();
	$print->loadHtml($pdf);
	$print->render();
	$print->stream($filename, array("Attachment" => false));
	exit(0); 
	
 ?>