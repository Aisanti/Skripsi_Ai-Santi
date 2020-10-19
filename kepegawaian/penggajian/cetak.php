<?php 

	require_once '../function/koneksi.php';
	require_once '../pdf.php';

	$bulan = isset($_POST['bulan']) ? $_POST['bulan'] : '';

	$query = mysqli_query($koneksi, "SELECT * FROM pegawai");


	
	$pdf = 
	'<style>
	 	@page { 
	 		margin: 20px; 
	 	}
	 	table {
		  width: 100%;;
		}
	 </style>

	 <h3 align="center">Laporan Penggajian '.$bulan.'</h3><br/><br/>
	';

	$pdf .=  
	'<table border="1" cellpadding="5" cellspacing="0">
		<tr align="center">
			<th>NO</th>
			<th>NAMA</th>
			<th>JABATAN</th>
			<th>UANG YANG DITERIMA</th>
			<th>TANDA TANGAN</th>
	';

	$pdf .= '</tr>'; 

	$no = 1;
	while($data = mysqli_fetch_assoc($query)){
		$pdf .= 
		'<tr align="center">
			<td>'.$no.'</td>
			<td>'.$data['nama'].'</td>
			<td>'.$data['jabatan'].'</td>
			<td>Rp '.number_format($data['gaji']).'</td>
			<td></td>
		';

		$pdf .= '</tr>';

		$no++;
	}

	$pdf .= '</table>';

	$filename = 'Laporan-Gaji-'.$bulan.'.pdf';
	$print = new Pdf();
	$print->loadHtml($pdf);
	$print->render();
	$print->stream($filename, array("Attachment" => false));
	exit(0); 
	
 ?>