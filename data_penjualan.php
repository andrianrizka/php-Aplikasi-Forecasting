<?php
extract($_GET);
extract($_POST);
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Peramalan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<table width="600" border="1"  >
		<tr align="center">
			<td width="27">No</td>
			<td width="300">Time Series</td>
			<td width="155">Penjualan</td>
			<td width="34">X</td>
			<td width="34">Y</td>
			<td width="75">XX</td>
			<td width="26">XY</td>
		</tr>
		<?php
		$no= 0;
		$total_x = 0;
		$total_y = 0;
		$total_xx = 0;
		$total_xy = 0;
		$x = -1;
		$query = mysqli_query ($db, "SELECT * FROM penjualan ORDER BY id_jual ASC") or die ("Gagal Query".mysqli_error());
		while($hs = mysqli_fetch_array($query)){
			$no++;
			$x++;
			$minggu 	= $hs[1];
			$bulan 		= $hs[2];
			$tahun 		= $hs[3];
			$jumlah 	= $hs[4];
			$xx 		= $x * $x;
			$xy 		= $x * $jumlah;
			$total_x 	= $total_x + $x;
			$total_y 	= $total_y + $jumlah;
			$total_xx 	= $total_xx + $xx;
			$total_xy 	= $total_xy + $xy;
		?>
		<tr align="center">
			<td><?=$no?>.</td>
			<td align="left"><?="Minggu ke-$minggu Bulan $bulan $tahun"?></td>
			<td><?=$jumlah?></td>
			<td><?=$x?></td>
			<td><?=$jumlah?></td>
			<td><?=$xx?></td>
			<td><?=$xy?></td>
		</tr>
		<?php 
		}
		?>
		<tr align="center">
			<td colspan="3">Jumlah</td>	
			<td><?=$total_x?></td>
			<td><?=$total_y?></td>
			<td><?=$total_xx?></td>
			<td><?=$total_xy?></td>
		</tr>
		<tr align="center">
			<td colspan="3">Rata-rata</td>
			<td><?=$total_x/$no?></td>
			<td><?=$total_y/$no?></td>
			<td>&nbsp</td>
			<td>&nbsp</td>
		</tr>
	</table>
	<?php 
	#Regresi Linier
	$b1 = ($total_xy - (($total_x * $total_y)/$no))/($total_xx - (($total_x * $total_x)/$no));
	$b0 = ($total_y/$no) - $b1 * ($total_x/$no);
	echo "Rumus Regresi Linier<br>";
	echo "y = $b0 + $b1 x<br>";
	
	error_reporting(0);
	if ($prediksi){
		$x = $x + $list_pilihan;
		$y = $b0 + $b1 * $x;
		echo "Predikisi penjualan untuk $list_pilihan minggu berikutnya adalah $y ";
	}
	?>
	<p><a href="index.php">Halaman Utama</a></p>
</body>
</html>
