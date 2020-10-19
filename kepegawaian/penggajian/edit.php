<?php 

  require '../function/koneksi.php';
  require '../header.php';

  $id = $_GET['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai = $id");
  $row = mysqli_fetch_assoc($query);
 ?>
<div class="container-fluid mt-3 mb-5">
	<div class="row">	
		<div class="col-md-8">	
			<h4 class="mb-5">Edit Gaji Pegawai</h4>
			<form action="proses_edit.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<div class="form-group row">
				    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
				    <div class="col-sm-8">
				      <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row['nama']; ?>" readonly>
				    </div>
				</div>

				<div class="form-group row">
				    <label for="nama" class="col-sm-4 col-form-label">Jabatan</label>
				    <div class="col-sm-8">
				      <input type="text" name="nama" class="form-control" id="jabatan" value="<?php echo $row['jabatan']; ?>" readonly>
				    </div>
				</div>

				<div class="form-group row">
				    <label for="nama" class="col-sm-4 col-form-label">Uang yang diterima</label>
				    <div class="col-sm-8">
				      <input type="text" name="gaji" class="form-control" id="gaji" value="<?php echo $row['gaji']; ?>" >
				    </div>
				</div>

				<div class="text-center">	
					<button type="submit" class="btn btn-primary btn-sm text-center">Simpan</button>
					<button type="submit" class="btn btn-secondary btn-sm text-center">Batal</button>
				</div>
			</form>
		</div>
	 </div>
</div>

 <?php require '../footer.php'; ?>