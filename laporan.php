<h3> Laporan Jumlah Seluruh Data </h3>
<?php
    $databuku = mysqli_query($conn,"SELECT * FROM databuku");
    $jumlahbuku = mysqli_num_rows($databuku);
    
    $data_anggota = mysqli_query($conn, "SELECT * FROM anggota");
    $jumlahanggota = mysqli_num_rows($data_anggota);

    $data_trans = mysqli_query($conn, "SELECT * FROM transaksi");
    $jumlahtrans = mysqli_num_rows($data_trans);

?>
    <table>
    
    <?php
    
    date_default_timezone_set('Asia/Jakarta');
    echo 'Update Data : ' . date('d-m-Y H:i:s').'&nbsp;WIB';
        
    ?>
    <br>
    <br>
    <tr>
		<td>Jumlah Buku Saat ini </td>
		<td>: <?php echo $jumlahbuku ?></td>
	</tr>
	<tr>
		<td>Jumlah Anggota Saat ini </td>
		<td>: <?php echo $jumlahanggota ?></td>
	</tr>
	<tr>
		<td>Jumlah Keseluruhan Transaksi </td>
		<td>:  <?php echo $jumlahtrans ?></td>
	</tr>
	</table>
		