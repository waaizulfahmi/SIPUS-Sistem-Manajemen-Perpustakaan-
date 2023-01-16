<link rel="stylesheet" href="asset/css/bootstrap.min.css">
<title>Cetak Pengembalian</title>
<div class="p-3">
	<h2 class="mb-3">Laporan Transaksi Pengembalian Buku</h2>

	<table class="table table-bordered">
		<tr class="table-active">
			<th>No.</th>
			<th>ID Transaksi</th>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>ID Buku</th>
			<th>Judul Buku</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
		</tr>

		<?php
        include 'db_connection.php';
		$query = mysqli_query($conn, "
			SELECT * FROM transaksi 
			JOIN anggota ON anggota.id_anggota = transaksi.id_anggota
			JOIN databuku ON databuku.idbuku = transaksi.idbuku
			WHERE tanggal_kembali != '0000-00-00'
			");
        $no = 1 ;
            foreach($query as $val){
			?>
			<tr>
				<td><?=$no?>.</td>
				<td><?=$val['kd_transaksi']?></td>
				<td><?=$val['kd_anggota']?></td>
				<td><?=$val['nama']?></td>
				<td><?=$val['kdbuku']?></td>
				<td><?=$val['judul']?></td>
				<td><?=$val['tanggal_pinjam']?></td>
				<td><?=$val['tanggal_kembali']?></td>
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