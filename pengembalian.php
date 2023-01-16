<div class="p-3">
	<h2 class="mb-3">Laporan Transaksi Pengembalian Buku</h2>
	<div class="float-right mb-3">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="pengembalian-print.php" class="btn btn-sm btn-primary" target="_blank">
                <i class="fa fa-print"></i> Cetak Transaksi
            </a>
        </div>
    </div>
	<table class="table table-hover">
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
	</table>
</div>