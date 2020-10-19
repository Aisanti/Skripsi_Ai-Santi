<?php 

  require '../function/koneksi.php';
  require '../header.php';

  if(isset($_GET['tanggal'])){
  	$tanggal = $_GET['tanggal'];
  	$query = mysqli_query($koneksi, "SELECT presensi.*, pegawai.nama FROM presensi JOIN pegawai ON presensi.id_pegawai = pegawai.id_pegawai WHERE tanggal = '$tanggal'");
  }else{
  	$tanggal = date('Y-m-d');
  	$query = mysqli_query($koneksi, "SELECT presensi.*, pegawai.nama FROM presensi JOIN pegawai ON presensi.id_pegawai = pegawai.id_pegawai WHERE tanggal = '$tanggal'");
  }

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
			 <a href="presensi.php" class="btn btn-primary btn-sm mb-5">Masukkan Presensi</a>
			 <div class="row">
			 	 <div class="col-md-6">
					 <form action="" method="get">
						 <input type="date" name="tanggal" class="float-left mr-2">
						 <button type="submit" class="btn btn-primary btn-sm">Cari</button>
					 </form>
			 	 </div>

			 	 <div class="col-md-6" align="right">
				 	<a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#cetakPresensi">Cetak</a>
			 	 </div>
			 </div>

			 <?php if(isset($_GET['tanggal'])) : ?>
				<h3 class="font-weight-light">Daftar Presensi <?php echo date('d M Y', strtotime($_GET['tanggal'])); ?></h3> 	
			 <?php else : ?>
				<h3 class="font-weight-light">Daftar Presensi <?php echo date('d M Y'); ?></h3>
			 <?php endif; ?>

			 <table class="table table-sm table-bordered table-striped">
			 	<tr>
			 		<th>NO</th>
			 		<th>NAMA</th>
			 		<th>KETERANGAN</th>
			 		<th>TANGGAL</th>
			 		<th>JAM MASUK</th>
			 		<!-- <th>AKSI</th> -->
			 	</tr>

			 	<?php if(mysqli_num_rows($query) == 0) : ?>
			 		<td colspan="12" class="text-center">Tidak ada data</td>
			 	<?php endif; ?>
			 	
			 	<?php 
				 	$no = 1;
				 	while($row = mysqli_fetch_assoc($query)) : 
				 ?>

				 	<tr>
				 		<td><?php echo $no; ?></td>
				 		<td><?php echo $row['nama']; ?></td>
				 		<td><?php echo $row['keterangan']; ?></td>
				 		<td><?php echo $row['tanggal']; ?></td>
				 		<td><?php echo $row['jam']; ?></td>
				 		<!-- <td>
				 			<a href="edit.php?id=<?php echo $row['id_kelahiran']; ?>" class="badge badge-success">Edit</a>
				 			<a onclick="return confirm('Apa anda yakin?');" href="hapus.php?id=<?php echo $row['id_kelahiran']; ?>" class="badge badge-danger">Hapus</a>
				 		</td> -->
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
<div class="modal fade" id="cetakPresensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        	<div class="form-group">
        		<label>Dari Tanggal</label>
        		<input type="date" name="dari" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>Sampai Tanggal</label>
        		<input type="date" name="sampai" class="form-control">
        	</div>
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