<div class="container mt-5">

	<div class="row text-center">
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<?php 
					$sql = $conn->query("SELECT COUNT(*) AS jmlPinjam FROM detail_pinjam");
					$pinjam = $sql->fetch_assoc();
					?>
					<h5 class="card-title">Data Peminjaman</h5>
					<p class="card-text">Data Alat yang dipinjam</p>
					<h4><?= $pinjam['jmlPinjam']; ?></h4>
					<a href="data-peminjaman.php" class="card-link">Lihat Data Peminjaman</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<?php 
					$sql = $conn->query("SELECT COUNT(*) AS jmlalat FROM alat");
					$alat = $sql->fetch_assoc();
					?>
					<h5 class="card-title">Data Alat</h5>
					<p class="card-text">Jumlah Alat saat ini</p>
					<h3><?= $alat['jmlalat'] ?></h3>
					<a href="data-alat.php" class="card-link">Lihat Data Alat</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<?php 
					$sql = $conn->query("SELECT COUNT(*) AS jmlOpt FROM users WHERE id_level = 2");
					$opt = $sql->fetch_assoc();
					?>
					<h5 class="card-title">Data Mahasiswa</h5>
					<p class="card-text">Jumlah Mahasiwa saat ini</p>
					<h3><?= $opt['jmlOpt'] ?></h3>
					<a href="#" class="card-link">Lihat Data Mahasiswa</a>
				</div>
			</div>
		</div>
	</div>

</div>