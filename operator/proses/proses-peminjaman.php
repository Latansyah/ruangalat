<?php

$dt_pinjam = NULL;

if(isset($_POST['submit']) && isset($_SESSION['list_peminjaman'])) {
	foreach ($_SESSION['list_peminjaman'] as $list) {
		$explode = explode("-", $list['nama_alat']);
		$nama_alat = trim($explode[0]);
		$jenis = trim($explode[1]);

		$alat = $conn->query("SELECT * FROM alat WHERE nama_alat='$nama_alat' AND jenis = '$jenis'");
		$dt_alat = $alat->fetch_assoc();


		$sisa = ($dt_alat ['jumlah'] - $list['jumlah_pinjam']);

		$update_dt_brg = $conn->query("UPDATE alat SET jumlah = '$sisa' WHERE id_alat = '$dt_alat[id_alat]'");

		$tgl_peminjaman = date('Y-m-d');
		$tgl_pengembalian = $_POST['tgl-pengembalian'];
		$peminjam = $_POST['peminjam'];
		$id_user = $_POST['id_user'];

		$peminjaman = $conn->query("INSERT INTO peminjaman VALUES ('', '$id_user', '$tgl_peminjaman', '$tgl_pengembalian')");

		$detail_pinjam = $conn->query("INSERT INTO detail_pinjam VALUES ('', '$list[id_alat]', '$list[jumlah_pinjam]', '$peminjam', (SELECT id_peminjaman FROM peminjaman ORDER BY id_peminjaman DESC LIMIT 1))");

		$update_dt_brg = $conn->query("UPDATE alat SET jumlah = '$sisa' WHERE id_alat = '$dt_alat[id_alat]'");
	}	
	unset($_SESSION['list_peminjaman']);
}