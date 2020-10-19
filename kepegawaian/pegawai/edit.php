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
			<h4 class="mb-5">Edit Pegawai</h4>
			<form action="proses_edit.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<div class="form-group row">
				    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
				    <div class="col-sm-8">
				      <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row['nama']; ?>">
				    </div>
				</div>

				<div class="form-group row">
				    <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
				    <div class="col-sm-8">
				      <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>">
				    </div>
				</div>

				<div class="form-group row">
				    <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
				    <div class="col-sm-8">
				      <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>">
				    </div>
				</div>

				<div class="form-group row">
				    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
				    <div class="col-sm-8">
				      <textarea class="form-control" name="alamat" id="alamat"><?php echo $row['alamat']; ?></textarea>
				    </div>
				</div>

				<div class="form-group row">
				    <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
				    <div class="col-sm-8">
				      <select name="jenis_kelamin" class="form-control">
				      	<option disabled="">Pilih Jenis Kelamin</option>
				      	<?php if($row['jenis_kelamin'] == 'L') : ?>
				      		<option value="L" selected>Laki-laki</option>
				      		<option value="P">Perempuan</option>
				      	<?php else : ?>
				      		<option value="L">Laki-laki</option>
				      		<option value="P" selected>Perempuan</option>
				      	<?php endif; ?>
				      </select>
				    </div>
				</div>

				<div class="form-group row">
				    <label for="tanggal_masuk" class="col-sm-4 col-form-label">Tanggal Masuk</label>
				    <div class="col-sm-8">
				      <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="<?php echo $row['tanggal_masuk']; ?>">
				    </div>
				</div>

				<div class="form-group row">
				    <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
				    <div class="col-sm-8">
				      <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?php echo $row['jabatan']; ?>">
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