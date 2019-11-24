<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Peramalan</title>
</head>
<body>
<form action="simpan.php">
	<table width="600" border="0">
		<tr><td colspan="3">Data Penjualan</td></tr>
		<tr>
			<td width="138">Minggu ke</td>
			<td width="18">:</td>
			<td width="430">
				<select name="list_minggu" id="list_minggu">
					<option value="1">I</option>
					<option value="2">II</option>
					<option value="3">III</option>
					<option value="4">IV</option>
					<option value="5">V</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Bulan</td>
			<td>:</td>
			<td>
				<select name="list_bulan" id="list_bulan">
					<option value="01">Januari</option>
					<option value="02">Febuari</option>
					<option value="03">Maret</option>
					<option value="04">April</option>
					<option value="05">Mei</option>
					<option value="06">Juni</option>
					<option value="07">Juli</option>
					<option value="08">Agustus</option>
					<option value="09">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">Desember</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td>
				<input type="year" name="tahun" id="tahun">
			</td>
		</tr>
		<tr>
			<td>Jumlah Penjualan</td>
			<td>:</td>
			<td>
				<input type="text" name="jumlah" id="jumlah" size="4" maxlength="6">
			</td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>
				<input type="submit" name="simpan" id="simpan" value="Simpan">
			</td>
		</tr>
	</table>
	<p><a href="index.php">Halaman Utama</a></p>
</form>
</body>
</html>