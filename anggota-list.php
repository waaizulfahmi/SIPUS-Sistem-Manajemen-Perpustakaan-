<div class="p-3">
	<h2 class="mb-3">Data Anggota</h2>

	<form method="POST">
		<div class="input-group">			
			<input type="text" name="pencarian" checked="form-control">
			<div class="input-group-append">
				<button type="submit" name="submit" class="btn btn-dark"><i class="fa fa-search"></i></button>	
			</div>
		</div>
	</form>

	<div class="float-right mb-3">
		<div class="btn-group" role="group" aria-label="Basic example">
			<a href="index.php?page=anggota-form&mode=add" class="btn btn-light"><i class="fa fa-plus"></i> Anggota</a>
			<a href="anggota-lap.php" class="btn btn-light" target="_blank"><i class="fa fa-print"></i> Anggota</a>
		</div>
	</div>

	<table class="table table-hover">
		<tr class="table-active">
			<th>No.</th>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>Foto</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>Status</th>
			<th>Opsi</th>
		</tr>

		<?php
		$batas = 5;

		extract($_GET);
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
			$nomor = 1;
		}
		else{
			$posisi = ($hal - 1) * $batas;
			$nomor = $posisi + 1;
		}
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$pencarian = trim(mysqli_real_escape_string($conn, $_POST['pencarian']));
			if($pencarian != ''){
				$query = mysqli_query($conn, "SELECT * FROM anggota WHERE
					id_anggota LIKE '%$pencarian%'
					OR nama LIKE '%$pencarian%'
					OR jenis_kelamin LIKE '%$pencarian%'
					OR alamat LIKE '%$pencarian%'
					");

				$query_jml = $query;
			}
			else{
				$query = mysqli_query($conn, "SELECT * FROM anggota lIMIT $posisi, $batas");
				$query_jml = mysqli_query($conn, "SELECT * FROM anggota");
				$no = $posisi + 1;
				}
		}
		else{
			$query = mysqli_query($conn, "SELECT * FROM anggota LIMIT $posisi, $batas");
			$query_jml = mysqli_query($conn, "SELECT * FROM anggota");
			$no = $posisi + 1;
		}

		foreach($query as $ky => $val){
			$no = $ky + 1;
			$foto = (!@$val['foto']) ? 'default.png' : $val['foto'];
			$nama_kode = $val['nama'].' ['.$val['kd_anggota'].']';
			?>
			<tr>
				<td><?=$no?>.</td>
				<td><?=$val['kd_anggota']?></td>
				<td><?=$val['nama']?></td>
				<td><img src="upload/<?=$foto?>" width="50"></td>
				<td><?=$val['jenis_kelamin']?></td>
				<td><?=$val['alamat']?></td>
				<td><?=$val['statusanggota']?></td>
				<td class="text-right">
					<div class="btn-group" role="group" aria-label="Basic example">
						<a href="anggota-print.php?id=<?=$val['id_anggota']?>" class="btn btn-sm btn-primary" target="_blank">
							<i class="fa fa-address-card"></i> Cetak Kartu
						</a>
						<a href="index.php?page=anggota-form&mode=edit&id=<?=$val['id_anggota']?>" class="btn btn-sm btn-success">
							<i class="fa fa-edit"></i> Edit
						</a>
						<a href="anggota-aksi.php?mode=delete&id=<?=$val['id_anggota']?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus <?=$nama_kode ?>')">
							<i class="fa fa-close"></i> Hapus
						</a>
					</div>
				</td>
			</tr>
			<?php
		}
		?>
	</table>

	<?php
	if(isset($_POST['pencarian'])){
		if($_POST['pencarian'] != ''){
			$jml_data = mysqli_num_rows($query_jml);
			?>
			<p>Data hasil pencarian: <b><?=$jml_data?></b>
			<?php
		}
	}
	else{
		$jml_data = mysqli_num_rows($query_jml);

		$jml_hal = ceil($jml_data / $batas);
		?>
		<p>Jumlah Data: <b><?=$jml_data?></b>
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				<?php
				for ($i=1; $i <= $jml_hal; $i++) { 
					// code...
					if($i != $hal){
						?>
						<li class="page-item">
							<a class="page-link" href="index.php?page=anggota-list&hal=<?=$i?>"><?=$i?></a>
						</li>
						<?php
					}
					else{
						?>
						<li class="page-item active">
							<a class="page-link"><?=$i?></a>
						</li>
						<?php
					}
				}
				?>				
			</ul>
		</nav>
		<?php
	}
	?>
</div>