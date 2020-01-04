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
		$datausername = $_GET["username"];
		$sql = "SELECT * FROM user WHERE username='$datausername'";
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

		$username = $data["username"];
		$password = $data["password"];
		$nama     = $data["name"];
		$email    = $data["email"];
		$gender   = $data["gender"];
		$notelp   = $data["notelp"];
		$alamat   = $data["address"];
		$status   = $data["status"];
	?>
	<h3 align="center">Form Edit Data User</h3>
	<form = name="form-Daftar" action="save_user.php" method="post">
		<input type="hidden" name="username" value="<?= $username; ?>"/>
		<input type="hidden" name="password" value="<?= $password; ?>">
		<table border="0" align="center" cellpadding="10">
			<tr>
				<td><label for="Nama">Nama</label></td>
				<td><input type="text" name="nama" id="Nama" placeholder="Nama" value="<?= $nama; ?>"></td>
			</tr>
			<tr>
				<td><label for="E-mail">E-mail</label></td>
				<td><input type="email" name="email" id="E-mail" placeholder="yohak@gmail.com" value="<?= $email; ?>"></td>
			</tr>
			<tr>
				<td><label for="Gender">Gender</label></td>
				<td>
					<?php 
						if ($gender == "pria") {
							echo '
								<input type="radio" name="gender" value="pria" checked="true">Pria
								<input type="radio" name="gender" value="wanita">Wanita
								';
						}
						else {
							echo '
								<input type="radio" name="gender" value="pria">Pria
								<input type="radio" name="gender" value="wanita" checked="true">Wanita
								';
						}
					?>
				</td>
			</tr>
			<tr>
				<td><label for="Alamat">Alamat</label></td>
				<td>
					<textarea name="alamat" id="Alamat" maxlength="1000" placeholder="Alamat">
						<?= $alamat; ?>
					</textarea>
				</td>
			</tr>
			<tr>
				<td><label for="No-telp">No.Telp</label></td>
				<td><input type="text" name="notelp" id="No-telp" placeholder="082237xxxxxxx" value="<?= $notelp ?>"></td>
			</tr>
			<tr>
				<td><label for="Hak-Akses">Hak Akses</label></td>
				<td>
					<select name="status">
						<?php 
							if ($status == 0) {
								echo '
									<option value="0" selected="true">User Member</option>
									<option value="1">Admin</option>
								';
							}
							else {
								echo '
									<option value="0">User Member</option>
									<option value="1" selected="true">Admin</option>
								';
							}
						?>
					</select>
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