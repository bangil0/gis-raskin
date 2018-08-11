<?php  
	
	session_start();

	include '../../function.php';

	if ($_POST['no_kk'] == NULL) {
		$_SESSION['gagal'] = 'Kolom Nomor Kartu Keluarga tidak boleh kosong.';
		header('Location:../../../dashboard.php?page=tambah-penerima'); 
		die();
	} elseif ($_POST['kepala_keluarga'] == NULL) {
		$_SESSION['gagal'] = 'Kolom Nama Kepala Keluarga tidak boleh kosong.';
		header('Location:../../../dashboard.php?page=tambah-penerima'); 
		die();
	} elseif ($_POST['alamat'] == NULL) {
		$_SESSION['gagal'] = 'Kolom Alamat tidak boleh kosong.';
		header('Location:../../../dashboard.php?page=tambah-penerima'); 
		die();
	} elseif ($_POST['rt_id'] == NULL) {
		$_SESSION['gagal'] = 'Kolom Nama RT tidak boleh kosong.';
		header('Location:../../../dashboard.php?page=tambah-penerima'); 
		die();
	} elseif ($_POST['telepon'] == NULL) {
		$_SESSION['gagal'] = 'Kolom Telepon tidak boleh kosong.';
		header('Location:../../../dashboard.php?page=tambah-penerima'); 
		die();
	} elseif ($_POST['latitude'] == NULL) {
		$_SESSION['gagal'] = 'Kolom Latitude tidak boleh kosong.';
		header('Location:../../../dashboard.php?page=tambah-penerima'); 
		die();
	} elseif ($_POST['longitude'] == NULL) {
		$_SESSION['gagal'] = 'Kolom Longitude tidak boleh kosong.';
		header('Location:../../../dashboard.php?page=tambah-penerima'); 
		die();
	} elseif ($_POST['bantuan_id'] == NULL) {
		$_SESSION['gagal'] = 'Kolom Jenis Bantuan tidak boleh kosong.';
		header('Location:../../../dashboard.php?page=tambah-penerima'); 
		die();
	}

	$conn = koneksi();
	$no_kk = sanitizeThis($_POST['no_kk']);
	$kepala_keluarga = sanitizeThis($_POST['kepala_keluarga']);
	$alamat = sanitizeThis($_POST['alamat']);
	$telepon = sanitizeThis($_POST['telepon']);
	$latitude = sanitizeThis($_POST['latitude']);
	$longitude = sanitizeThis($_POST['longitude']);
	$rt_id = sanitizeThis($_POST['rt_id']);
	$bantuan_id = sanitizeThis($_POST['bantuan_id']);

	$query = "INSERT INTO penerima (no_kk, kepala_keluarga, alamat, telepon, rt_id, bantuan_id, latitude, longitude) VALUES ('$no_kk', '$kepala_keluarga', '$alamat', '$telepon', '$rt_id', '$bantuan_id', '$latitude', '$longitude')";
	$procs = mysqli_query($conn, $query);

	if ($procs) {
		$_SESSION['sukses'] = 'Data Penerima berhasil ditambahkan.';
		header('Location:../../../dashboard.php?page=kelola-penerima'); 
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi sebuah kesalahan.';
		header('Location:../../../dashboard.php?page=kelola-penerima'); 
		die();
	}

?>