<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['id_user'])) {
	header('Location: ../../index.php');
}

$id = $_POST['id'];
$nama_alat = $_POST['nama_alat'];
$jenis = $_POST['jenis'];
$jumlah = $_POST['jumlah'];
$ruang = $_POST['ruang'];
$kondisi = $_POST['kondisi'];
$ket = $_POST['ket'];
$tgl_regis = date('Y-m-d');
$petugas = $_SESSION['id_user'];

$update = $conn->query("UPDATE alat SET nama_alat = '$nama_alat',
							jenis = '$jenis',
							jumlah = '$jumlah',
							ruang = '$ruang',
							kondisi = '$kondisi',
							keterangan = '$ket'
					WHERE id_alat = '$id'");

if ($update) {
	header('Location: ../data-alat.php');
} else {
	header('Location: ../data-alat.php?h=edit-alat');
}