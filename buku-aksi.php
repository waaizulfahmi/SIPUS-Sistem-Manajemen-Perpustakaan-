<?php
include 'db_connection.php';

// ambil/baca data dari form action
$mode 			= $_GET['mode'];

// ambil/baca data dari form
$idbuku 		= @$_POST['idbuku'];
$kdbuku         = @$_POST['kdbuku'];
$judul 		    = @$_POST['judul'];
$kategori 		= @$_POST['kategori'];
$pengarang      = @$_POST['pengarang'];
$penerbit 		= @$_POST['penerbit'];
$statusbuku 	= @$_POST['statusbuku'];



if ($mode == 'add') {
    $query = "INSERT INTO databuku (idbuku, kdbuku, judul, kategori, pengarang, penerbit, statusbuku) VALUES  ('$idbuku','$kdbuku', '$judul', '$kategori', '$pengarang','$penerbit','$statusbuku')";
    $hasil = mysqli_query($conn, $query);
}
 else if($mode == 'edit') {
    $query = "UPDATE databuku SET 
            kdbuku = '$kdbuku', 
            judul = '$judul', 
            kategori = '$kategori', 
            pengarang = '$pengarang', 
            penerbit = '$penerbit', 
            statusbuku = '$statusbuku' 
            WHERE idbuku = '$idbuku'";
    $hasil = mysqli_query($conn, $query);

} else {
    $idbuku = $_GET['id'];
    $query= "DELETE FROM databuku WHERE idbuku ='".$idbuku."'";
    $hasil= mysqli_query($conn, $query);
}

if ($hasil) {
    header("location: index.php?page=buku-list");
} else {
    echo "Pesan error: ". mysqli_error($conn);
}
?>


