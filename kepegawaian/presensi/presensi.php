<?php 
  require '../function/koneksi.php';
  require '../header.php';

  $query = mysqli_query($koneksi, "SELECT * FROM pegawai");

 ?>
<div class="container-fluid mt-3 mb-5">
	<div class="row">
		<div class="col-md-12">
			 <form action="" method="get">
				 <input type="date" name="tanggal" class="float-left mr-2">
				 <button type="submit" class="btn btn-primary btn-sm">Cari</button>
			 </form>
			 <?php if(isset($_GET['tanggal'])) : ?>
				<h3 class="font-weight-light">Kehadiran <?php echo date('d M Y', strtotime($_GET['tanggal'])); ?></h3> 	
			 <?php else : ?>
				<h3 class="font-weight-light">Kehadiran <?php echo date('d M Y'); ?></h3> 	
			 <?php endif; ?>
			<table class="table">
				<thead>
					<tr>
						<th>NO</th>
						<th>NAMA</th>
						<th class="text-center">HADIR</th>
						<th class="text-center">SAKIT</th>
						<th class="text-center">IZIN</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no=1; 
						while($row = mysqli_fetch_assoc($query)) : 
							if(isset($_GET['tanggal'])){
							  	$tanggal = $_GET['tanggal'];
								$presensi = mysqli_query($koneksi, "SELECT * FROM presensi WHERE id_pegawai = '$row[id_pegawai]' AND tanggal = '$tanggal'");
							  }else{
							  	$tanggal = date('Y-m-d');
								$presensi = mysqli_query($koneksi, "SELECT * FROM presensi WHERE id_pegawai = '$row[id_pegawai]' AND tanggal = '$tanggal'");
							  }

							$row_presensi = mysqli_fetch_assoc($presensi);
					?>	
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $row['nama']; ?></td>
						<form action="proses_presensi.php" method="post">
							<input type="hidden" name="id_pegawai[]" value="<?php echo $row['id_pegawai']; ?>">
							<?php if(isset($_GET['tanggal'])) : ?>
								<input type="hidden" name="tanggal" value="<?php echo $_GET['tanggal']; ?>">
							<?php else : ?>
								<input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
							<?php endif; ?>

							<?php if(mysqli_num_rows($presensi) == 1 && $row_presensi['keterangan'] == 'hadir') : ?>
								<td class="text-center"><input type="checkbox" checked name="keterangan[]" value="hadir"></td>
							<?php else : ?>
								<td class="text-center"><input type="checkbox" name="keterangan[]" value="hadir"></td>
							<?php endif; ?>

							<?php if(mysqli_num_rows($presensi) == 1 && $row_presensi['keterangan'] == 'sakit') : ?>
								<td class="text-center"><input type="checkbox" checked name="keterangan[]" value="sakit"></td>
							<?php else : ?>
								<td class="text-center"><input type="checkbox" name="keterangan[]" value="sakit"></td>
							<?php endif; ?>

							<?php if(mysqli_num_rows($presensi) == 1 && $row_presensi['keterangan'] == 'izin') : ?>
								<td class="text-center"><input type="checkbox" checked name="keterangan[]" value="izin"></td>
							<?php else : ?>
								<td class="text-center"><input type="checkbox" name="keterangan[]" value="izin"></td>
							<?php endif; ?>
					</tr>
					<?php endwhile; ?>

				</tbody>
			</table>
							<button type="submit" class="btn btn-primary btn-sm text-center">Simpan</button>
						</form>
		</div>
	 </div>
</div>

 <?php require '../footer.php'; ?>