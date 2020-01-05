 <?php 
 	include "../koneksi.php";
 	$id_destinasi = $_GET['id_destinasi'];
 	$sql = "SELECT * FROM destinasi WHERE id_destinasi='$id_destinasi'";
 	$hasil = mysqli_query($kon, $sql);
 	while ($row = mysqli_fetch_assoc($hasil)) {
 	    $name   = $row['nama_destinasi'];
 	    $lokasi = $row['lokasi_destinasi'];
 	    $alamat = $row['alamat_destinasi'];
 	    $desc   = $row['description'];
 	    $foto   = $row['image_destinasi'];
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
 			<td>Nama Destinasi</td><td><?= $name ?></td>
 		</tr><tr>
 			<td>Lokasi Destinasi</td><td><?= $lokasi ?></td>
 		</tr>
 		<tr>
 			<td>Alamat Destinasi</td><td><?= $alamat ?></td>
 		</tr>
 		<tr>
 			<td>Description Destinasi</td><td><?= $desc ?></td>
 		</tr>
 		<tr>
 			<td>Foto Destinasi</td><td><img src="../pict/<?= $foto ?>" width="200"></td>
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
 		$sql = "DELETE FROM destinasi WHERE id_destinasi='$id_destinasi'";
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
 			echo '<script language="javascript">alert("Berhasil Menghapus Data Yang di Pilih!!"); document.location="destinasi.php";</script>';
 		}
 	}
 ?>