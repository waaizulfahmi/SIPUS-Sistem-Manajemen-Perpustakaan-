<?php
include "db_connection.php";

// ambil/baca data dari form action
$mode 			= $_GET['mode'];

// ambil/baca data dari form
$id_anggota 	= @$_POST['id_anggota'];
$kd_anggota 	= @$_POST['kd_anggota'];
$nama 			= @$_POST['nama'];
$jenis_kelamin 	= @$_POST['jenis_kelamin'];
$alamat 		= @$_POST['alamat'];
$foto_lama 		= @$_POST['foto_lama'];


if($mode == 'add'){
	$foto = $_FILES['foto']['name'];
	if(@$foto){
		$lokasi_foto = $_FILES['foto']['tmp_name'];
		$ext_file = end(explode('.', $foto));
		$file_foto = $kd_anggota.".".$ext_file;

		move_uploaded_file($lokasi_foto, "./upload/".$file_foto);
	}
	else{
		$file_foto = '';
	}
	$statusanggota = "Tidak Meminjam";

	$query = "
		INSERT INTO anggota (kd_anggota, nama, jenis_kelamin, alamat, statusanggota, foto) 
		VALUES ('$kd_anggota', '$nama', '$jenis_kelamin', '$alamat', '$statusanggota', '$file_foto')";
	$check = mysqli_query($conn, $query);
}
else if($mode == 'edit'){
	$foto = $_FILES['foto']['name'];
	if(@$foto){
		$lokasi_foto = $_FILES['foto']['tmp_name'];
		$ext_file = end(explode('.', $foto));
		$file_foto = $kd_anggota.".".$ext_file;

		$_foto_lama = "./upload/".$foto_lama;
		if(file_exists($_foto_lama)){
			unlink($_foto_lama);
		}
		move_uploaded_file($lokasi_foto, "./upload/".$file_foto);
	}
	else{
		$file_foto = '';
	}

	$query = "UPDATE anggota SET
		kd_anggota = '$kd_anggota',
		nama = '$nama',
		jenis_kelamin = '$jenis_kelamin',
		alamat = '$alamat',
		statusanggota = '$statusanggota',
		foto = '$file_foto'
		WHERE id_anggota = '$id_anggota'";
	$check = mysqli_query($conn, $query);
}
else{
	$id_anggota = $_GET['id'];

	$query = mysqli_query($conn, "SELECT foto FROM anggota WHERE id_anggota = '".$id_anggota."'");
	$anggota = mysqli_fetch_array($query);

	$foto = "./upload/".$anggota['foto'];
	if(file_exists($foto)){
		unlink($foto);
	}

	$query = "DELETE FROM anggota WHERE id_anggota = '".$id_anggota."'";
	$check = mysqli_query($conn, $query);
}

if($check){
	// mengarahkan ke halaman list anggota
	header("location: index.php?page=anggota-list");
}
else{
	echo "Pesan error: ". mysqli_error($conn);
}
?>