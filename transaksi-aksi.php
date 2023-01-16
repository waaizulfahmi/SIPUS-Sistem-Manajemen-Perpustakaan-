<?php
include "db_connection.php";

// ambil/baca data dari form action
$mode 			= $_GET['mode'];

// ambil/baca data dari form
$kd_transaksi 	= @$_POST['kd_transaksi'];
$id_transaksi 	= @$_POST['id_transaksi'];
$id_anggota 	= @$_POST['id_anggota'];
$idbuku 		= @$_POST['idbuku'];


if($mode == 'pinjam'){
	$statusanggota = "Sedang Meminjam";
	$statusbuku = "Dipinjam";
	$tanggal_pinjam = date('Y-m-d');

	// query update status data anggota yang pinjam buku
	mysqli_query($conn, "UPDATE anggota SET statusanggota = '$statusanggota' WHERE id_anggota = '$id_anggota'");

	// query update status data buku yang dipinjam
	mysqli_query($conn, "UPDATE databuku SET statusbuku = '$statusbuku' WHERE idbuku = '$idbuku'");

	// query input data transaksi ke database
	$check = mysqli_query($conn, "INSERT INTO transaksi (id_transaksi, kd_transaksi, id_anggota, idbuku, tanggal_pinjam) VALUES ('$id_transaksi','$kd_transaksi', '$id_anggota', '$idbuku', '$tanggal_pinjam')");

}
else{
	$kd_transaksi = $_POST['kd_transaksi'];

	$statusanggota = "Tidak Meminjam";
	$statusbuku = "Tersedia";
	echo $tanggal_kembali = date('Y-m-d');

	// query update status data anggota yang pinjam buku
	mysqli_query($conn, "UPDATE anggota SET statusanggota = '$statusanggota' WHERE id_anggota = '$id_anggota'");

	// query update status data buku yang dipinjam
	mysqli_query($conn, "UPDATE databuku SET statusbuku = '$statusbuku' WHERE idbuku = '$idbuku'");

	// query update data transaksi pengembalian buku
	$check = mysqli_query($conn, "UPDATE transaksi SET tanggal_kembali = '$tanggal_kembali' WHERE kd_transaksi = '$kd_transaksi'");
}

if($check){
	// mengarahkan ke halaman list anggota
	header("location: index.php?page=transaksi-list");
}
else{
	echo "Pesan error: ". mysqli_error($conn);
}
?>