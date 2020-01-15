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
	<h3 align="center">Form Input Data Paket Tour</h3>
	<br/>
	<form = name="form-Daftar" action="save_paket_tour.php" method="post" enctype="multipart/form-data">
		<table border="0" align="center" cellpadding="10">
			<tr>
				<td><label for="Nama">Nama Paket</label></td>
				<td><input type="text" name="nama" id="Nama" placeholder="Nama"></td>
			</tr>
			<tr>
				<td><label for="Harga">Daftar Destinasi</label></td>
				<td><input type="text" name="tempat" id="Harga" placeholder="tempat"></td>
			</tr>
			<tr>
				<td><label for="Harga">Harga</label></td>
				<td><input type="text" name="harga" id="Harga" placeholder="Rp. 2000"></td>
			</tr>
			<tr>
				<td><label for="Description">Description</label></td>
				<td>
					<textarea maxlength="1000" placeholder="Description" id="Description" name="description">
					</textarea>
				</td>
			</tr>
			<tr>
				<td><label for="Travell">Nama Armada Travel</label></td>
				<td><select name="travel" id="Travell">
					<?php 
						 include "../koneksi.php";
						 $query = mysqli_query($kon, "SELECT * FROM mobil_travel ORDER BY kode_travell ASC");
						 echo "<option value=''>Select</option>";
						 while ($row = mysqli_fetch_assoc($query)) {
						 	$kode = $row['kode_travell'];
						 	$na = $row['nama_armada'];
						 	echo "<option value='$kode'>$na</option>";
						 }
					?>
			 	</select></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="button" name="cancel" value="Cancel" align="center" onclick="self.history.back()" class="btn btn-danger">
					<input type="reset" name="reset" value="Reset" align="center" class="btn btn-success">
					<input type="submit" name="submit" value="Submit" align="center" class="btn btn-primary">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>