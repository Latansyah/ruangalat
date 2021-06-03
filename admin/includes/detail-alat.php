<div class="container mt-5">
	
	<h2>Detail Data Alat</h2>
	<hr>
	
	<a href="data-alat.php" class="btn btn-primary btn-sm float-left">&larr; Kembali</a>
	<div class="clearfix"></div>
	
	<?php 
		$sql = $conn->query("SELECT * FROM alat INNER JOIN users WHERE id_alat = '".$_GET['id']."'");
		$data = $sql->fetch_assoc();
	?>

	<div class="card mt-3">
		<div class="card-header">
			<?= $data['nama_alat'] ?>
		</div>
		<div class="card-body">
			<p>Jenis alat : <?= $data['jenis'] ?></p>
			<p>Jumlah : <?= $data['jumlah'] ?></p>
			<p>Kondisi : <?= $data['kondisi'] ?></p>
			<p>Tgl. Registrasi : <?= $data['tgl_regis'] ?></p>
			<p>Ruang : <?= $data['ruang'] ?></p>
			<p>Mahasiswa : <?= $data['nama'] ?></p>
		</div>
	</div>

</div>