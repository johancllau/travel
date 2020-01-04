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
    
 </body>
 </html>

<?php
	
	$id_destinasi = "";
	$foto_lama = "";
	$newData      = true;
	if (isset($_POST['id_destinasi']) && !empty($_POST['id_destinasi'])) {
		$id_destinasi = $_POST['id_destinasi'];
		$foto_lama = $_POST['foto_lama'];
		$newData = false;
	}

    $nama        = $_POST['nama'];
    $lokasi      = $_POST['lokasi'];
	$alamat      = $_POST['alamat'];
	$description = $_POST['description'];


	$foto    = $_FILES['foto']['name'];
	$tmpName = $_FILES['foto']['tmp_name'];
	$size    = $_FILES['foto']['size'];
	$type    = $_FILES['foto']['type'];

	$foto_lama = $_POST['foto_lama'];

	$maxsize = 2500000;
	$typeYgBoleh = array("image/jpeg","image/png","image/pjpeg");

	$dirFoto = "../pict";
	if (!is_dir($dirFoto))
	mkdir($dirFoto);

	$fileTujuanFoto = $dirFoto."/".$foto;
	$dirThumb = "thumb";
	if (!is_dir($dirThumb))
	mkdir($dirThumb);

	$fileTujuanThumb = $dirThumb."/t_".$foto;
	$dataValid="Ya";

	if ($size>0) {
		if($size>$maxsize) {
			$dataValid = "TIDAK";
			echo "<H3 align='center'>Masih ada Kesalahan, Silahkan di Perbaiki!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
                return;
		}
		if (!in_array ($type, $typeYgBoleh)) {
			$dataValid="Tidak";
			echo "<H3 align='center'>Masih ada Kesalahan, Silahkan di Perbaiki!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
                return;
		}
	}

	if(strlen(trim($nama)) == 0) {
		$dataValid="TIDAK";
		echo "<H3 align='center'>Masih ada Kesalahan, Silahkan di Perbaiki!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
                return;
    }
    if(strlen(trim($lokasi)) == 0) {
		$dataValid="TIDAK";
		echo "<H3 align='center'>Masih ada Kesalahan, Silahkan di Perbaiki!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
                return;
	}
	if(strlen(trim($alamat))==0) {
		$dataValid="TIDAK";
		echo "<H3 align='center'>Masih ada Kesalahan, Silahkan di Perbaiki!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
                return;
	}

	if($dataValid == "TIDAK") {
		echo "<H3 align='center'>Masih ada Kesalahan, Silahkan di Perbaiki!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
                return;
	}

	include "../koneksi.php";

	if ($newData) {
		$sql = "INSERT INTO destinasi (nama_destinasi, lokasi_destinasi, alamat_destinasi, image_destinasi, description)
			VALUES ('$nama','$lokasi','$alamat','$foto','$description')";
		$hasil = mysqli_query ($kon,$sql);

		if(!$hasil)	{
			echo "<H3 align='center'>Gagal Menyimpan Data!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
                return;
		} else	{
			echo '<script language="javascript">alert("Berhasil Menambahkan Data Baru!!"); document.location="destinasi.php";</script>';
		}
	} else {
		if ($size==0) {
			$foto = $foto_lama;
		}

		$sql = "UPDATE destinasi SET nama_destinasi='$nama', lokasi_destinasi='$lokasi', alamat_destinasi='$alamat', image_destinasi='$foto', description='$description' WHERE id_destinasi='$id_destinasi'";
		$hasil = mysqli_query ($kon,$sql);

		if(!$hasil)	{
			echo "<H3 align='center'>Gagal Mengubah Data!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
                return;
		} else	{
			echo '<script language="javascript">alert("Perubahan Data Berhasil!!"); document.location="destinasi.php";</script>';
		}
	}

	
	if($size>0)	{
		if (!move_uploaded_file ($tmpName, $fileTujuanFoto)) {
			echo "<H3 align='center'>Gagal Upload Foto!!<H3>";
            echo "<table border='0' align='center'>
                  <tr>
                     <td><input type='button' value='kembali' onClick='self.history.back()'></td>
                  </tr>
               </table></body>";
                return;
		}
		else {
			buat_thumbnail ($fileTujuanFoto,$fileTujuanThumb);
		}
	}

	function buat_thumbnail ($file_src,$file_dst) {
		list($w_src,$h_src,$type) = getImageSize ($file_src);
		switch($type) {

			case 1;
			$img_src = imagecreatefromgif($file_src);
			break;

			case 2;
			$img_src = imagecreatefromjpeg($file_src);
			break;

			case 3;
			$img_src = imagecreatefrompng($file_src);
			break;
		}

		$thumb = 100;
		if($w_src>$h_src) {
			$w_dst = $thumb;
			$h_dst = round ($thumb/$w_src*$h_src);
		} else {
			$w_dst = round($thumb/$h_src*$w_src);
			$h_dst=$thumb;
		}

		$img_dst = imagecreatetruecolor($w_dst,$h_dst);
		imagecopyresampled($img_dst,$img_src,0,0,0,0,$w_dst,$h_dst,$w_src,$h_src);
		imagejpeg($img_dst,$file_dst);
		imagedestroy($img_src);
		imagedestroy($img_dst);
	}
	
?>