<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['id_user'])) {
	header('Location: ../index.php');
}

// Mengelurkan seluruh data alat yang ada di Database
$sql 			= "SELECT * FROM alat";
$query 			= $conn->query($sql);
$data_alat 	= $query->fetch_all(MYSQLI_ASSOC);

// Nomor untuk increment baris tabel
$no = 1;

require_once 'includes/header.php';
require_once 'includes/alat.php';
require_once 'includes/footer.php';