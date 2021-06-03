<div class="container mt-5">
	
	<h2>Ubah Data alat</h2>
	<hr>

	<a href="data-alat.php" class="btn btn-primary btn-sm float-left">&larr; kembali</a>
	<div class="clearfix"></div>

	<?php
	$alat = $conn->query("SELECT * FROM alat WHERE id_alat = '" .$_GET['id']. "'");
	$data = $alat->fetch_assoc();
	?>

	<form action="proses/proses-ubah-alat.php" method="POST" class="mt-3" autocomplete="off">
		<input type="hidden" name="id" value="<?= $data['id_alat'] ?>">
		<div class="form-group">
			<label for="nama_alat">Nama Alat</label>
			<input type="text" name="nama_alat" placeholder="Contoh: Resistor" class="form-control" autofocus required value="<?= $data['nama_alat'] ?>">
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="jenis">Jenis alat</label>
					<input type="text" name="jenis" class="form-control" required placeholder="Contoh: Resistor" value="<?= $data['jenis'] ?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="jumlah">Jumlah</label>
					<input type="number" name="jumlah" min="1" placeholder="Minimal 1" class="form-control" required value="<?= $data['jumlah'] ?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="ruang">Ruang</label>
					<input type="text" name="ruang" class="form-control" required placeholder="Contoh: Gudang" value="<?= $data['ruang'] ?>">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="jenis">Kondisi Alat</label>
					<input type="text" name="kondisi" class="form-control" required placeholder="Contoh: Baik" value="<?= $data['kondisi'] ?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="ket">Keterangan</label>
					<textarea class="form-control" name="ket" placeholder="(Opsional)"><?= $data['keterangan'] ?></textarea>
				</div>
			</div>
			<div class="col-md-4">
				<button type="submit" name="simpan" class="btn btn-success btn-sm" style="margin-top:32px; width:100%;"><b>Ubah</b></button>
			</div>
		</div>
	</form>
</div>