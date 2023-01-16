<!DOCTYPE html>
<html>
<headd>
	<meta charset="utf-8">
	<title>Print Anggota</title>
	<style type="text/css">
		.text-center {
			text-align: center;
		}
	</style>
</headd>

<body>
	<?php
	include 'db_connection.php';

	$id = $_GET['id'];

	$query = mysqli_query($conn, "
		SELECT * FROM transaksi 
		JOIN anggota ON anggota.id_anggota = transaksi.id_anggota
		JOIN databuku ON databuku.idbuku = transaksi.idbuku
		WHERE id_transaksi = '".$id."'
		");
	$transaksi = mysqli_fetch_array($query);
	?>
	<div class="kartu">
		<h2 class="text-center">Nota Pinjam Buku</h2>
		<p>Tanggal Pinjam : <?=date('d F Y', strtotime($transaksi['tanggal_pinjam']))?></p>
		<br/>
		<table>
			<tr>
				<td>ID Anggota</td>
				<td>: <?=$transaksi['kd_anggota']?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>: <?=$transaksi['nama']?></td>
			</tr>
			<tr>
				<td>Kode Buku</td>
				<td>: <?=$transaksi['kdbuku']?></td>
			</tr>
			<tr>
				<td>Judul Buku</td>
				<td>: <?=$transaksi['judul']?></td>
			</tr>
		</table>
		<br/>
		<p class="text-center">------</p>
		<p class="text-center">Terima Kasih Telah Menggunakan Jasa Kami</p>
	</div>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>