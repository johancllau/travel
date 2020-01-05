 <?php 
 	include "../koneksi.php";
 	$username = $_GET['username'];
 	$sql = "SELECT * FROM user WHERE username='$username'";
 	$hasil = mysqli_query($kon, $sql);
 	while ($row = mysqli_fetch_assoc($hasil)) {
 	    $nama   = $row['name'];
 	    $email  = $row['email'];
      $gender = $row['gender'];
      $notelp = $row['notelp'];
 	    $alamat = $row['address'];
 	}

 ?>
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
 </head>
 <body>
 	<h2 align="center">Confirmasi Hapus Data Destinasi</h2>
 	<br/>
 	<form = name="hapus_destinasi" action="#" method="post">
 		<table border="2" cellspasing="3" cellpadding="5" align="center">
 		<tr>
 			<td>Nama User</td><td><?= $nama ?></td>
 		</tr><tr>
 			<td>E-mail User</td><td><?= $email ?></td>
 		</tr>
    <tr>
      <td>Jenis Kelamin</td><td><?= $gender ?></td>
    </tr>
    <tr>
      <td>No. Telp User</td><td><?= $notelp ?></td>
    </tr>
 		<tr>
 			<td>Alamat User</td><td><?= $alamat ?></td>
 		</tr>
 		<tr>
			<td colspan="2" align="center">
				<input type="button" name="cancel" value="Cancel" align="center" onclick="self.history.back()" class="btn btn-danger">
				<input type="submit" name="hapus" value="Hapus" align="center" class="btn btn-primary">
			</td>
		</tr>
 	</table>
 	</form>
 </body>
 </html>

 <?php 
 	if (isset($_POST['hapus']) && !empty($_POST['hapus'])) {
 		$sql = "DELETE FROM user WHERE username='$username'";
 		$hasil = mysqli_query($kon, $sql);
 		if (!$hasil) {
 			echo "<H3 align='center'>Gagal Hapus Data!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
               return;
 		} else {
 			echo '<script language="javascript">alert("Berhasil Menghapus User Yang di Pilih!!"); document.location="data_user.php";</script>';
 		}
 	}
 ?>