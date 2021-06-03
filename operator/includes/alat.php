<div class="container mt-5">
	
	<h2>Data alat</h2>
	<hr>

	<a href="index.php" class="btn btn-primary btn-sm float-left">&larr; Kembali</a>
	
	<div class="clearfix"></div>

	<table class="table table-sm mt-3">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama alat</th>
				<th>Kondisi</th>
				<th>Jumlah</th>
				<th>Jenis</th>
				<th>Tgl. Regis</th>
				<th>Ruang</th>
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
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</div>