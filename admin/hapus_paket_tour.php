 <?php 
 	include "../koneksi.php";
 	$id = $_GET['id_paket'];
 	$sql = "SELECT * FROM paket_tour WHERE id_paket_tour='$id'";
 	$hasil = mysqli_query($kon, $sql);
 	while ($row = mysqli_fetch_assoc($hasil)) {
 	    $nama   = $row['nama_paket'];
 	    $harga  = $row['harga_paket'];
        $desc = $row['description'];
 	    $travel = $row['kode_travell'];
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
 	<h2 align="center">Confirmasi Hapus Data Paket Tour</h2>
 	<br/>
 	<form = name="hapus_paket_tour" action="#" method="post">
 		<table border="2" cellspasing="3" cellpadding="5" align="center">
 		<tr>
 			<td>Nama Paket Tour</td><td><?= $nama ?></td>
 		</tr><tr>
 			<td>Harga Paket Tour</td><td><?= $harga ?></td>
 		</tr>
    <tr>
      <td>Description Paket Tour</td><td><?= $desc ?></td>
    </tr>
 		<tr>
 			<td>Travel</td><td><?= "Id Travell = $travel" ?></td>
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
 		$sql = "DELETE FROM paket_tour WHERE id_paket_tour='$id'";
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
 			echo '<script language="javascript">alert("Berhasil Menghapus User Yang di Pilih!!"); document.location="paket_tour.php";</script>';
 		}
 	}
 ?>