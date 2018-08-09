<?php  
	
	session_start();

	include '../../function.php';

	if ($_POST['nama'] == NULL) {
		$_SESSION['gagal'] = 'Kolom Nama RW tidak boleh kosong.';
		header('Location:../../../dashboard.php?page=tambah-rw'); 
		die();
	} elseif ($_POST['ketua'] == NULL) {
		$_SESSION['gagal'] = 'Kolom Nama Ketua RW tidak boleh kosong.';
		header('Location:../../../dashboard.php?page=tambah-rw'); 
		die();
	}

	$conn = koneksi();
	$nama = sanitizeThis($_POST['nama']);
	$ketua = sanitizeThis($_POST['ketua']);

	$query = "INSERT INTO rw (nama_rw, ketua_rw) VALUES ('$nama', '$ketua')";
	$procs = mysqli_query($conn, $query);

	if ($procs) {
		$_SESSION['sukses'] = 'Data RW berhasil ditambahkan.';
		header('Location:../../../dashboard.php?page=kelola-rw'); 
		die();
	} else {
		$_SESSION['gagal'] = 'Telah terjadi sebuah kesalahan.';
		header('Location:../../../dashboard.php?page=kelola-rw'); 
		die();
	}

?>