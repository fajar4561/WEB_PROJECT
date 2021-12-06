<?php
$koneksi_produk = $koneksi->query("SELECT * FROM produk ");
while($dta_produk=mysqli_fetch_assoc($koneksi_produk))
{
	$koneksi_detail_beli=mysqli_query($koneksi,"SELECT * FROM detail_beli WHERE kode_produk='$dta_produk[kode_produk]'");
	$jumlah_terjual = 0;
	$jumlah_rating = 0;
	while ($dta_terjual=mysqli_fetch_array($koneksi_detail_beli))
	{
		$jumlah_transaksi = mysqli_num_rows($koneksi_detail_beli);
		$array_masuk = $dta_terjual['jumlah'];
		$array_rating = $dta_terjual['rating'];
		$jumlah_terjual += $array_masuk ;
		$jumlah_rating  += $array_rating;
				
	}
$rta_rating =  $jumlah_rating/$jumlah_transaksi;
	
$koneksi->query("UPDATE produk SET terjual ='$jumlah_terjual', rating=round($rta_rating,1) WHERE kode_produk='$dta_produk[kode_produk]' ");

}

 ?>