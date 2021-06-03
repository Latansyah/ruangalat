<?php

session_start();
require_once '../../config/db.php';

// if(!isset($_SESSION['user'])) {
// 	header('Location: ../../index.php');
// }

$nama_alat = $_POST['nama_alat'];
$jenis = $_POST['jenis'];
$jumlah = $_POST['jumlah'];
$ruang = $_POST['ruang'];
$kondisi = $_POST['kondisi'];
$ket = $_POST['ket'];
$tgl_regis = date('Y-m-d');
$petugas = $_SESSION['id_user'];

if(!isset($nama_alat, $jenis, $jumlah, $ruang, $kondisi, $ket)) {
	header('Location: ../data-alat.php?p=tambah-alat');
}

$sql = "INSERT INTO alat VALUES ('', '$petugas', '$jenis', '$jumlah', '$ket', '$kondisi', '$nama_alat', '$tgl_regis', '$ruang')";
$query = $conn->query($sql);

if($query) {
	header('Location: ../data-alat.php');
} else {
	header('Location: ../data-alat.php?p=tambah-alat');
}