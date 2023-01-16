<div class="p-3">
	<?php
	// baca mode form
	$mode = $_GET['mode'];

    if ($mode == 'add') {
        $judul = 'Tambah Data Buku';

        // baca record terakhir "anggota", untuk melihat kdbuku terakhir
        $query = mysqli_query($conn, "SELECT kdbuku FROM databuku ORDER BY idbuku DESC");
        $buku = mysqli_fetch_array($query);

        if (@$buku['kdbuku']) {
            // substr(AG202222, 2) -> 202222 di ambil data ke 2[array] / urutan ke 3;
            $kdbuku = "BU".(substr($buku['kdbuku'], 2) + 1);
        } else {
            $kdbuku = "BU".date("d").date("m")."01";
        }
    }
	else{
		$judul = 'Ubah Data Buku';

		$id = $_GET['id'];

		// baca data buku berdasarkan $_GET['id'] / id_anggota
		$query = mysqli_query($conn, "SELECT * FROM databuku WHERE idbuku = '".$id."'");
		$buku = mysqli_fetch_array($query);
        
		$kdbuku = $buku['kdbuku'];
	}
	?>
	<h2 class="mb-3"><?=$judul?></h2>
			<form action="buku-aksi.php?mode=<?=$mode?>" method="POST">
				<div class="form-group row">
					<label for="kdbuku" class="col-lg-2 col-form-label">ID Buku</label>
					<div class="col-lg-3">
						<input type="text" name="kdbuku" value="<?=$kdbuku?>" class="form-control" id="kdbuku" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label">Judul</label>
					<div class="col-lg-6">
						<input type="text" name="judul" value="<?=@$buku['judul']?>" class="form-control" id="nama" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="kategori-l" class="col-lg-2 col-form-label">Kategori</label>
					<div class="col-lg-6">
						<div class="form-check">
							<input class="form-check-input" name="kategori" type="radio" value="Pengetahuan" id="kategori-p" required <?=(@$buku['kategori'] == 'Pengetahuan' ? 'checked' : '')?>>
							<label class="form-check-label" for="kategori-p">
								Pengetahuan  
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="kategori" type="radio" value="Novel" id="kategori-w" required<?=(@$buku['kategori'] == 'Novel' ? 'checked' : '')?>>
							<label class="form-check-label" for="kategori-w">
								Novel
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="kategori" type="radio" value="Komik" id="kategori-w" required<?=(@$buku['kategori'] == 'Komik' ? 'checked' : '')?>>
							<label class="form-check-label" for="kategori-w">
								Komik
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="kategori" type="radio" value="Ensiklopedia" id="kategori-w" required<?=(@$buku['kategori'] == 'Ensiklopedia' ? 'checked' : '')?>>
							<label class="form-check-label" for="kategori-w">
								Ensiklopedia
							</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label">Pengarang</label>
					<div class="col-lg-6">
						<input type="text" name="pengarang" value="<?=@$buku['pengarang']?>" class="form-control" id="nama" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label">Penerbit</label>
					<div class="col-lg-6">
						<input type="text" name="penerbit" value="<?=@$buku['penerbit']?>" class="form-control" id="nama" required>
					</div>
				</div>             
				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label">Status</label>
					<div class="col-lg-6">
						<input type="text" name="statusbuku" value="Tersedia" <?=@$buku['statusbuku']?> class="form-control" id="nama" readonly>
					</div>
				</div>             
				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label"><a href="index.php?page=buku-list"><i class="fa fa-arrow-left"></i> kembali</a></label>
					<div class="col-lg-6">
						<input type="hidden" name="idbuku" value="<?=$buku['idbuku']?>">
						<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-save"></i> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>