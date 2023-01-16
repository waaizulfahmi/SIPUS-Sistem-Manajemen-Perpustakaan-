<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Print Anggota</title>
	</head>

	<body>
		<div class="">
			<h2 class="">Data Anggota</h2>

			<table class="">
				<tr>
					<th>No.</th>
					<th>ID Anggota</th>
					<th>Nama</th>
					<th>Foto</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Status</th>
				</tr>

				<?php
				include 'db_connection.php';
				
				$query = mysqli_query($conn, "SELECT * FROM anggota");

				foreach($query as $ky => $val){
					$no = $ky + 1;
					$foto = (!@$val['foto']) ? 'default.png' : $val['foto'];
					$nama_kode = $val['nama'].' ['.$val['kd_anggota'].']';
					?>
					<tr>
						<td><?=$no?>.</td>
						<td><?=$val['kd_anggota']?></td>
						<td><?=$val['nama']?></td>
						<td><img src="upload/<?=$foto?>" width="70"></td>
						<td><?=$val['jenis_kelamin']?></td>
						<td><?=$val['alamat']?></td>
						<td><?=$val['statusanggota']?></td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>

		<script type="text/javascript">
			window.print();
		</script>
	</body>
</html>