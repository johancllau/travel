<!DOCTYPE html>
<html>
	<head>
		<title>Akakom Travel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="../css/bootstrap.css" rel="stylesheet">
		
		<!--Google Fonts-->
		<link href='http://fonts.googleapis.com/css?family=Belgrano|Courgette&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
		
		<!--Bootshape-->
		<link href="../css/bootshape.css" rel="stylesheet">
	
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	  </head>
<body>
	<?php 
		include "../koneksi.php";
		$id_destinasi = $_GET["id_destinasi"];
		$sql = "SELECT * FROM destinasi WHERE id_destinasi='$id_destinasi'";
		$hasil = mysqli_query($kon,$sql);
		if (!$hasil) {
			echo "<H3 align='center'>Gagal Query!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
               return;
		}

		$data = mysqli_fetch_array($hasil);

		$nama   = $data["nama_destinasi"];
		$lokasi = $data["lokasi_destinasi"];
		$alamat = $data["alamat_destinasi"];
		$desc   = $data["description"];
		$foto   = $data["image_destinasi"];
	?>

	<h3 align="center">Form Edit Data Destinasi</h3>
	<br/>
	<form = name="form-Daftar" action="save_destination.php" method="post" enctype="multipart/form-data">
		<table border="0" align="center" cellpadding="10">
			<tr>
				<td><input type="hidden" name="id_destinasi" value="<?= $id_destinasi ?>"></td>
			</tr>
			<tr>
				<td><label for="Nama">Nama</label></td>
				<td><input type="text" name="nama" id="Nama" placeholder="Nama" value="<?= $nama ?>"></td>
			</tr>
			<tr>
				<td><label for="Lokasi">Lokasi</label></td>
				<td><select name="lokasi" id="Lokasi">
					<?php 
							if ($lokasi == "Yogyakarta") {
								echo '
									<option value="Yogyakarta" selected="true">Yogyakarta</option>
									<option value="Gunung Kidul">Gunung Kidul</option>
									<option value="Kulon Progo">Kulon Progo</option>
									<option value="Bantul">Bantul</option>
									<option value="Sleman">Sleman</option>
								';
							}
							elseif ($lokasi == "Gunung Kidul") {
								echo '
									<option value="Yogyakarta">Yogyakarta</option>
									<option value="Gunung Kidul" selected="true">Gunung Kidul</option>
									<option value="Kulon Progo">Kulon Progo</option>
									<option value="Bantul">Bantul</option>
									<option value="Sleman">Sleman</option>
								';
							}
							elseif ($lokasi == "Kulon Progo") {
								echo '
									<option value="Yogyakarta">Yogyakarta</option>
									<option value="Gunung Kidul">Gunung Kidul</option>
									<option value="Kulon Progo" selected="true">Kulon Progo</option>
									<option value="Bantul">Bantul</option>
									<option value="Sleman">Sleman</option>
								';
							}
							elseif ($lokasi == "Bantul") {
								echo '
									<option value="Yogyakarta">Yogyakarta</option>
									<option value="Gunung Kidul">Gunung Kidul</option>
									<option value="Kulon Progo">Kulon Progo</option>
									<option value="Bantul" selected="true">Bantul</option>
									<option value="Sleman">Sleman</option>
								';
							}
							elseif ($lokasi == "Sleman") {
								echo '
									<option value="Yogyakarta">Yogyakarta</option>
									<option value="Gunung Kidul">Gunung Kidul</option>
									<option value="Kulon Progo">Kulon Progo</option>
									<option value="Bantul">Bantul</option>
									<option value="Sleman" selected="true">Sleman</option>
								';
							}
						?>
					
			 	</select></td>
			</tr>
			<tr>
				<td><label for="Alamat">Alamat</label></td>
				<td>
					<textarea maxlength="1000" placeholder="Alamat" id="Alamat" name="alamat">
						<?= $alamat ?>
					</textarea>
				</td>
			</tr>
			<tr>
				<td><label for="Foto">Foto</label></td>
				<td>
					<input type="file" name="foto" id="Foto"/>
					<input type="hidden" name="foto_lama" value="<?= $foto ?>">
					<img src="<?= "thumb/t_".$foto; ?>" width="100px">
				</td>
			</tr>
			<tr>
				<td><label for="Description">Description</label></td>
				<td>
					<textarea maxlength="1000" placeholder="Description" id="Description" name="description">
						<?= $desc ?>
					</textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="button" name="cancel" value="Cancel" align="center" onclick="self.history.back()" class="btn btn-danger">
					<input type="submit" name="edit" value="Submit" align="center" class="btn btn-primary">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>