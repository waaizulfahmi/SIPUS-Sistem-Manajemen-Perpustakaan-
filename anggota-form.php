<div class="p-3">
	<?php
	// baca mode form
	$mode = $_GET['mode'];

	if($mode == 'add'){
		$judul = 'Tambah Data Anggota';

		// baca record terakhir "anggota", untuk melihat kd_anggota terakhir
		$query = mysqli_query($conn, "SELECT kd_anggota FROM anggota ORDER BY kd_anggota DESC");
		$anggota = mysqli_fetch_array($query);

		if(@$anggota['kd_anggota']){
			// substr(AG202222, 2) -> 202222 di ambil data ke 2[array] / urutan ke 3;
			$kd_anggota = "AP".(substr($anggota['kd_anggota'], 2) + 1);
		}
		else{
			$kd_anggota = "AP".date("y")."0001";		
		}
		$foto = 'default.png';
	}
	else{
		$judul = 'Ubah Data Anggota';

		$id = $_GET['id'];

		// baca data anggota berdasarkan $_GET['id'] / id_anggota
		$query = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota = '".$id."'");
		$anggota = mysqli_fetch_array($query);
        
		$foto = $anggota['foto'];
		$kd_anggota = $anggota['kd_anggota'];
	}
	?>
	<h2 class="mb-3"><?=$judul?></h2>
	
			<form action="anggota-aksi.php?mode=<?=$mode?>" method="POST" enctype="multipart/form-data">
				<div class="form-group row">
					<label for="foto" class="col-lg-2 col-form-label">Foto</label>
					<div class="col-lg-6">
						<img src="upload/<?=$foto?>" width="100"><br/>
						<input type="hidden" name="foto_lama" value="<?=$foto?>" id="foto">
						<input type="file" name="foto" value="" id="foto">
					</div>
				</div>

				<div class="form-group row">
					<label for="kd_anggota" class="col-lg-2 col-form-label">ID Anggota</label>
					<div class="col-lg-3">
						<input type="text" name="kd_anggota" value="<?=$kd_anggota?>" class="form-control" id="kd_anggota" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label">Nama</label>
					<div class="col-lg-6">
						<input type="text" name="nama" value="<?=@$anggota['nama']?>" class="form-control" id="nama" required>
					</div>
				</div>

				<div class="form-group row">
					<label for="jenis_kelamin-l" class="col-lg-2 col-form-label">Jenis Kelamin</label>
					<div class="col-lg-5">
						<div class="form-check">
							<input class="form-check-input" name="jenis_kelamin" type="radio" value="Pria" id="jenis_kelamin-p" required <?=(@$anggota['jenis_kelamin'] == 'Pria' ? 'checked' : '')?>>
							<label class="form-check-label" for="jenis_kelamin-p">
								Pria
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="jenis_kelamin" type="radio" value="Wanita" id="jenis_kelamin-w" required <?=(@$anggota['jenis_kelamin'] == 'Wanita' ? 'checked' : '')?>>
							<label class="form-check-label" for="jenis_kelamin-w">
								Wanita
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="alamat" class="col-lg-2 col-form-label">Alamat</label>
					<div class="col-lg-6">
						<textarea name="alamat" class="form-control" rows="2" required><?=@$anggota['alamat']?></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label"><a href="index.php?page=anggota-list"><i class="fa fa-arrow-left"></i> kembali</a></label>
					<div class="col-lg-6">
						<input type="hidden" name="id_anggota" value="<?=$anggota['id_anggota']?>">
						<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-save"></i> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>