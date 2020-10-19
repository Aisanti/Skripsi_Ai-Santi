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
			 
			 <div class="row">
			 	<div class="col-md-6">
			 		<h3 class="font-weight-light">Daftar Penggajian</h3>
			 	</div>

			 	<div class="col-md-6" align="right">
			 		<a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#cetakGaji">Cetak</a>
			 	</div>
			 </div>
			 <table class="table table-sm table-bordered table-striped">
			 	<tr>
			 		<th>NO</th>
			 		<th>NAMA</th>
			 		<th>JABATAN</th>
			 		<th>Uang yang diterima</th>
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
				 		<td><?php echo $row['jabatan']; ?></td>
				 		<td><?php echo 'Rp '.number_format($row['gaji']); ?></td>
				 		<td>
				 			<a href="edit.php?id=<?php echo $row['id_pegawai']; ?>" class="badge badge-success">Edit</a>
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

<!-- Modal -->
<div class="modal fade" id="cetakGaji" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cetak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cetak.php" method="post">
        	<label>Bulan</label>
			<select class="form-control" name="bulan">
				<option value="Januari">JANUARI</option>
				<option value="Februari">FEBRUARI</option>
				<option value="Maret">MARET</option>
				<option value="April">APRIL</option>
				<option value="Mei">MEI</option>
				<option value="Juni">JUNI</option>
				<option value="Juli">JULI</option>
				<option value="Agustus">AGUSTUS</option>
				<option value="September">SEPTEMBER</option>
				<option value="Oktober">OKTOBER</option>
				<option value="November">NOVEMBER</option>
				<option value="Desember">DESEMBER</option>
					</select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Cetak</button>
        </form>
      </div>
    </div>
  </div>
</div>

 <?php require '../footer.php'; ?>