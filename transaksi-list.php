<div class="p-3">
	<h2 class="mb-3">Data Transaksi</h2>

	<div class="float-right mb-3">
		<div class="btn-group" role="group" aria-label="Basic example">
			<a href="index.php?page=transaksi-form&mode=pinjam" class="btn btn-light"><i class="fa fa-plus"></i> Transaksi</a>
		</div>
	</div>

	<table class="table table-hover">
		<tr class="table-active">
			<th>No.</th>
			<th>KD Transaksi</th>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>ID Buku</th>
			<th>Judul Buku</th>
			<th>Tanggal Pinjam</th>
			<th>Opsi</th>
		</tr>

		<?php
		include 'db_connection.php';
		$query = mysqli_query($conn, "SELECT * FROM transaksi 
			JOIN anggota ON anggota.id_anggota = transaksi.id_anggota
			JOIN databuku ON databuku.idbuku = transaksi.idbuku
			WHERE tanggal_kembali = '0000-00-00'
			");

			$no = 1 ;
            foreach ($query as  $val) {
                ?>
			<tr>
				<td><?=$no?>.</td>
				<td><?=$val['kd_transaksi']?></td>
				<td><?=$val['kd_anggota']?></td>
				<td><?=$val['nama']?></td>
				<td><?=$val['kdbuku']?></td>
				<td><?=$val['judul']?></td>
				<td><?=$val['tanggal_pinjam']?></td>
				<td class="text-right">
					<div class="btn-group" role="group" aria-label="Basic example">
						<a href="transaksi-print.php?id=<?=$val['id_transaksi']?>" class="btn btn-sm btn-primary" target="_blank">
							<i class="fa fa-address-card"></i> Cetak Nota
						</a>
						<a href="index.php?page=transaksi-form&mode=kembali&id=<?=$val['id_transaksi']?>" class="btn btn-sm btn-success">
							<i class="fa fa-edit"></i> Pengembalian
						</a>
					</div>
				</td>
			</tr>
			<?php
			$no ++;
            }
			
    		?>
	</table>
</div>