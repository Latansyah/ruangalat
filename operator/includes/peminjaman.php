<div class="container mt-5">
	<div class="card">
		<div class="card-header">
			Nama Mahasiswa : <?= $_SESSION['nama'] ?>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<form action="" method="POST" class="mt-3" autocomplete="off">
						<div class="form-group">
							<label for="id_alat">Nama alat</label>
							<input list="alat" name="nama_alat" placeholder="Pilih alat" class="form-control" required>
							<datalist id="alat">
								
								<?php 
								foreach ($data_alat as $alat): 
									$daftar = $alat['nama_alat'].' - '.$alat['jenis'];
									?>
									
									<option value="<?= $daftar ?>">
										
									<?php endforeach ?>
									
								</select>
							</div>
							<div class="form-group">
								<label for="jumlah_alat">Jumlah Pinjam</label>
								<input type="number" name="jumlah_pinjam" placeholder="Jumlah alat" min="1" max="1000" class="form-control" required>
							</div>
							<button type="submit" class="btn btn-primary float-right">Tambah Alat</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<div class="col-md-6">
						<h3>Data Peminjaman</h3>

						<?php 
						if (isset($_POST['nama_alat'], $_POST['jumlah_pinjam'])) {
							
							$nama_alat = trim($_POST['nama_alat']);
							$explode_nama_alat = explode("-", $nama_alat);
							$nama_alat_exploded = $explode_nama_alat[0];
							$jumlah_pinjam 	= $_POST['jumlah_pinjam'];
							$id_user 		= $_SESSION['id_user'];

							$alat = $conn->query("SELECT * FROM alat WHERE nama_alat='".$nama_alat_exploded."'");
							$data_alat 	= $alat->fetch_array();

							if(!isset($_SESSION['list_peminjaman'])) {
								$_SESSION['list_peminjaman'] = [];
							}

							$pinjam = 1;
							$index = -1;
							$ls_pmj = unserialize(serialize($_SESSION['list_peminjaman']));

						// jika alat sudah ada di daftar list maka akan diupdate
							for ($i=0; $i<count($ls_pmj); $i++) {
								if($ls_pmj[$i]['nama_alat'] == $nama_alat) {
									$index = $i;
									if($jumlah_pinjam <= $data_alat['jumlah']) {
										$_SESSION['list_peminjaman'][$i]['jumlah_pinjam'] = $jumlah_pinjam;
									} else {
										echo '<div class="alert alert-danger" role="alert"><b>'.$nama_alat.'</b> hanya tersedia <b>'.$data_alat['jumlah'].'</b></div>';
									}
									break;
								}
							}

						// jika list peminjaman kosong
							if($index == -1) {
								if($data_alat['jumlah'] < $jumlah_pinjam) {
									echo '<div class="alert alert-danger" role="alert"><b>'.$nama_alat.'</b> hanya tersedia <b>'.$data_alat['jumlah'].'</b></div>';
								} else {
									$_SESSION['list_peminjaman'][] = [
										'id_alat' => $data_alat['id_alat'], 
										'nama_alat' => $nama_alat, 
										'jumlah_pinjam' => $jumlah_pinjam
									];
								}
							}
						}

						?>

						<table class="table table-bordered">
							<tr align="center">
								<th>Nama alat</th>
								<th>Jumlah pinjam</th>
								<th>Aksi</th>
							</tr>
							
							<?php 
							if(isset($_SESSION['list_peminjaman'])) {
								$list = unserialize(serialize($_SESSION['list_peminjaman']));
								$index = 0;
								for($i=0; $i<count($list); $i++) {
									?>

									<tr>
										<td><?php echo $list[$i]['nama_alat']; ?></td>
										<td align="center"><?php echo $list[$i]['jumlah_pinjam']; ?></td>
										<td align="center">
											<a href="?index=<?php echo $index; ?>" onclick="return confirm('Anda yakin?')">Hapus</a>
										</td>
									</tr>

									<?php 
									$index++;
								} 

							 	// hapus alat pada cart
								if(isset($_GET['index'])) {
									$list = unserialize(serialize($_SESSION['list_peminjaman']));
									unset($list[$_GET['index']]);
									$list = array_values($list);
									$_SESSION['list_peminjaman'] = $list;
								}
							}
							?>

						</table>
						
						<hr>

						<form method="POST" action="">
							<input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="tgl-pengembalian">Tgl. Pengembalian</label>
										<input class="form-control" type="date" name="tgl-pengembalian" id="tgl-pengembalian" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="peminjam">Peminjam</label>
										<input class="form-control" type="text" name="peminjam" id="peminjam" placeholder="Masukan Nama" required>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
	if(isset($_GET["index"])){
		header('Location: index.php');
	} 