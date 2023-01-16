<div class="p-3">
	<?php
	// baca mode form
	$mode = $_GET['mode'];

	if($mode == 'pinjam'){
		$judul = 'Tambah Data Transaksi';

		// baca record terakhir "transaksi", untuk melihat kd_transaksi terakhir
		$query = mysqli_query($conn, "SELECT kd_transaksi FROM transaksi ORDER BY kd_transaksi DESC");
		$anggota = mysqli_fetch_array($query);

		if(@$anggota['kd_transaksi']){
			// substr(TR202222, 2) -> 202222 di ambil data ke 2[array] / urutan ke 3;
			$kd_transaksi = "TS".(substr($anggota['kd_transaksi'], 2) + 1);
		}
		else{
			$kd_transaksi = "TS".date("m")."0001";		
		}

		$statusanggota = 'Tidak Meminjam';
		$statusbuku = 'Tersedia';
	}
	else{
		$judul = 'Pengembalian Buku';

		$id = $_GET['id'];

		// baca data transaksi berdasarkan $_GET['id'] / id_transaksi
		$query = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = '".$id."'");
		$transaksi = mysqli_fetch_array($query);

		$kd_transaksi = $transaksi['kd_transaksi'];

		$statusanggota = 'Sedang Meminjam';
		$statusbuku = 'Dipinjam';

	}

	// panggil data anggota untuk di pilih di transaksi
	$anggota = mysqli_query($conn, "SELECT * FROM anggota WHERE statusanggota = '$statusanggota'");

	// panggil data buku untuk di pilih di transaksi
	$buku = mysqli_query($conn, "SELECT * FROM databuku WHERE statusbuku ='$statusbuku'");
	?>
	<h2 class="mb-3"><?=$judul?></h2>

			<form action="transaksi-aksi.php?mode=<?=$mode?>" method="POST">
				<div class="form-group row">
					<label for="kd_transaksi" class="col-lg-2 col-form-label">KD Transaksi</label>
					<div class="col-lg-3">
						<input type="text" name="kd_transaksi" value="<?=$kd_transaksi?>" class="form-control" id="kd_transaksi" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label">Nama Anggota</label>
					<div class="col-lg-6">
						<select name="id_anggota" class="form-control">
							<?php
							foreach ($anggota as $key => $value) {
								// code...
								?>
								<option value="<?=$value['id_anggota']?>"><?=$value['nama']?></option>
								<?php
							}
							?>							
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label">Judul Buku</label>
					<div class="col-lg-6">
						<select name="idbuku" class="form-control">
							<?php
							foreach ($buku as $key => $value) {
								// code...
								?>
								<option value="<?=$value['idbuku']?>"><?=$value['judul']?></option>
								<?php
							}
							?>							
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label"><a href="index.php?page=transaksi-list"><i class="fa fa-arrow-left"></i> kembali</a></label>
					<div class="col-lg-6">
						<input type="hidden" name="id_transaksi" value="<?=@$transaksi['id_transaksi']?>">
						<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-save"></i> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>