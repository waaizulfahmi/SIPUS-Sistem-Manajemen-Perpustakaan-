<link rel="stylesheet" href="asset/css/bootstrap.min.css">
<title>Cetak Pinjaman</title>
<div class="p-3">
	<h2 class="mb-3">Laporan Transaksi Peminjaman Buku</h2>
	<table class="table table-hover" >
		<tr class="table-active">
			<th>No.</th>
			<th>ID Transaksi</th>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>ID Buku</th>
			<th>Judul Buku</th>
			<th>Tanggal Pinjam</th>
		</tr>

		<?php
        include 'db_connection.php';
		$query = mysqli_query($conn, "
			SELECT * FROM transaksi
			JOIN anggota ON anggota.id_anggota = transaksi.id_anggota
			JOIN databuku ON databuku.idbuku = transaksi.idbuku
			WHERE tanggal_kembali = '0000-00-00'
			");

        	$no = 1;
            foreach($query as $value) {
      		
			?>
			<tr>
				<td><?=$no?>.</td>
				<td><?=$value['kd_transaksi']?></td>
				<td><?=$value['kd_anggota']?></td>
				<td><?=$value['nama']?></td>
				<td><?=$value['kdbuku']?></td>
				<td><?=$value['judul']?></td>
				<td><?=$value['tanggal_pinjam']?></td>
			</tr>
			<?php
        $no ++;
		  }
		?>
        <script type="text/javascript">
          window.print();
        </script>
	</table>
</div>