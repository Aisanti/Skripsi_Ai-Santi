<?php 

  require '../function/koneksi.php';
  require '../header.php';

  $query = mysqli_query($koneksi, "SELECT * FROM pegawai");
  
 ?>
<div class="container-fluid mt-3">
	<div class="row">	
		<div class="col-md-12">	
			 <?php if(isset($_SESSION['berhasil'])) : ?>
				 <div class="alert alert-success">
				 	<?= $_SESSION['berhasil']; ?>
				 </div>
				 <?php unset($_SESSION['berhasil']); ?>
			 <?php endif; ?>
			 <a href="registrasi_pegawai.php" class="btn btn-primary btn-sm mb-5">Tambah Pegawai</a>
			 <h3 class="font-weight-light">Daftar Pegawai</h3>
			 <table class="table table-sm table-bordered table-striped">
			 	<tr>
			 		<th>NO</th>
			 		<th>NAMA</th>
			 		<th>TEMPAT LAHIR</th>
			 		<th>TGL LAHIR</th>
			 		<th>ALAMAT</th>
			 		<th>JENIS KELAMIN</th>
			 		<th>TGL MASUK</th>
			 		<th>JABATAN</th>
			 		<th>AKSI</th>
			 	</tr>

			 	<?php if(mysqli_num_rows($query) == 0) : ?>
			 		<td colspan="10" class="text-center">Tidak ada data</td>
			 	<?php endif; ?>

			 	<?php 
				 	$no = 1;
				 	while($row = mysqli_fetch_assoc($query)) : ?>
				 	<tr>
				 		<td><?php echo $no; ?></td>
				 		<td><?php echo $row['nama']; ?></td>
				 		<td><?php echo $row['tempat_lahir']; ?></td>
				 		<td><?php echo $row['tanggal_lahir']; ?></td>
				 		<td><?php echo $row['alamat']; ?></td>
				 		<td><?php echo $row['jenis_kelamin']; ?></td>
				 		<td><?php echo $row['tanggal_masuk']; ?></td>
				 		<td><?php echo $row['jabatan']; ?></td>
				 		<td>
				 			<a href="edit.php?id=<?php echo $row['id_pegawai']; ?>" class="badge badge-success">Edit</a>
				 			<a onclick="return confirm('Apa anda yakin?');" href="hapus.php?id=<?php echo $row['id_pegawai']; ?>" class="badge badge-danger">Hapus</a>
				 		</td>
				 	</tr>
			 	<?php 
			 		$no++;
			 		endwhile; 
			 	?>
			 </table>
		</div>
	 </div>
</div>

 <?php require '../footer.php'; ?>