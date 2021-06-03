<div class="container mt-5">
	
	<h2>Tambah Data Alat</h2>
	<hr>

	<a href="data-alat.php" class="btn btn-primary btn-sm float-left">&larr; kembali</a>
	<div class="clearfix"></div>

	<form action="proses/proses-tambah-alat.php" method="POST" class="mt-3" autocomplete="off">
		<div class="form-group">
			<label for="nama_alat">Nama Alat</label>
			<input type="text" name="nama_alat" placeholder="Contoh: Resistor" class="form-control" autofocus required>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="jenis">Jenis Alat</label>
					<input type="text" name="jenis" class="form-control" required placeholder="Contoh: Resistor">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="jumlah">Jumlah</label>
					<input type="number" name="jumlah" min="1" placeholder="Minimal 1" class="form-control" required>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="ruang">Ruang</label>
					<input type="text" name="ruang" class="form-control" required placeholder="Contoh: Gudang">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="jenis">Kondisi Alat</label>
					<input type="text" name="kondisi" class="form-control" required placeholder="Contoh: Baik">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="ket">Keterangan</label>
					<textarea class="form-control" name="ket" placeholder="(Opsional)"></textarea>
				</div>
			</div>
			<div class="col-md-4">
				<button type="submit" name="simpan" class="btn btn-success btn-sm" style="margin-top:32px; width:100%;"><b>Simpan</b></button>
			</div>
		</div>
	</form>
</div>