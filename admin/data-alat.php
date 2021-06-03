<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['id_user'])) {
	header('Location: ../index.php');
}

// Mengelurkan seluruh data alat yang ada di Database
$sql = "SELECT * FROM alat LEFT JOIN users ON alat.id_user = users.id_user";
$query = $conn->query($sql);
$data_alat = $query->fetch_all(MYSQLI_ASSOC);

// Nomor untuk increment baris tabel
$no = 1;

require_once 'includes/header.php';
if (!isset($_GET['p'])) {
	require_once 'includes/alat.php';	
} else if ($_GET['p'] == 'tambah-alat') {
	require_once 'includes/'.$_GET['p'].'.php';	
} else if ($_GET['p'] == 'detail-alat') {
	require_once 'includes/'.$_GET['p'].'.php';	
} else if ($_GET['p'] == 'edit-alat') {
	require_once 'includes/'.$_GET['p'].'.php';	
} else if ($_GET['p'] == 'hapus-alat') {
	
	$hapus = $conn->query("DELETE FROM alat WHERE id_alat='".$_GET['id']."'");
	if ($hapus) {
		header('Location: data-alat.php');
	} else {
		header('Location: data-alat.php');
	}

}
require_once 'includes/footer.php';