<?php 

  require '../header.php';

 ?>
<div class="container-fluid mt-3 mb-5">
	<div class="row">	
		<div class="col-md-8">	
			<h4 class="mb-5">Registrasi Pegawai</h4>
			<form action="proses_registrasi.php" method="post">

				<div class="form-group row">
				    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
				    <div class="col-sm-8">
				      <input type="text" name="nama" class="form-control" id="nama">
				    </div>
				</div>

				<div class="form-group row">
				    <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
				    <div class="col-sm-8">
				      <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
				    </div>
				</div>

				<div class="form-group row">
				    <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
				    <div class="col-sm-8">
				      <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
				    </div>
				</div>

				<div class="form-group row">
				    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
				    <div class="col-sm-8">
				      <textarea class="form-control" name="alamat" id="alamat"></textarea>
				    </div>
				</div>

				<div class="form-group row">
				    <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
				    <div class="col-sm-8">
				      <select name="jenis_kelamin" class="form-control">
				      	<option selected disabled="">Pilih Jenis Kelamin</option>
				      	<option value="L">Laki-laki</option>
				      	<option value="P">Perempuan</option>
				      </select>
				    </div>
				</div>

				<div class="form-group row">
				    <label for="tanggal_masuk" class="col-sm-4 col-form-label">Tanggal Masuk</label>
				    <div class="col-sm-8">
				      <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk">
				    </div>
				</div>

				<div class="form-group row">
				    <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
				    <div class="col-sm-8">
				      <input type="text" name="jabatan" class="form-control" id="jabatan">
				    </div>
				</div>

				
				<div class="form-group row">
				    <label for="gaji" class="col-sm-4 col-form-label">Gaji</label>
				    <div class="col-sm-8">
				      <input type="number" name="gaji" class="form-control" id="gaji">
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