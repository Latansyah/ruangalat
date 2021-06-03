<div class="container mt-5">
	
	<h2>Data Alat</h2>
	<hr>

	<a href="index.php" class="btn btn-primary btn-sm float-left">&larr; Kembali</a>
	<a href="?p=tambah-alat" class="btn btn-primary btn-sm float-right">Tambah Data</a>

	<div class="clearfix"></div>

	<table class="table table-sm mt-3">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Alat</th>
				<th>Kondisi</th>
				<th>Jumlah</th>
				<th>Jenis</th>
				<th>Tgl. Regis</th>
				<th>Ruang</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($data_alat as $alat): ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $alat['nama_alat']; ?>
				<td><?= $alat['kondisi']; ?>
				<td><?= $alat['jumlah']; ?>
				<td><?= $alat['jenis']; ?>
				<td><?= $alat['tgl_regis']; ?>
				<td><?= $alat['ruang']; ?>
				<td><?= $alat['nama']; ?>
				<td>
					<div class="d-inline">
						<a href="?p=detail-alat&id=<?= $alat['id_alat']; ?>" class="btn btn-primary btn-sm">Detail</a>
						<a href="?p=edit-alat&id=<?= $alat['id_alat']; ?>" class="btn btn-success btn-sm">Edit</a>
						<a href="?p=hapus-alat&id=<?= $alat['id_alat']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
					</div>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</div>